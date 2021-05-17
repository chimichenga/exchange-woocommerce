<?php

/**
 * Currency conversion adaptation
 */

// Render converted total value
function converted_totals_notice(){
	$currency = get_woocommerce_currency();
	if( 'RSD' != $currency ){
		$cart_total = WC()->cart->get_cart_contents_total();
		$rsd_total = get_rsd_value($cart_total, $currency);

		echo '<p>'.__('NOTICE, all payments will be converted to RSD (Serbian Dinar) currency before payment. Coversion rates may apply.', 'allsecureexchange').'</p>';
		echo '<p>'.__('Total converted price in RSD is (approx.): ', 'allsecureexchange').'<b>'.wc_price($rsd_total, array( 'currency'=>'RSD', 'price_format'=> '%2$s&nbsp;%1$s' )).'</b></p>';
	}
}
add_action('woocommerce_review_order_before_payment', 'converted_totals_notice');

function get_rsd_value($amount, $currency){
	$html = file_get_contents('https://www.nbs.rs/kursnaListaModul/srednjiKurs.faces');
	$dom = new DOMDocument();
	libxml_use_internal_errors(true);
	$dom->loadHtml($html);
	$table = $dom->getElementById('index:srednjiKursLista');

	$Header = $table->getElementsByTagName('th');
	$Detail = $table->getElementsByTagName('td');

	// Get header name of the table
	$aDataTableHeaderHTML = [];
	foreach($Header as $NodeHeader) {
		$aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
	}

	// Get row data/detail table without header name as key
	$i = 0;
	$j = 0;
	$rows = [];
	foreach($Detail as $sNodeDetail) {
		$rows[$j][] = trim($sNodeDetail->textContent);
		$i = $i + 1;
		$j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
	}

	$exchange_rates = [];
	foreach($rows as $row) {
		$exchange_rates[$row[0]] = $row[4];
	}

	// Conversion failed
	if( !array_key_exists($currency, $exchange_rates) || $exchange_rates[$currency] == null){
		// TODO change email to: get_bloginfo('admin_email')
		wp_mail( 'dev@supercluster.studio', 'Conversion failed', 'Failed to fetch exchange rates data, please contact payment system administrator.' );
		return null;
	}

	return $amount * $exchange_rates[$currency];
}

// Order details pages and email template
add_action( 'woocommerce_order_details_after_order_table', 'order_conversion_meta', 20 );
add_action( 'woocommerce_email_after_order_table', 'order_conversion_meta', 10, 4 );
function order_conversion_meta( $order ){
	get_rsd_value(6, 'EUR');
	$order = wc_get_order($order);
	$converted_total = $order->get_meta('Converted_Total_RSD');
	if( $converted_total )
		echo '<p class="converted-val"><b>'.__('Converted total (approx.): ', 'allsecureexchange').'</b>'.wc_price($converted_total, array( 'currency'=>'RSD', 'price_format'=> '%2$s&nbsp;%1$s' )).'</p>';
}
