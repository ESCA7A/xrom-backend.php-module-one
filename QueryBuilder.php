<?php

require_once __DIR__.'/DB.php';

class QueryBuilder extends DB
{
    public static string $comment = "CREATE TABLE IF NOT EXISTS comments (
             id BIGINT AUTO_INCREMENT PRIMARY KEY,
             author VARCHAR(32) NOT NULL,
             comment TEXT NOT NULL,
             created_at DATETIME
         );";

    public function comment(): bool
    {
        return $this->query(self::$comment)->execute();
    }

    public function insertComment($author, $comment): bool
    {
        $query = "INSERT INTO comments(author, comment, created_at) VALUES (:author, :comment, current_timestamp)";

        return $this->prepare($query)->execute([
            'author' => $author,
            'comment' => $comment,
        ]);
    }
}
