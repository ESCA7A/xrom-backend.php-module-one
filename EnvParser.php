<?php

class EnvParser
{
    public $env;
    public $DB_DATA = [];

    public function getEnv(): array
    {
        $this->env = fopen(__DIR__.'/.env', 'r');

        $database = rtrim(fgets($this->env));
        $database = explode('=', $database);
        $this->DB_DATA['DB_NAME'] = $database[1];

        $username = rtrim(fgets($this->env));
        $username = explode('=', $username);
        $this->DB_DATA['USERNAME'] = $username[1];


        $password = rtrim(fgets($this->env));
        $password = explode('=', $password);
        $this->DB_DATA['PASSWORD'] = $password[1];

        return $this->DB_DATA;
    }
}