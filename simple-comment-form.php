<?php
/**
 * Create simple comment form for init commentaries
 */
?>

<html>
<head>
    <title>module-one</title>
</head>
<body>
<div style="margin-left: 30%">
    <form method="POST" action="#">
        <div style="border: 5px outset; width: 40%">
            <div style="padding: 5%">
                <input name="author" type="text" placeholder="enter name">
            </div>
            <div style="padding: 5%">
                <textarea name="comment" placeholder="enter a comment"></textarea>
            </div>
            <div style="padding: 5%; margin-left: 70%;">
                <input type="submit">
            </div>
        </div>
    </form>
</div>
</body>
</html>
