<?php

namespace MySite;

class Session
{
    public function start()
    {
        session_start();
    }

    public function setData(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function getData(string $key)
    {
        return (!empty($_SESSION[$key])) ? $_SESSION[$key] : null;
    }

    public function save(): void
    {
        session_write_close();
    }

    public function flush(string $key)
    {
        $value = $this->getData($key);
        $this->unset($key);

        return $value;
    }

    private function unset(string $key): void
    {
        unset($_SESSION[$key]);
    }
}
