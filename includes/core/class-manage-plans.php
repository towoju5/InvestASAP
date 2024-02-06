<?php

class Class_Manage_Plans
{
    public $_table_name;
    public function __construct()
    {
        $this->_table_name = 'woju_plans';
    }

    /**
     * Get All Plans from Custom Database Table
     *
     * @return array The array of plans or an empty array if none found.
     */
    public function get_all_plans()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $query = "SELECT * FROM $table_name";
        $results = $wpdb->get_results($query, OBJECT);
        return $results;
    }

    /**
     * Get Plan by ID from Custom Database Table
     *
     * @param int $plan_id The ID of the plan.
     * @return array|null The plan data or null if not found.
     */
    public function get_plan_by_id($plan_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;

        // Check if the plan ID is valid
        if (!is_numeric($plan_id) || $plan_id <= 0) {
            return null;
        }
        $query = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $plan_id);
        $result = $wpdb->get_row($query, OBJECT);

        return $result;
    }

    /**
     * Add a New Plan to the Custom Database Table
     *
     * @param array $plan_data An associative array containing plan data.
     * @return int|false The inserted plan ID or false on failure.
     */
    public function add_new_plan($plan_data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->insert(
            $table_name,
            $plan_data,
            array('%s', '%f', '%f', '%f', '%d', '%s') 
        );

        if ($result !== false) {
            return $wpdb->insert_id;
        }
        return false;
    }


    /**
     * Edit Plan in Custom Database Table
     *
     * @param int $plan_id The ID of the plan to edit.
     * @param array $plan_data An associative array containing updated plan data.
     * @return bool Whether the plan was successfully updated or not.
     */
    function edit_plan($plan_id, $plan_data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->update(
            $table_name,
            $plan_data,
            array('id' => $plan_id),
            array('%s', '%f', '%f', '%f', '%d', '%s')
        );

        return $result !== false;
    }

    /**
     * Delete Plan from Custom Database Table
     *
     * @param int $plan_id The ID of the plan to delete.
     * @return bool Whether the plan was successfully deleted or not.
     */
    function delete_plan($plan_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $this->_table_name;
        $result = $wpdb->delete(
            $table_name,
            array('id' => $plan_id),
            array('%d')
        );
        return $result !== false;
    }
}

$core_plans = new Class_Manage_Plans();
