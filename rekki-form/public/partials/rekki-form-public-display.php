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

    <form name="contact_form" method="POST"
          action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
          enctype="multipart/form-data" autocomplete="off"
          accept-charset="utf-8">

        <div>
            <label>
                Full Name
                <input type="text" name="rekki_form_full_name" required="">
            </label>
        </div>

        <div>
            <label>
                Email
                <input type="email" name="rekki_form_email" required="">
            </label>
        </div>
        <div>
            <label>
                Phone
                <input type="tel" name="rekki_form_phone" required="">
            </label>
        </div>
        <div>
            <label>
                Date
                <input type="date" name="rekki_form_date" required="">
            </label>
        </div>

        <input type="hidden" name="action" value="contact_form">

        <input type="hidden" name="base_page" value="">

        <div>
            <button type="submit" name="submit_btn">
                Submit
            </button>
        </div>

    </form>
    <!-- new registeration -->

<?php