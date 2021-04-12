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

	$visa = $mastercard = $maestro = $amex = $diners = $jcb = $dina = '';
	$image_url_prefix = plugins_url() . '/allsecureexchange/assets/images/' . $selectedBanner;

	if (strpos($selectedCards, 'VISA') !== false) {
		$visa = '<img src="' . $image_url_prefix . '/visa.svg">';
	}
	if (strpos($selectedCards, 'MASTERCARD') !== false) {
		$mastercard = '<img src="' . $image_url_prefix . '/mastercard.svg">';
	}
	if (strpos($selectedCards, 'MAESTRO') !== false) {
		$maestro = '<img src="' . $image_url_prefix . '/maestro.svg">';
	}
	if (strpos($selectedCards, 'AMEX') !== false) {
		$amex = '<img src="' . $image_url_prefix . '/amex.svg">';
	}
	if (strpos($selectedCards, 'DINERS') !== false) {
		$diners = '<img src="' . $image_url_prefix . '/diners.svg">';
	}
	if (strpos($selectedCards, 'JCB') !== false) {
		$jcb = '<img src="' . $image_url_prefix . '/jcb.svg">';
	}
	if (strpos($selectedCards, 'DINA') !== false) {
		$dina = '<img src="' . $image_url_prefix . '/dina.svg">';
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
	$bank = '<a href="'.$bankUrl.'" target="_new" ><img src="' . plugins_url(). '/allsecureexchange/assets/images/'.$selectedBanner.'/'.$selectedBank.'.svg"></a>';
	$vbv = '<img src="' . plugins_url(). '/allsecureexchange/assets/images/'.$selectedBanner.'/visa_secure.svg">';
	$mcsc = '<img src="' . plugins_url(). '/allsecureexchange/assets/images/'.$selectedBanner.'/mc_idcheck.svg">';
	$allsecure_cards = $visa.''.$mastercard.''.$maestro.''.$diners.''.$amex.''.$jcb.''.$dina ;

	$banner_items = $allsecure.$vbv.$mcsc.$allsecure_cards;
	if ($selectedBank !== 'none')
		$banner_items .= $bank;

	$allsecure_banner = '
		<div id="allsecure_exchange_banner">
			'.$banner_items.'
		</div>';

	return $allsecure_banner;
}

// Registering banner shortcode
add_shortcode('allsecure_banner','allsecure_banner_shortcode');
function allsecure_banner_shortcode( $atts ){
	wp_enqueue_style( 'allsecure_style', plugins_url(). '/allsecureexchange/assets/css/allsecure-exchange-style.css', array(), null );

	ob_start();
	echo get_allsecure_banner_html();
	return ob_get_clean();
}

