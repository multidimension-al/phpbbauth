<?php
/**
 *      __  ___      ____  _     ___                           _                    __
 *     /  |/  /_  __/ / /_(_)___/ (_)___ ___  ___  ____  _____(_)___  ____   ____ _/ /
 *    / /|_/ / / / / / __/ / __  / / __ `__ \/ _ \/ __ \/ ___/ / __ \/ __ \ / __ `/ /
 *   / /  / / /_/ / / /_/ / /_/ / / / / / / /  __/ / / (__  ) / /_/ / / / // /_/ / /
 *  /_/  /_/\__,_/_/\__/_/\__,_/_/_/ /_/ /_/\___/_/ /_/____/_/\____/_/ /_(_)__,_/_/
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE file
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright  Copyright © 2018 Multidimension.al (http://multidimension.al)
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */

class PhpbbAuthHooks
{

    public function onPersonalUrls(array &$personal_urls, Title $title, SkinTemplate $skin)
    {

        global $wgPhpBBAuthForumDirectory;

        if (array_key_exists('login', $personal_urls)) {
            $personal_urls['login']['href'] = $wgPhpBBAuthForumDirectory . 'ucp.php?mode=login';
        }

        if (array_key_exists('anonlogin', $personal_urls)) {
            $personal_urls['anonlogin']['href'] = $wgPhpBBAuthForumDirectory . 'ucp.php?mode=login';
        }

        return true;

    }

}