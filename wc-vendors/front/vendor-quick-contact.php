<?php

/**
 * Contact Store widget template.
 *
 * @package    WCVendors_Pro
 * @subpackage WCVendors_Pro/admin/widgets
 * @author     WC Vendors, Lindeni Mahlalela
 * @version    1.6.3
 * @since      1.5.8
 */
?>
<?php ob_start(); ?>
<?php
if ( $show_opening_hours ) :
	$hours = get_user_meta( $vendor_id, 'wcv_store_opening_hours', true );

	$time_format = apply_filters( 'wcv_opening_hours_time_format', wc_time_format() );

	if ( ! empty( $hours ) ) :
		?>
		<p><?php _e( 'Opening Hours', 'wcvendors-pro' ); ?></p>
		<table class="store-opening-hours-table">
			<thead>
			<th><?php _e( 'Day', 'wcvendors-pro' ); ?></th>
			<th><?php _e( 'Opening Hours', 'wcvendors-pro' ); ?></th>
			</thead>
			<tbody>
			<?php
			foreach ( $hours as $opening ) :
				$opening_times = sprintf( __( '%1$s to %2$s', 'wcvendors-pro' ), esc_attr( date( $time_format, strtotime( $opening['open'] ) ) ), esc_attr(date( $time_format, strtotime( $opening['close'] ) )) );
				?>
				<tr>
					<td><?php echo ucfirst( esc_attr( $opening['day'] ) ); ?></td>
					<td><?php echo $opening_times; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<p><?php _e( 'We are open.', 'wcvendors-pro' ); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php $opening_hours = ob_get_clean(); ?>

<?php if ( $show_contact_text && isset( $contact_text ) ) : ?>
	<p class="wcv-widget-contact-text"><?php echo esc_attr( $contact_text ); ?></p>
<?php endif; ?>
<?php echo ( $show_hours_after == 'text' ) ? $opening_hours : ''; ?>

	<ul class="contact-card">
		<?php if ( $show_shop_name && isset( $vendor_settings['pv_shop_name'] ) ) : ?>
			<li class="wcv-widget-shop-name"><?php echo $vendor_settings['pv_shop_name']; ?></li>
		<?php endif; ?>

		<?php if ( $show_shop_url && wcv_format_store_url( $vendor_id ) ) : ?>
			<li class="wcv-widget-shop-url"><?php echo wcv_format_store_url( $vendor_id ); ?></li>
		<?php endif; ?>

		<?php if ( $show_email_address && isset( $user->user_email ) ) : ?>
			<li class="wcv-widget-store-email"><?php echo $user->user_email; ?></li>
		<?php endif; ?>
		<?php if ( $show_phone_number && isset( $vendor_settings['_wcv_store_phone'] ) ) : ?>
			<li class="wcv-widget-store-phone"><?php echo $vendor_settings['_wcv_store_phone']; ?></li>
		<?php endif; ?>
	</ul>
<?php echo ( $show_hours_after == 'info' ) ? $opening_hours : ''; ?>

<?php

if ( $show_quick_contact_form ) {
	?>
	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('#wcv_contact_response').hide();

			jQuery('#wcv_pro_quick_contact_form').on('submit', function (e) {

				if (document.getElementById("wcv_pro_quick_contact_form").checkValidity()) {

					jQuery('#wcv_quick_contact_send').val("Sending...");

					e.preventDefault();

					jQuery.ajax({
						url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
						type: 'POST',
						dataType: 'json',
						data: jQuery(this).serialize(),
						success: function (response, textStatus, jQxhr) {
							console.log(textStatus, response);
							jQuery('#wcv_quick_contact_send').val("<?php _e( 'Send Message', 'wcvendors-pro' ); ?>");
							if (response.data.status_code == 0) {
								jQuery('#wcv_contact_response').css('background-color', 'red');
							}
							jQuery('#wcv_contact_response').html(response.data.message).show();
							jQuery('#wcv_pro_quick_contact_form').hide();
						}
					});
				}
				return true;
			});
		});
	</script>
	<div id="wcv_contact_response" class="woocommerce-message"></div>
	<form name="wcv_pro_quick_contact_form" id="wcv_pro_quick_contact_form" method="post" action="">

		<input type="hidden" name="cc_admin" value="<?php echo $cc_admin; ?>"/>
		<input type="hidden" name="action" value="wcv_quick_contact"/>
		<input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'wcv_quick_contact' ); ?>"/>
		<input type="hidden" name="vendor" id="vendor" value="<?php echo $vendor_id; ?>">

		<?php do_action( 'wcv_quick_contact_before_subject' ); ?>

		<p>
			<input type="text" placeholder="<?php _e( 'Subject', 'wcvendors-pro' ); ?>"
				   name="wcv_quick_email_subject"
				   id="wcv_quick_email_subject"
				   required/>
		</p>
		<?php do_action( 'wcv_quick_contact_after_subject' ); ?>
		<p>
			<input type="email" placeholder="<?php _e( 'Email Address', 'wcvendors-pro' ); ?>"
				   name="wcv_quick_email_address"
				   id="wcv_quick_email_address"
				   required/>
		</p>
		<?php do_action( 'wcv_quick_contact_after_email' ); ?>
		<p>
			<textarea placeholder="<?php _e( 'Type your message here', 'wcvendors-pro' ); ?>"
					  name="wcv_quick_email_message"
					  id="wcv_quick_email_message" cols="30" rows="3"
					  required></textarea>
		</p>
		<?php do_action( 'wcv_quick_contact_after_message' ); ?>
		<p>
			<input id="wcv_quick_contact_send" type="submit" value="<?php _e( 'Send Message', 'wcvendors-pro' ); ?>">
		</p>

	</form>

	<?php echo ( $show_hours_after == 'form' ) ? $opening_hours : ''; ?>
	<?php
}
