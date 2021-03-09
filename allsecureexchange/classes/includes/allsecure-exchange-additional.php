<?php

/* Add custom order actions to meta box */
add_action( 'woocommerce_order_actions', 'add_custom_order_for_preath', 10 ,1 );
function add_custom_order_for_preath( $actions ) {
	global $theorder;
	/* Action will show only if status is 'preauth' */
	if ( ! $theorder->has_status( array( 'preauth' ) ) ) {
		return $actions;
	}
	$actions['allsecure_capture'] = __( 'AllSecure Capture', 'allsecureexchange' );
	$actions['allsecure_reverse'] = __( 'AllSecure Reverse', 'allsecureexchange' );
	return $actions;
}

// add_action( 'woocommerce_order_actions', 'add_custom_order_for_accepted', 10 ,1 );
// function add_custom_order_for_accepted( $actions ) {
	// global $theorder;	
	// /* Action will show only if status is 'accepted' */
	// if ( ! $theorder->has_status( array( 'accepted' ) ) ) {
		// return $actions;
	// }
	// $actions['allsecure_reverse'] = __( 'AllSecure Refund', 'allsecureexchange' );
	// return $actions;
// }

/* Show Statuses in Admin Panel */
add_action( 'init', 'add_custom_order_status' );function add_custom_order_status() {
	register_post_status( 'wc-preauth', 
		array(
			'label'                     => _x( 'preauth', 'WooCommerce Order Status', 'allsecureexchange' ),
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label_count'               => _n_noop( 'Preauth <span class="count">(%s)</span>', 'Preauth <span class="count">(%s)</span>' )
		)
	);
			
	register_post_status( 'wc-accepted', 
		array(
			'label'                     => _x( 'Accepted', 'WooCommerce Order Status', 'allsecureexchange' ),
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label_count'               => _n_noop( 'Accepted <span class="count">(%s)</span>', 'Accepted <span class="count">(%s)</span>' )
		)
	);
			
	register_post_status( 'wc-reversed', 
		array(
			'label'                     => _x( 'Reversed', 'WooCommerce Order Status', 'allsecureexchange' ),
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label_count'               => _n_noop( 'Reversed <span class="count">(%s)</span>', 'Reversed <span class="count">(%s)</span>' )
		)
	);
}

/* Add new order statuses to woocommerce */
add_filter( 'wc_order_statuses', 'add_order_statuses' );
function add_order_statuses( $order_status ) {
	$order_status['wc-preauth'] = _x( 'Preauth', 'Preauth Order Status', 'allsecureexchange' );
	$order_status['wc-accepted'] = _x( 'Accepted', 'Accepted Order Status', 'allsecureexchange' );
	$order_status['wc-reversed'] = _x( 'Reversed', 'Reversed Order Status', 'allsecureexchange' );
	return $order_status;
}  
 
/* Change Status by number order  */
add_filter( 'wc_order_statuses', 'change_statuses_order' );		
function change_statuses_order( $wc_statuses_arr ){	
	$new_statuses_arr = array(
		'wc-preauth' => $wc_statuses_arr['wc-preauth'], // 1
		'wc-accepted' => $wc_statuses_arr['wc-accepted'], // 2
		'wc-reversed' => $wc_statuses_arr['wc-reversed'], // 3	
		'wc-processing' => $wc_statuses_arr['wc-processing'], //4
		'wc-completed' => $wc_statuses_arr['wc-completed'], //5
		'wc-cancelled' => $wc_statuses_arr['wc-cancelled'], 	//6
		'wc-failed' => $wc_statuses_arr['wc-failed'], // 7
		'wc-pending' => $wc_statuses_arr['wc-pending'], // 8
		'wc-on-hold' => $wc_statuses_arr['wc-on-hold'], // 9
		'wc-refunded' => $wc_statuses_arr['wc-refunded'] // 10
	);		
	return $new_statuses_arr;
}

/* This function hides Refund button */
add_action('admin_head', 'hide_wc_refund_button');
function hide_wc_refund_button() {
	global $post;
	/* Here you can choose from which user roles to hide button from */
	if (!current_user_can('administrator') || current_user_can('editor') || current_user_can('author') || current_user_can('contributor') || current_user_can('subscriber')  ) {
        return;
    }
    if (strpos($_SERVER['REQUEST_URI'], 'post.php?post=') === false) {
        return;
    }
    if (empty($post) || $post->post_type != 'shop_order') {
        return;
    }
	?><script>jQuery(function () { jQuery('.refund-items').hide(); jQuery('.order_actions option[value=send_email_customer_refunded_order]').remove(); if (jQuery('#original_post_status').val()=='wc-refunded') {jQuery('#s2id_order_status').html('Refunded'); } else { jQuery('#order_status option[value=wc-refunded]').remove(); } }); </script><?php
}

// Recurring payments
// Add custom order action for recurring payments
add_action( 'woocommerce_order_actions', 'add_custom_order_for_recurring', 10 ,1 );
function add_custom_order_for_recurring( $actions ) {
	global $theorder;
	/* Action will show only if status is 'scheduled' */
	if ( $theorder->get_meta( 'AS_RecurringActive' ) !== 'yes' ) {
		return $actions;
	}
	$actions['allsecure_cancel_recurring'] = __( 'AllSecure Cancel Recurring', 'allsecureexchange' );
	return $actions;
}

// Add order actions to 'My Account' page
add_filter( 'woocommerce_my_account_my_orders_actions', 'as_my_account_orders_actions', 50, 2 );
function as_my_account_orders_actions( $actions, $order ) {
	if ( $order->get_meta( 'AS_RecurringActive' ) == 'yes' ) {
		$actions['allsecure_cancel_recurring'] = array(
			'url'  => wp_nonce_url( admin_url( 'admin-ajax.php?action=allsecure_cancel_recurring&order='.$order->get_id() ), 'allsecure_cancel_recurring' ),
			'name' => _x( 'Cancel', 'Cancel recurring payment', 'allsecureexchange' )
		);
	}
	return $actions;
}

add_action('wp_ajax_allsecure_cancel_recurring', 'allsecure_cancel_recurring' );
function allsecure_cancel_recurring(){
	if( !check_admin_referer( 'allsecure_cancel_recurring' ) ){
		echo 'You are not allowed on this page.';
		exit;
	}

	global $woocommerce;
	$order = wc_get_order( $_REQUEST['order'] );

	$status = update_post_meta( $order->get_id(), 'AS_RecurringActive', 'no' );
	if ( $status ) {
		$order->add_order_note(sprintf(__('AllSecure Canceling Recurring Payments Successful.', 'allsecureexchange') ));
//		return true;
	} else {
		$order->add_order_note(sprintf(__('AllSecure Failed Canceling Recurring Payments.', 'allsecureexchange') ));
//		return false;
	}

	wp_redirect( wc_get_account_endpoint_url( 'orders' ) );
	exit;
}