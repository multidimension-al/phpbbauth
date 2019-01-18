<?php
/**
 *      __  ___      ____  _     ___                           _                    __
 *     /  |/  /_  __/ / /_(_)___/ (_)___ ___  ___  ____  _____(_)___  ____   ____ _/ /
 *    / /|_/ / / / / / __/ / __  / / __ `__ \/ _ \/ __ \/ ___/ / __ \/ __ \ / __ `/ /
 *   / /  / / /_/ / / /_/ / /_/ / / / / / / /  __/ / / (__  ) / /_/ / / / // /_/ / /
 *  /_/  /_/\__,_/_/\__/_/\__,_/_/_/ /_/ /_/\___/_/ /_/____/_/\____/_/ /_(_)__,_/_/
 *
 * phpBB Auth: MediaWiki Authentication Extension
 * Copyright (c) Multidimension.al (http://multidimension.al)
 * Github : https://github.com/multidimension-al/phpbbauth
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE file
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright  Copyright © 2018 Multidimension.al (http://multidimension.al)
 * @link       https://github.com/multidimension-al/phpbbauth phpBB Auth Github
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */

if ( !isset( $wgPhpbbAuthForumDirectory ) ) {
	$wgPhpbbAuthForumDirectory = './../phpBB3/';
}

define( 'PHPBB_ROOT_PATH', $wgPhpbbAuthForumDirectory );
define( 'IN_PHPBB', true );

$phpbb_root_path = PHPBB_ROOT_PATH;
$phpEx = substr( strrchr( __FILE__, '.' ), 1 );
require $phpbb_root_path . 'common.' . $phpEx;

// Start session management
$user->session_begin();
$auth->acl( $user->data );
$user->setup();
$request->enable_super_globals();

if ( !$wgPhpbbAuthAbsolutePath ) {
	if($user->data['force_server_vars']){
		$wgPhpbbAuthAbsolutePath = ($user->data['server_protocol'] ? $user->data['server_protocol'] : '//') . $user->data['server_name'] . $user->data['script_path'] . '/';
	} else {
		$wgPhpbbAuthAbsolutePath = realpath($wgPhpbbAuthForumDirectory);	
	}
}

if ( $user->data['user_id'] != ANONYMOUS && !$user->data['is_bot'] ) {

	if($wgPhpbbAuthNameFormat == 'phpbb'){
		$wgAuthRemoteuserUserName = $user->data['username'];
	} else {
		$wgAuthRemoteuserUserName = ucfirst( strtolower( $user->data['username'] ) );
	}
	$wgAuthRemoteuserUserPrefs = [
		'realname' => $user->data['username'],
		'language' => 'en',
		'disablemail' => 0
	];
	$wgAuthRemoteuserUserPrefsForced = [
		'email' => $user->data['user_email']
	];
	$wgDefaultUserOptions['disablemail'] = 0;
	$wgHiddenPrefs[] = 'disablemail';

	$wgAuthRemoteuserUserUrls = [
		'logout' => $wgPhpbbAuthAbsolutePath . 'ucp.php?mode=logout&sid=' . $user->session_id
	];

}
