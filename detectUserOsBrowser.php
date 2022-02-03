<?php

//$_SERVER['HTTP_USER_AGENT']

/**
 * Match User agent with known OS patterns
 *
 * @param  string $userAgent
 **/
function getOS($userAgent) { 
    $osDetected  = 'Unknown OS';
    $knownPatterns = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );

    foreach ($knownPatterns as $regex => $osPlatform) {
        if (preg_match($regex, $userAgent)) {
            $osDetected = $osPlatform;
        }
    }
    return $osDetected;
}

/**
 * Match User agent with known broweser patterns
 *
 * @param  string $userAgent
 **/
function getBrowser($userAgent) {
    $browser = 'Unknown';
    if (preg_match('/MSIE/', $userAgent)) {
        $browser = 'Internet Explorer';
    } elseif (
        preg_match('/Chrome/', $userAgent)
        && preg_match('/Safari/', $userAgent)
        && !preg_match('/Edge/', $userAgent)
    ) {
        $browser = 'Chrome';
    } elseif (preg_match('/Firefox/', $userAgent)) {
        $browser = 'Firefox';
    } elseif (
        preg_match('/Safari/', $userAgent)
        && !preg_match('/Chrome/', $userAgent)
        && !preg_match('/Edge/', $userAgent)
    ) {
        $browser = 'Safari';
    } elseif (
        preg_match('/Chrome/', $userAgent)
        && preg_match('/Safari/', $userAgent)
        && preg_match('/Edge/', $userAgent)
    ) {
        $browser = 'Edge';
    } else {
        $browser = 'Internet Explorer 11';
    }
    return $browser;
}

