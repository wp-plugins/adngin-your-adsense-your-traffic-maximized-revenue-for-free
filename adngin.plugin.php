<?php

$config = require('adngin.config.php');

function adngin_replace_scripts($buffer)
{
  global $config;

  $key = get_option('adngin_api_key', false);

  if (!$key) return $buffer;

	return str_replace($config['match_urls'], $config['replace_url'], $buffer);
}

function adngin_buffer_start()
{
	ob_start("adngin_replace_scripts");
}

function adngin_buffer_end()
{
	ob_end_flush();
}

function adngin_enqueue_scripts()
{
  $key = get_option('adngin_api_key', false);

  if (!$key) return;

  $src = '//srv.adngin.com/'.$key.'.js';
  wp_enqueue_script('adngin-script', $src, array(), null);
}

add_action('after_setup_theme', 'adngin_buffer_start');
add_action('shutdown', 'adngin_buffer_end');
add_action('wp_enqueue_scripts', 'adngin_enqueue_scripts');