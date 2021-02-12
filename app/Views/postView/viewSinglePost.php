<?php include "inc/head.php"; ?>

<div class="navbar dark"> <?php include "inc/navigation.php"; ?> </div>
    
    <div class="container">

        <h1><?php echo $data["post"]->title; ?></h1>
        <p><?php echo $data["post"]->body; ?></p>

        <?php include "comment.php"; ?>

        <?php $this->flash('commentAdded', 'alert alert-success'); ?>

        <?php foreach ($data["comments"] as $comments) : ?>
            <div class="card w-75" style="text-align: left; color: #000; margin: 40px 0;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $this->getSession('userId'); ?></h5>
                    <p class="card-text"><?php echo $comments->comment; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html> 