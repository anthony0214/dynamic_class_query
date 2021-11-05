<?php
	// access php session
	session_start();

	// site global defines
	define( 'USER_LEVEL_ADMIN', '1' );


	// include config (creds and things we keep out of www and repo)
	include_once __DIR__ . ( PHP_OS == 'Linux' ? '' : '/' ) . '/db/conf.php';
	//include_once __DIR__ . ( PHP_OS == 'Linux' ? '' : '/' ) . '/test/sqldemo/sqlClassCrud.php';

	// include global functions
	include_once __DIR__  . '/sqlClassCrud.php';
	include_once __DIR__  . '/php/functions.php';


