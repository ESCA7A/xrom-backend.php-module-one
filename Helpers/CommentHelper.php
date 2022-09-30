<?php

require_once __DIR__.'/../Comment.php';

class CommentHelper extends Comment
{
    public string $url = 'http://localhost:8000/';

    /**
     * @param $url
     * @return null
     */
    public function redirect($url)
    {
        return header('Location: ' . $this->url.$url, true, 301);
    }

    /**
     * @param $author
     * @return string
     */
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

    /**
     * @param $comment
     * @return bool|string
     */
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

    public function indexComment(Comment $comment): array|false
    {
        $comments =  $comment->queryFetchAllAssoc('SELECT author, comment, created_at FROM comments ORDER BY id DESC');

        if (is_array($comments)) {
            try {
                return $comments;
            } catch (Exception $e) {
                exit ('<pre>'. 'something trouble when we getting comments'. PHP_EOL . $e->getMessage());
            }
        }

        return false;
    }
}