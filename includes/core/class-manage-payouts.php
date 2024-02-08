<?php

class Class_Manage_Payouts
{


    public $_table_name;
    public function __construct()
    {
        $this->_table_name = 'woju_withdrawals';
    }

    /**
     * Get All payouts from Custom Database Table
     *
     * @return array The array of payouts or an empty array if none found.
     */
    public function get_all_payouts()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $query = "SELECT * FROM $table_name";
        $results = $wpdb->get_results($query, OBJECT);
        return $results;
    }

    /**
     * Get payout by ID from Custom Database Table
     *
     * @param int $payout_id The ID of the payout.
     * @return array|null The payout data or null if not found.
     */
    public function get_payout_by_id($payout_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;

        // Check if the payout ID is valid
        if (!is_numeric($payout_id) || $payout_id <= 0) {
            return null;
        }
        $query = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $payout_id);
        $result = $wpdb->get_row($query, OBJECT);

        return $result;
    }

    /**
     * Get payout by ID from Custom Database Table
     * @method wp_get_current_user()
     * @param int $user_id The ID of the payout.
     * @return array|null The payout data or null if not found.
     */
    public function get_payout_by_user_id($user_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;

        // Check if the payout ID is valid
        if (!is_numeric($user_id) || $user_id <= 0) {
            return null;
        }
        $query = $wpdb->prepare("SELECT * FROM $table_name WHERE user_id = %d", $user_id);
        $result = $wpdb->get_results($query, OBJECT);

        return $result;
    }

    /**
     * Add a New payout to the Custom Database Table
     *
     * @param array $payout_data An associative array containing payout data.
     * @return int|false The inserted payout ID or false on failure.
     */
    public function add_new_payout($payout_data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->insert(
            $table_name,
            $payout_data,
            array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
        );

        if ($result !== false) {
            return $wpdb->insert_id;
        }
        return false;
    }


    /**
     * Edit payout in Custom Database Table
     *
     * @param int $payout_id The ID of the payout to edit.
     * @param array $payout_data An associative array containing updated payout data.
     * @return bool Whether the payout was successfully updated or not.
     */
    function edit_payout($payout_id, $payout_data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->update(
            $table_name,
            $payout_data,
            array('id' => $payout_id),
            array('%d', '%f', '%s', '%s', '%s')
        );

        return $result !== false;
    }

    /**
     * Edit payout in Custom Database Table
     *
     * @param int $payout_id The ID of the payout to edit.
     * @param array $payout_data An associative array containing updated payout data.
     * @return bool Whether the payout was successfully updated or not.
     */
    function update_payout_status($payout_id, $status)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
    
        $result = $wpdb->update(
            $table_name,
            array('status' => $status),
            array('id' => $payout_id)
        );
        return $result !== false;
    }
    

    /**
     * Delete payout from Custom Database Table
     *
     * @param int $payout_id The ID of the payout to delete.
     * @return bool Whether the payout was successfully deleted or not.
     */
    function delete_payout($payout_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->delete(
            $table_name,
            array('id' => $payout_id),
            array('%d')
        );
        return $result !== false;
    }
}

$core_plans = new Class_Manage_Payouts();

