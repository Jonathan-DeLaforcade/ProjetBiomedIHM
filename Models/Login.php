<?php

class Session
{

    private static $salts;

    public static function setSalts($sessionKey, $logoutKey) {
        self::$salts = array('session_key' => $sessionKey,
                             'logout_key' => $logoutKey);
    }

    private static function generateSessionKey($userId) {
        return sha1(self::$salts['session_key'] . time() . $userId);
    }

    private static function generateLogoutKey($userId) {
        return sha1(self::$salts['logout_key'] . time() . $userId);
    }

    public static function resume($userId, $sessionKey) {
        // Check a session exists
        if (!$session = self::exists($userId, $sessionKey)) {
            return false;
        }

        // Create a user instance
        $user = new User($userId);
        // Return false if user not found
        if (!$user) {
            return false;
        }
        // Set session details with user
        $user->sessionKey = $session['session_key'];
        $user->logoutKey = $session['logout_key'];
        return $user;
    }

    public static function close(User $user) {
        // Prepare params
        $userId = $user->id;
        $sessionKey = $user->sessionKey;
        $logoutKey = $user->logoutKey;

        // Prepare delete query
        $delete = Db::prepare('DELETE FROM sessions WHERE user = ? AND session_key = ? AND logout_key = ? LIMIT 1');
        $delete->bind_param('iss', $userId, $sessionKey, $logoutKey);
        $delete->execute();
        $rows = $delete->affected_rows;
        $delete->close();

        // If no session found return false
        // Shouldn't happen unless this method allowed to be called by non-authed users
        if ($rows == 0) {
            return false;
        }
        return true;
    }

    private static function exists($userId, $sessionKey) {
        // Prepare check query
        $query = 'SELECT session_key, logout_key FROM sessions WHERE user = ? AND session_key = ? AND expires > NOW() LIMIT 1';
        $check = Db::prepare($query);
        $check->bind_param('is', $userId, $sessionKey);
        $check->execute();
        $check->store_result();
        // Return false if session didn't exist
        if ($check->num_rows == 0) {
            $check->close();
            return false;
        }

        // Return session and logout keys
        $return = array();
        $check->bind_result($return['session_key'], $return['logout_key']);
        $check->fetch();
        $check->close();

        return $return;
    }
}