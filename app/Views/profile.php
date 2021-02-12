<?php require "inc/head.php"; ?>

    <div class="navbar dark"> <?php require "inc/navigation.php"; ?> </div>
        
    <div class="container">

        <h2>Hello</h2>
        <h1><?php echo $this->getSession('userId'); ?></h1>
        <p><?php echo $data["user"]->name; ?></p>

    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html> 