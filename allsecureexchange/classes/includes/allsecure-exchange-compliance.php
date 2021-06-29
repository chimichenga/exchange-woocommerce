<?php
/* Add the gateway footer to WooCommerce */

function allsecureexchange_banner_footer() {
	$selected_allsecure = new WC_AllsecureExchange_CreditCard;
	$selectedBanner = $selected_allsecure->get_selected_banner();

	if ($selectedBanner !== 'none') {
		wp_enqueue_style( 'allsecure_style', plugins_url(). '/allsecureexchange/assets/css/allsecure-exchange-style.css', array(), null );
		echo get_allsecure_banner_html();
	}
}
add_filter('wp_footer', 'allsecureexchange_banner_footer');

function get_allsecure_banner_html(){
	$selected_allsecure = new WC_AllsecureExchange_CreditCard;
	$selectedCards = $selected_allsecure->get_selected_cards();
	$selectedBank = $selected_allsecure->get_merchant_bank();
	$selectedBanner = $selected_allsecure->get_selected_banner();
	if( $selectedBanner == 'none')
		$selectedBanner = 'light';

	$visa = $mastercard = $maestro = $amex = $diners = $jcb = $dinacard = '';
	$image_url_prefix = plugins_url() . '/allsecureexchange/assets/images/' . $selectedBanner;

	if (strpos($selectedCards, 'VISA') !== false) {
		$visa = '<img class="visa-card" src="' . $image_url_prefix . '/visa.svg">';
	}
	if (strpos($selectedCards, 'MASTERCARD') !== false) {
		$mastercard = '<img class="mastercard-card" src="' . $image_url_prefix . '/mastercard.svg">';
	}
	if (strpos($selectedCards, 'MAESTRO') !== false) {
		$maestro = '<img class="maestro-card" src="' . $image_url_prefix . '/maestro.svg">';
	}
	if (strpos($selectedCards, 'AMEX') !== false) {
		$amex = '<img class="amex-card" src="' . $image_url_prefix . '/amex.svg">';
	}
	if (strpos($selectedCards, 'DINERS') !== false) {
		$diners = '<img class="diners-card" src="' . $image_url_prefix . '/diners.svg">';
	}
	if (strpos($selectedCards, 'JCB') !== false) {
		$jcb = '<img class="jcb-card" src="' . $image_url_prefix . '/jcb.svg">';
	}
	if (strpos($selectedCards, 'DINACARD') !== false) {
		$dinacard = '<img class="dina-card" src="' . $image_url_prefix . '/dinacard.svg">';
	}

	$allsecure = '<a href="https://www.allsecure.rs" target="_new"><img src="' . plugins_url(). '/allsecureexchange/assets/images/'.$selectedBanner.'/allsecure.svg"></a>';
	if ($selectedBank == 'hbm') {
		$bankUrl = 'https://www.hipotekarnabanka.com/';
	} else if ($selectedBank == 'aik') {
		$bankUrl = 'https://www.aikbanka.rs/';
	} else if ($selectedBank == 'bib') {
		$bankUrl = 'https://www.bancaintesa.rs/';
	} else if ($selectedBank == 'nlb-mne') {
		$bankUrl = 'https://www.nlb.me/';
	} else if ($selectedBank == 'ckb') {
		$bankUrl = 'https://www.ckb.me/';
	} else {
		$bankUrl = '#';
	}
	$bank = '
		<a href="'.$bankUrl.'" class="bank-logo" target="_new" >
			<img src="' . plugins_url(). '/allsecureexchange/assets/images/'.$selectedBanner.'/'.$selectedBank.'.svg">
		</a>';
	$vbv = '
		<a href="https://rs.visa.com/pay-with-visa/security-and-assistance/protected-everywhere.html" target="_blank">
			<img src="' . plugins_url(). '/allsecureexchange/assets/images/'.$selectedBanner.'/visa_secure.svg">
		</a>';
	$mcsc = '
		<a href="http://www.mastercard.com/rs/consumer/credit-cards.html" target="_blank">
			<img src="' . plugins_url(). '/allsecureexchange/assets/images/'.$selectedBanner.'/mc_idcheck.svg">
		</a>';

	$allsecure_cards = $visa.''.$mastercard.''.$maestro.''.$diners.''.$amex.''.$jcb.''.$dinacard;

	if ($selectedBank == 'none')  {
		$banner_items = $allsecure.$vbv.$mcsc.$allsecure_cards;
	} else if ($selectedBank == 'bib') {
		$banner_items = $allsecure.$vbv.$mcsc.$bank.$allsecure_cards;
	} else {
		$banner_items = $allsecure.$vbv.$mcsc.$bank.$allsecure_cards;
	}

	return '
		<div id="allsecure_exchange_banner">
			' . $banner_items . '
		</div>';
}

// Registering banner shortcode
add_shortcode('allsecure_banner','allsecure_banner_shortcode');
function allsecure_banner_shortcode( $atts ){
	wp_enqueue_style( 'allsecure_style', plugins_url(). '/allsecureexchange/assets/css/allsecure-exchange-style.css', array(), null );

	ob_start();
	echo get_allsecure_banner_html();
	return ob_get_clean();
}

