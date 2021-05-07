<?php
	/*
	 Plugin Name: Tester
	 Plugin URI: http://accessally.com
	 Text Domain: accessally
	 Description: Testing trigger testing endpoint
	 Version: 1.0.0
	 Author: AccessAlly
	 Author URI: http://accessally.com
	*/

	add_action( 'rest_api_init', function () {
		register_rest_route( 'tester/api', '/branch/(?P<rev>\d+)', array(
			'methods'  => 'GET',
			'callback' => 'tester_trigger_testing_endpoint_callback',
		) );
	} );

	add_filter( 'http_request_host_is_external', 'allow_custom_host', 10, 3 );
	function allow_custom_host( $allow, $host, $url ) {
		return true;
	}

	function tester_trigger_testing_endpoint_callback( WP_REST_Request $request ) {
		$svn_rev = $request['rev'];
		error_log('Starting tests for rev ' . $svn_rev . '.');
	}