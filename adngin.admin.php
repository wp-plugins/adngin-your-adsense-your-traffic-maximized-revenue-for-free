<?php

function adngin_test_api_key($key)
{
	$url = 'http://srv.adngin.com/'.$key.'.js';
	$handle = curl_init($url);

	curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);

	$response = curl_exec($handle);
	$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

	curl_close($handle);

	return $httpCode == 200;
}

function adngin_menu_page()
{
	$key = sanitize_text_field($_POST['adngin_api_key']);

	if (!empty($key))
	{
		$valid = adngin_test_api_key($key);

		if ($valid) update_option('adngin_api_key', $key);
	}

	require 'adngin.admin.page.php';
}

function adngin_menu()
{
	$icon = plugins_url('img/icon.png', __FILE__);

	add_menu_page('Adngin', 'Adngin', 'manage_options', 'adngin', 'adngin_menu_page', $icon);
}

add_action('admin_menu', 'adngin_menu');
