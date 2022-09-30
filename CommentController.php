<?php

require_once __DIR__.'/Comment.php';
require_once __DIR__.'/Helpers/CommentHelper.php';

class CommentController extends Comment
{

    public function __CONSTRUCT()
    {
        $commentHelper = new CommentHelper();

        $author = $commentHelper->validateAuthor($_POST['author']);
        $comment = $commentHelper->validateComment($_POST['comment']);

        if ($author && $comment) {
            try {
                $this->insertComment($author, $comment);

                return $commentHelper->redirect('simple-comment-form.php');
            } catch (Exception $e) {
                echo 'DANGER: '. $e->getMessage();

                return $commentHelper->redirect('simple-comment-form.php');
            }
        }
    }


}
$controller = new CommentController();
