<?php
$request = (object) $_REQUEST;
$new_deposit = null;
// if ($_SERVER['REQUEST_METHOD'] == "POST") {

// }

function menu_page_callback()
{
    add_menu_page(
        'My Investments',
        'Invest',
        'subscriber',
        'investments',
        'investment_home',
        'dashicons-palmtree',
        20
    );

    add_submenu_page(
        'investments',
        'Invest Now',
        'New investment',
        'subscriber',
        'investment-plans',
        'plans'
    );

    add_submenu_page(
        'investments',
        'My Deposits',
        'My Deposits',
        'subscriber',
        'deposit-history',
        'deposits'
    );

    add_submenu_page(
        'investments',
        'Withdrawals',
        'Withdrawals',
        'subscriber',
        'payout-history',
        'payouts'
    );
}

add_action('admin_menu', 'menu_page_callback');
add_shortcode('investAsap_plans', 'plans');

function plans()
{
    global $request;
    $core_plan = new Class_Manage_Plans;
    $plans = $core_plan->get_all_plans();
    if (isset($_GET['PLANID'])) {
        $plan = $core_plan->get_plan_by_id($_GET['PLANID']);
        if (!$plan) {
            echo "<h1>Unknown investment plan selected</h1>";
        } else {
            if (isset($request->new_deposit) && $request->plan_id > 0) {
                $core_plan = new Class_Manage_Plans;
                $plan = $core_plan->get_plan_by_id($request->plan_id);

                if ($request->amount < $plan->min_amount || $request->amount > $plan->max_amount) {
                    die('Invalid amount provided');
                }

                $curl = curl_init();

                $raw_data = [
                    'price_amount' => $request->amount,
                    'price_currency' => "USD",
                    'pay_currency' => $request->payment_method,
                    'order_id' => uniqid('INV-'),
                    'order_description' => get_bloginfo('name') . " Account Funding",
                    'ipn_callback_url' => site_url('wp-admin/admin.php?page=investments_webhook'),
                ];

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.nowpayments.io/v1/invoice',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($raw_data),
                    CURLOPT_HTTPHEADER => array(
                        'x-api-key: E5DVSQD-EZJMFY3-N2JTQN6-AACFB8C',
                        'Content-Type: application/json',
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                $result = json_decode($response, true);
                // echo json_encode($result); exit;

                // Record deposit history
                $datetime = new DateTime($result['created_at']);
                $datetime->modify('+1 day');
                $modified_datetime = $datetime->format('Y-m-d H:i:s');
                $deposit_data = [
                    "user_id" => get_current_user_id(),
                    "amount" => $request->amount,
                    "date" => $result['created_at'],
                    "expiration" => $modified_datetime,
                    "status" => "pending",
                    "raw_data" => json_encode($result),
                    "payment_method" => $request->payment_method,
                ];

                $core_deposits = new Class_Manage_Deposits;
                $save = $core_deposits->add_new_deposit($deposit_data);
                var_dump($save, $deposit_data);exit;

                if ($result['invoice_url']) {
                    $checkout_url = $result['invoice_url'];
                    woju_redirect($checkout_url);exit;
                }
            }
            include_once plugin_dir_path(__FILE__) . '../public/deposit/new.php';
        }
    } else {
        include_once plugin_dir_path(__FILE__) . '../public/plans.php';
    }
}

function payouts()
{
    global $request;
    $core_payouts = new Class_Manage_Payouts;
    if (isset($request->PLANID)) {
        $core_plan = new Class_Manage_Plans;
        $plan = $core_plan->get_plan_by_id($request->PLANID);
        if (!$plan) {
            echo "<h1>Unknown investment plan selected</h1>";
        } else {
            // include_once plugin_dir_path(__FILE__) . '../public/payout/new.php';
        }
    } else {
        $user = get_currentuserinfo();
        if ($user) {
            $payouts = $core_payouts->get_payout_by_user_id($user->ID);
            include_once plugin_dir_path(__FILE__) . '../public/payout/index.php';
        }
    }
}

function deposits()
{
    global $request;
    $core_deposits = new Class_Manage_Deposits;
    if (isset($request->PLANID)) {
        $core_plan = new Class_Manage_Plans;
        $plan = $core_plan->get_plan_by_id($request->PLANID);
        if (!$plan) {
            echo "<h1>Unknown investment plan selected</h1>";
        } else {
            // include_once plugin_dir_path(__FILE__) . '../public/deposit/new.php';
        }
    } else {
        $user = get_currentuserinfo();
        if ($user) {
            $deposits = $core_deposits->get_deposit_by_user_id($user->ID);
            include_once plugin_dir_path(__FILE__) . '../public/deposit/index.php';
        }
    }
}

function investment_home()
{
    include_once plugin_dir_path(__FILE__) . '../public/index.php';
}

if (!function_exists('get_username_by_id')) {
    function get_username_by_id()
    {
        $user_id = get_current_user_id();
        if (is_user_logged_in()) {
            $user_data = get_userdata($user_id);
            if ($user_data) {
                $username = $user_data->user_login;
            } else {
                $username = "User not found";
            }
            return $username;
        } else {
            return false;
        }
    }
}

if (!function_exists('woju_redirect')) {
    function woju_redirect($redirect)
    {
        echo ("<script>location.href = '" . $redirect . "'</script>");exit;
    }
}
