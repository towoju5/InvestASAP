<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/towoju5
 * @since      1.0.0
 *
 * @package    Invest_Asap
 * @subpackage Invest_Asap/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Invest_Asap
 * @subpackage Invest_Asap/includes
 * @author     Emmanuel Towoju <towojuads@gmail.com>
 */
class Invest_Asap_Deactivator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {
        // Remove all tables
        global $wpdb;

        // Plans Table
        $table_name = $wpdb->prefix . 'woju_plans';
        $wpdb->query("DROP TABLE IF EXISTS $table_name");

        // Deposits Table
        $table_name = $wpdb->prefix . 'woju_deposits';
        $wpdb->query("DROP TABLE IF EXISTS $table_name");

        // Withdrawals Table
        $table_name = $wpdb->prefix . 'woju_withdrawals';
        $wpdb->query("DROP TABLE IF EXISTS $table_name");

        // Payment Methods Table
        $table_name = $wpdb->prefix . 'woju_payment_methods';
        $wpdb->query("DROP TABLE IF EXISTS $table_name");
    }

}
