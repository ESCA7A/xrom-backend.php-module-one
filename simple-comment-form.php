<?php
/**
 * Create simple comment form for init commentaries
 */
require_once __DIR__.'/Helpers/CommentHelper.php';
$commentHelper = new CommentHelper();
$comments = $commentHelper->indexComment(new Comment());
?>

<html>
<head>
    <title>module-one</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<!--BOOTSTRAP 5-->
<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
                <!-- FORM -->
                <form method="POST" action="./CommentController.php">
                    <div class="form-outline mb-4">
                        <input name="author" class="card mb-4 card-body" type="text" placeholder="enter name">
                        <textarea name="comment" type="text" id="addANote" class="form-control" placeholder="Type comment..."></textarea>
                        <input type="submit" value="Add a note" class="form-label" for="addANote">
                    </div>
                </form>
                <?php foreach ($comments as $comment): ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <p><?= $comment['comment'] ?></p>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25"
                                         height="25" />
                                    <p class="small mb-0 ms-2"><?= $comment['author'] ?></p>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <p class="small text-muted mb-0">created at: <?= $comment['created_at'] ?></p>
                                    <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
