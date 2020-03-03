<?php
/**
 * Contact Vendor Widget
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/vendor-contact-widget.php.
 *
 * @author  WC Vendors
 * @package WCVendors/Templates/Emails
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php printf( __( 'Hi there. A customer has left a message on %s.', 'wcvendors-pro' ), $shop_name ); ?></p>

<p><?php printf( __( 'Email Address: %s', 'wcvendors-pro' ), $email ); ?></p>
<p><?php printf( __( 'Message: %s', 'wcvendors-pro' ), $message ); ?></p>
<?php do_action( 'wcv_quick_contact_email_extras' ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>
