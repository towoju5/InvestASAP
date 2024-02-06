<?php
$request = (object)$_REQUEST;
/**
 * Hook menu for admin
 */
// Add to functions.php or a custom plugin file
function add_admin_menus()
{
    add_menu_page(
        'Invest ASAP Settings',
        'Investments',
        'administrator',
        'invest-asap',
        'invest_asap_admin',
        'dashicons-palmtree',
        10
    );

    add_submenu_page(
        'invest-asap',
        'Manage Plans',
        'Plans',
        'administrator',
        'investment-plans',
        'manage_plans'
    );

    add_submenu_page(
        'invest-asap',
        'Manage Deposits',
        'Deposits',
        'administrator',
        'deposits',
        'manage_deposits'
    );

    add_submenu_page(
        'invest-asap',
        'Manage Payouts',
        'Payouts',
        'administrator',
        'payouts',
        'manage_payouts'
    );
}

function invest_asap_admin()
{
    global $request;
    include_once plugin_dir_path( __FILE__ ) . '../admin/index.php';
}

function manage_plans()
{
    global $request;
    $core_plan = new Class_Manage_Plans;
    
    if(isset($request->action) && $request->action == 'create') {
        if($_POST) {
            $plan_data = [
                "plan_name" => $request->plan_name,
                "min_amount" => $request->min_amount,
                "max_amount" => $request->max_amount,
                "profit" => $request->profit,
                "duration" => $request->duration,
            ];
            
            if($core_plan->add_new_plan($plan_data)) {
                $path = site_url('wp-admin/admin.php?page=investment-plans');
                woju_redirect($path); exit;
            }
        }
        include_once plugin_dir_path( __FILE__ ) . '../admin/plans/create.php';
    } else if(isset($request->action) && $request->action == 'edit' && isset($request->plan_id)) {
        $plan = $core_plan->get_plan_by_id($request->plan_id);
        if($_POST) {
            $plan_data = [
                "plan_name" => $request->plan_name,
                "min_amount" => $request->min_amount,
                "max_amount" => $request->max_amount,
                "profit" => $request->profit,
                "duration" => $request->duration,
                "description" => $request->description,
            ];
            $core_plan->edit_plan($request->plan_id, $plan_data);
        }
        include_once plugin_dir_path( __FILE__ ) . '../admin/plans/edit.php';
    } else if(isset($request->action) && $request->action == 'delete' && isset($request->plan_id)) {
        if($core_plan->delete_plan($request->plan_id)) {
            woju_redirect( site_url('wp-admin/admin.php?page=investment-plans') ); exit;
        }
    } else {
        $plans = $core_plan->get_all_plans();
        include_once plugin_dir_path( __FILE__ ) . '../admin/plans/index.php';
    }
}

function manage_deposits()
{
    global $request;
    $deposit = new Class_Manage_Deposits;
    
    if(isset($request->action) && $request->action == 'create') {
        if($_POST) {
            $plan_data = [
                "plan_name" => $request->plan_name,
                "min_amount" => $request->min_amount,
                "max_amount" => $request->max_amount,
                "profit" => $request->profit,
                "duration" => $request->duration,
            ];
            
            if($deposit->add_new_deposit($plan_data)) {
                $path = site_url('wp-admin/admin.php?page=investment-plans');
                woju_redirect($path); exit;
            }
        }
        include_once plugin_dir_path( __FILE__ ) . '../admin/plans/create.php';
    } else if(isset($request->action) && $request->action == 'edit' && isset($request->plan_id)) {
        $plan = $deposit->get_deposit_by_id($request->plan_id);
        if($_POST) {
            $plan_data = [
                "plan_name" => $request->plan_name,
                "min_amount" => $request->min_amount,
                "max_amount" => $request->max_amount,
                "profit" => $request->profit,
                "duration" => $request->duration,
                "description" => $request->description,
            ];
            $deposit->edit_deposit($request->plan_id, $plan_data);
        }
        include_once plugin_dir_path( __FILE__ ) . '../admin/plans/edit.php';
    } else if(isset($request->action) && $request->action == 'delete' && isset($request->plan_id)) {
        if($deposit->delete_deposit($request->plan_id)) {
            woju_redirect( site_url('wp-admin/admin.php?page=investment-plans') ); exit;
        }
    } else {
        $deposits = $deposit->get_all_deposits();
        // var_dump($deposits);  exit;
        include_once plugin_dir_path( __FILE__ ) . '../admin/deposit/index.php';
    }
}

function manage_payouts()
{
    global $request;
    $payout = new Class_Manage_Payouts;
    
    if(isset($request->action) && $request->action == 'create') {
        if($_POST) {
            $plan_data = [
                "plan_name" => $request->plan_name,
                "min_amount" => $request->min_amount,
                "max_amount" => $request->max_amount,
                "profit" => $request->profit,
                "duration" => $request->duration,
            ];
            
            if($payout->add_new_payout($plan_data)) {
                $path = site_url('wp-admin/admin.php?page=investment-plans');
                woju_redirect($path); exit;
            }
        }
        include_once plugin_dir_path( __FILE__ ) . '../admin/plans/create.php';
    } else if(isset($request->action) && $request->action == 'edit' && isset($request->plan_id)) {
        $plan = $payout->get_payout_by_id($request->plan_id);
        if($_POST) {
            $plan_data = [
                "plan_name" => $request->plan_name,
                "min_amount" => $request->min_amount,
                "max_amount" => $request->max_amount,
                "profit" => $request->profit,
                "duration" => $request->duration,
                "description" => $request->description,
            ];
            $payout->edit_payout($request->plan_id, $plan_data);
        }
        include_once plugin_dir_path( __FILE__ ) . '../admin/plans/edit.php';
    } else if(isset($request->action) && $request->action == 'delete' && isset($request->plan_id)) {
        if($payout->delete_payout($request->plan_id)) {
            woju_redirect( site_url('wp-admin/admin.php?page=investment-plans') ); exit;
        }
    } else {
        $payouts = $payout->get_all_payouts();
        include_once plugin_dir_path( __FILE__ ) . '../admin/payout/index.php';
    }
    global $request;
    //
}


// Hook the function to the admin menu
add_action('admin_menu', 'add_admin_menus');
