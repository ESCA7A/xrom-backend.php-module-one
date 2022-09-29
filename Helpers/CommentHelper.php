<?php

class CommentHelper
{
    public function validateAuthor($author): string
    {
        $author = trim(htmlspecialchars($author));

        try {
            if (0 !== preg_match_all('/[" "]+/', $author)) {
                throw new Exception('Oooooops: remove spaces'. PHP_EOL);
            }

            if (0 != preg_match_all('/[0-9]+/', $author)) {
                throw new Exception('Oooooops: remove numbers'. PHP_EOL);
            }

        } catch (Exception $e) {
            echo $e->getMessage();

            return false;
        }

        return $author;

    }

    public function validateComment($comment): bool|string
    {
        $comment = trim(htmlspecialchars($comment));

        try {
            if (!$comment) {
                throw new Exception('Comment cant be empty!'. PHP_EOL);
            }
        } catch (Exception $e) {
            echo $e->getMessage();

            return false;
        }

        return $comment;
    }
}