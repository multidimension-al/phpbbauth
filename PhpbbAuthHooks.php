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
 * @copyright  Copyright © 2018-2019 Multidimension.al (http://multidimension.al)
 * @link       https://github.com/multidimension-al/phpbbauth phpBB Auth Github
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */

class PhpbbAuthHooks {

	public static function onPersonalUrls( array &$personal_urls, Title $title, SkinTemplate $skin ) {
		global $wgPhpbbAuthAbsolutePath, $wgServer;

		if ( array_key_exists( 'login', $personal_urls ) ) {
			$personal_urls['login']['href'] = $wgPhpbbAuthAbsolutePath . 'ucp.php?mode=login&redirect=' . urlencode( $wgCanonicalServer . $_SERVER[ 'REQUEST_URI' ] );
		}

		if ( array_key_exists( 'anonlogin', $personal_urls ) ) {
			$personal_urls['anonlogin']['href'] = $wgPhpbbAuthAbsolutePath . 'ucp.php?mode=login&redirect=' . urlencode( $wgCanonicalServer . $_SERVER[ 'REQUEST_URI' ] );
		}

		return true;
	}

}
