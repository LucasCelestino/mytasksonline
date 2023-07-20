<?php

namespace App\Core;

class Session
{
    /**
     * @return object|null
     */
    public function all(): ?object
    {
        return (object)$_SESSION;
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return Session
     */
    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
        return $_SESSION[$key];
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public static function unset(string $key): bool
    {
        unset($_SESSION[$key]);
        return true;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @return bool
     */
    public static function regenerate(): bool
    {
        if(!session_regenerate_id(true))
        {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public static function destroy(): bool
    {
        session_destroy();
        return true;
    }

    public static function csrf()
    {
        $_SESSION['csrf_token'] = md5(uniqid(rand(), true));

        return $_SESSION['csrf_token'];
    }
}