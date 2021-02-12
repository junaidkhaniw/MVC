<?php include "inc/head.php"; ?>

<div class="navbar dark"> <?php include "inc/navigation.php"; ?> </div>
    
    <div class="container">

        <h1><?php echo $data["post"]->title; ?></h1>
        <p><?php echo $data["post"]->body; ?></p>
    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html> 