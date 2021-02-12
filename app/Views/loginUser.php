<?php require "inc/head.php"; ?>

    <div class="navbar dark"> <?php require "inc/navigation.php"; ?> </div>
        
    <div class="container">

        <?php $this->flash('accountCreated', 'alert alert-success') ?>

        <h2>It's now or never</h2>
        <h1>Come on , Join us!</h1>
    
        <form action="<?php echo URLROOT; ?>/userController/loginUserController" method="post" id="join-us">
            <div class="fields">
                <span>
                    <input name="username" placeholder="Userame" type="text" value="<?php if(!empty($data["username"])) { echo $data["username"]; } ?>" />
                    <div class="error red">
                        <?php if (!empty($data["loginUsernameError"])) {
                            echo $data["loginUsernameError"];
                        } ?>
                    </div>
                </span>
                <br />
                <span>
                    <input name="password" placeholder="Password" type="password" value="<?php if(!empty($data["password"])) { echo $data["password"]; } ?>" />
                    <div class="error red">
                        <?php if (!empty($data["loginPasswordError"])) {
                            echo $data["loginPasswordError"];
                        } ?>
                    </div>
                </span>
            </div>
            <div class="submit">
                <input class="submit" name="submit" value="Submit" type="submit" />
            </div>
        </form>

    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html> 