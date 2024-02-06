<?php

class Class_Manage_Deposits {
    
    public $_table_name;
    public function __construct()
    {
        $this->_table_name = 'woju_deposits';
    }

    /**
     * Get All deposits from Custom Database Table
     *
     * @return array The array of deposits or an empty array if none found.
     */
    public function get_all_deposits()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $query = "SELECT * FROM $table_name";
        $results = $wpdb->get_results($query, OBJECT);
        return $results;
    }

    /**
     * Get deposit by ID from Custom Database Table
     *
     * @param int $deposit_id The ID of the deposit.
     * @return array|null The deposit data or null if not found.
     */
    public function get_deposit_by_id($deposit_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;

        // Check if the deposit ID is valid
        if (!is_numeric($deposit_id) || $deposit_id <= 0) {
            return null;
        }
        $query = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $deposit_id);
        $result = $wpdb->get_row($query, OBJECT);

        return $result;
    }

    /**
     * Get payout by ID from Custom Database Table
     * @method get_currentuserinfo()
     * @param int $user_id The ID of the payout.
     * @return array|object The payout data or null if not found.
     */
    public function get_deposit_by_user_id($user_id) : object | array
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;

        // Check if the User ID is valid
        if (!is_numeric($user_id) || $user_id <= 0) {
            return [];
        }
        $query = $wpdb->prepare("SELECT * FROM $table_name WHERE user_id = %d", $user_id);
        $result = $wpdb->get_results($query, OBJECT);

        return $result;
    }

    /**
     * Add a New deposit to the Custom Database Table
     *
     * @param array $deposit_data An associative array containing deposit data.
     * @return int|false The inserted deposit ID or false on failure.
     */
    public function add_new_deposit($deposit_data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->insert(
            $table_name,
            $deposit_data,
            array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
        );

        if ($result !== false) {
            return $wpdb->insert_id;
        }
        return false;
    }


    /**
     * Edit deposit in Custom Database Table
     *
     * @param int $deposit_id The ID of the deposit to edit.
     * @param array $deposit_data An associative array containing updated deposit data.
     * @return bool Whether the deposit was successfully updated or not.
     */
    function edit_deposit($deposit_id, $deposit_data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->update(
            $table_name,
            $deposit_data,
            array('id' => $deposit_id),
            array('%d', '%f', '%s', '%s', '%s')
        );

        return $result !== false;
    }

    /**
     * Delete deposit from Custom Database Table
     *
     * @param int $deposit_id The ID of the deposit to delete.
     * @return bool Whether the deposit was successfully deleted or not.
     */
    function delete_deposit($deposit_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->delete(
            $table_name,
            array('id' => $deposit_id),
            array('%d')
        );
        return $result !== false;
    }
}

$core_deposits = new Class_Manage_Deposits();
