<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/towoju5
 * @since      1.0.0
 *
 * @package    Invest_Asap
 * @subpackage Invest_Asap/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Invest_Asap
 * @subpackage Invest_Asap/includes
 * @author     Emmanuel Towoju <towojuads@gmail.com>
 */
class Invest_Asap_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        // Plans Table
        $table_name = $wpdb->prefix . 'woju_plans';
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id INT(11) NOT NULL AUTO_INCREMENT,
				plan_name VARCHAR(255) NOT NULL,
				min_amount DECIMAL(10, 2) NOT NULL,
				max_amount DECIMAL(10, 2) NOT NULL,
				profit DECIMAL(5, 2) NOT NULL,
				duration INT(11) NOT NULL,
				description TEXT,
				PRIMARY KEY (id)
			) $charset_collate;";
        $wpdb->query($sql);

        // Deposits Table
        $table_name = $wpdb->prefix . 'woju_deposits';
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id INT(11) NOT NULL AUTO_INCREMENT,
				user_id INT(11) NOT NULL,
				payment_method VARCHAR(255) NOT NULL,
				amount DECIMAL(10, 2) NOT NULL,
				date DATETIME NOT NULL,
				expiration DATETIME NOT NULL,
				status VARCHAR(20) NOT NULL,
				raw_data LONGTEXT NULL,
				PRIMARY KEY (id)
			) $charset_collate;";
        $wpdb->query($sql);

        // Withdrawals Table
        $table_name = $wpdb->prefix . 'woju_withdrawals';
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id INT(11) NOT NULL AUTO_INCREMENT,
				user_id INT(11) NOT NULL,
				amount DECIMAL(10, 2) NOT NULL,
				wallet_address VARCHAR(255) NOT NULL,
				payment_method VARCHAR(255) NOT NULL,
				status VARCHAR(20) NOT NULL,
				date DATETIME NOT NULL,
				currency VARCHAR(10) NOT NULL,
				PRIMARY KEY (id)
			) $charset_collate;";
        $wpdb->query($sql);

        // Payment Methods Table
        $table_name = $wpdb->prefix . 'woju_payment_methods';
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
			id INT(11) NOT NULL AUTO_INCREMENT,
			method_name VARCHAR(255) NOT NULL,
			method_slug VARCHAR(255) NOT NULL,
			method_wallet_address VARCHAR(255) NOT NULL,
			method_currency VARCHAR(10) NOT NULL,
			method_network VARCHAR(255),
			PRIMARY KEY (id)
		) $charset_collate;";
        $wpdb->query($sql);
    }

}
