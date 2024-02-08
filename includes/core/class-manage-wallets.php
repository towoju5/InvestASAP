<?php


class Class_Manage_Wallets
{
    public $_table_name;
    public function __construct()
    {
        $this->_table_name = 'woju_payment_methods';
    }

    /**
     * Get All wallets from Custom Database Table
     *
     * @return array The array of wallets or an empty array if none found.
     */
    public function get_all_wallets()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $query = "SELECT * FROM $table_name";
        $results = $wpdb->get_results($query, OBJECT);
        return $results;
    }

    /**
     * Get wallet by ID from Custom Database Table
     *
     * @param int $wallet_id The ID of the wallet.
     * @return array|null The wallet data or null if not found.
     */
    public function get_wallet_by_id($wallet_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;

        // Check if the wallet ID is valid
        if (!is_numeric($wallet_id) || $wallet_id <= 0) {
            return null;
        }
        $query = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $wallet_id);
        $result = $wpdb->get_row($query, OBJECT);

        return $result;
    }

    /**
     * Add a New wallet to the Custom Database Table
     *
     * @param array $wallet_data An associative array containing wallet data.
     * @return int|false The inserted wallet ID or false on failure.
     */
    public function add_new_wallet($wallet_data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->insert(
            $table_name,
            $wallet_data,
            array('%s', '%s', '%s', '%s', '%s')
        );

        if ($result !== false) {
            return $wpdb->insert_id;
        }
        return false;
    }


    /**
     * Edit wallet in Custom Database Table
     *
     * @param int $wallet_id The ID of the wallet to edit.
     * @param array $wallet_data An associative array containing updated wallet data.
     * @return bool Whether the wallet was successfully updated or not.
     */
    function edit_wallet($wallet_id, $wallet_data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->update(
            $table_name,
            $wallet_data,
            array('id' => $wallet_id),
            array('%s', '%s', '%s', '%s', '%s')
        );

        return $result !== false;
    }

    /**
     * Delete wallet from Custom Database Table
     *
     * @param int $wallet_id The ID of the wallet to delete.
     * @return bool Whether the wallet was successfully deleted or not.
     */
    function delete_wallet($wallet_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->delete(
            $table_name,
            array('id' => $wallet_id),
            array('%d')
        );
        return $result !== false;
    }


    function add_balance_meta_fields($user_id, $wwallet, $balance)
    {
        $query = add_user_meta($user_id, $wwallet, $balance, true);
        return $query;
    }
    // add_action('user_register', 'add_balance_meta_fields');
}

$core_wallets = new Class_Manage_Wallets();
