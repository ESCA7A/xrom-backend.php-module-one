<?php

require_once __DIR__.'/QueryBuilder.php';

class Comment extends QueryBuilder
{
    private static $queryBuilder;

    public function __CONSTRUCT()
    {
        if (!self::$queryBuilder) {
            try {
                self::$queryBuilder = new QueryBuilder();
                $this->comment();
            } catch (Exception $e) {
                exit('<pre> table message!!! : ' . $e->getMessage());
            }

            return self::$queryBuilder;
        }
    }
}

$classCom = new Comment();
