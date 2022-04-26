<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://dan.lavron.com
 * @since      1.0.0
 *
 * @package    Rekki_Form
 * @subpackage Rekki_Form/admin/partials
 */
?>

    <!-- This file should primarily consist of HTML with a little bit of PHP. -->
    <div class="wrap">
        <h1><?= __( 'ReKKi Form', 'rekki-form' ) ?></h1>

        Shortcode: <code>[shortcode-rekki-form]</code>
    </div>

<?php
global $wpdb;
// this adds the prefix which is set by the user upon instillation of wordpress
$table_name = $wpdb->prefix . "rekki_form";
// this will get the data from your table
$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY rekki_form_phone  ASC" );
?>
    <table id="rekki_users_request">
        <tr>
            <td><h2>Full Name</h2></td>
            <td><h2>Email</h2></td>
            <td><h2>Phone</h2></td>
            <td><h2>Date</h2></td>
        </tr>
		<?php
		foreach ( $retrieve_data as $retrieved_data ) { ?>
            <tr>
                <td><?= $retrieved_data->rekki_form_full_name; ?></td>
                <td>
                    <a href="mailto:<?= $retrieved_data->rekki_form_email; ?>"><?= $retrieved_data->rekki_form_email; ?></a>
                </td>
                <td><a href="tel:<?= $retrieved_data->rekki_form_phone; ?>"><?= $retrieved_data->rekki_form_phone; ?></a></td>
                <td><?= $retrieved_data->rekki_form_date; ?></td>
            </tr>
			<?php
		}
		?>
    </table>
<?php