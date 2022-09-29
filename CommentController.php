<?php

require __DIR__.'/Comment.php';
require __DIR__.'/Helpers/CommentHelper.php';

class CommentController extends Comment
{
    public string $url = 'http://localhost:8000/';
    public array $data = [];

    public function __CONSTRUCT()
    {
        $commentHelper = new CommentHelper();
        $author = $commentHelper->validateAuthor($_POST['author']);
        $comment = $commentHelper->validateComment($_POST['comment']);

        if ($author && $comment) {
            try {
                if ($this->insertComment($author,  $comment)){

                    $this->insertComment($author, $comment);

                    return $this->redirect('simple-comment-form.php');
                }
            } catch (Exception $e) {
                echo 'DANGER: '. $e->getMessage();

                return $this->redirect('simple-comment-form.php');
            }
        }
    }

    public function redirect($url, $permanent = false)
    {
        return header('Location: ' . $this->url.$url, true, $permanent ? 301 : 302);
    }
}
$controller = new CommentController();
