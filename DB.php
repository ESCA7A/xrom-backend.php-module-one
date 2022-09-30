<?php

require_once __DIR__.'/EnvParser.php';

class DB
{
    public static $PDOinstance;

    /**
     * @throws Exception
     */
    public function __CONSTRUCT()
    {
        $env = new EnvParser();
        $env = $env->getenv();

        if(!self::$PDOinstance) {
            try {
                self::$PDOinstance = new \PDO('mysql:host=localhost;'.'dbname='.$env['DB_NAME'], $env['USERNAME'], $env['PASSWORD']);
            } catch (PDOException $e) {
                die('server is temporarily suspended: '. $e->getMessage());
            }

            return self::$PDOinstance;
        }
    }

    public function beginTransaction(): bool
    {
        return self::$PDOinstance->beginTransaction();
    }

    public function commit(): bool
    {
        return self::$PDOinstance->commit();
    }

    public function exec($statement): bool|int
    {
        return self::$PDOinstance->exec($statement);
    }

    public function prepare($statement): bool|PDOStatement
    {
        return self::$PDOinstance->prepare($statement);
    }

    public function query($statement): bool|PDOStatement
    {
        return self::$PDOinstance->query($statement);
    }

    public function queryFetchAllAssoc($statement): bool|array
    {
        return self::$PDOinstance->query($statement)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryFetchRowAssoc($statement) {
        return self::$PDOinstance->query($statement)->fetch(PDO::FETCH_ASSOC);
    }


    public function queryFetchColAssoc($statement) {
        return self::$PDOinstance->query($statement)->fetchColumn();
    }


    public function quote ($input, $parameter_type=0): bool|string
    {
        return self::$PDOinstance->quote($input, $parameter_type);
    }


    public function rollBack(): bool
    {
        return self::$PDOinstance->rollBack();
    }


    public function setAttribute($attribute, $value  ): bool
    {
        return self::$PDOinstance->setAttribute($attribute, $value);
    }
}