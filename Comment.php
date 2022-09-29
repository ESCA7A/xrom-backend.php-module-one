<?php

require __DIR__.'/QueryBuilder.php';

class Comment extends QueryBuilder
{
    protected DB $conn;
    private QueryBuilder $queryBuilder;

    public function __CONSTRUCT()
    {
        $this->queryBuilder = new QueryBuilder();
        $this->query(self::$comment)->execute();
    }
}

$classCom = new Comment();
