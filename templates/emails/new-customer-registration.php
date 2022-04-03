<?php
/**
 * New Customer Email.
 *
 * An email sent to the admin when a new customer is registered.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
<p>
    <?php esc_html_e( 'Hello there,', 'woocom-toolkit' ); ?>
    <br>
    <?php esc_html_e( 'A new customer has registered in your store ', 'woocom-toolkit' ); ?>
    <?php echo esc_html( $data['site_name'] ); ?>
</p>
<p>
    <?php esc_html_e( 'Customer Details:', 'woocom-toolkit' ); ?>
    <hr>
</p>
<ul>
    <li>
        <strong>
            <?php esc_html_e( 'Customer:', 'woocom-toolkit' ); ?>
        </strong>
        <?php printf( '<a href="%s">%s</a>', esc_url( $data['customer_edit'] ), esc_html( $data['customer_name'] ) ); ?>
    </li>
</ul>
<p>
    <?php echo wp_kses_post( sprintf( __( 'To edit customer access and details <a href="%s">Click Here</a>', 'woocom-toolkit' ), esc_url( $data['customer_edit'] ) ) ); ?>
</p>

<?php

do_action( 'woocommerce_email_footer', $email );