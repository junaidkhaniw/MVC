<?php require "inc/head.php"; ?>

<div class="navbar dark"> <?php require "inc/navigation.php"; ?> </div>
    
    <div class="container">
        <?php foreach ($data as $user) : ?>
            <h1><?php echo $user->username; ?></h1>
            <p><?php echo $user->email; ?></p>
        <?php endforeach ?>
    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html> 