<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://dan.lavron.com
 * @since      1.0.0
 *
 * @package    Rekki_Form
 * @subpackage Rekki_Form/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">
    <form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>"
          method="post">

        <input type="hidden" name="contact_form">

        <div class="form-section">
            <label for="full-name"><?php echo esc_html( 'Full Name',
					'rekki-form' ); ?></label>
            <input type="text" id="full-name" name="full_name">
        </div>

        <div class="form-section">
            <label for="email"><?php echo esc_html( 'Email',
					'rekki-form' ); ?></label>
            <input type="text" id="email" name="email">
        </div>

        <div class="form-section">
            <label for="user-phone"><?php echo esc_html( 'Phone',
					'rekki-form' ); ?></label>
            <input type="tel" id="user-phone" name="user-phone">
        </div>
        <div class="form-section">
            <label for="date"><?php echo esc_html( 'Date',
					'rekki-form' ); ?></label>
            <input type="text" id="date" name="date">
        </div>


        <input type="submit" id="contact-form-submit"
               value="<?php echo esc_attr( 'Submit', 'rekki-form' ); ?>">

    </form>
</div>