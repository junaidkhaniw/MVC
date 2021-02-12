<?php require "inc/head.php"; ?>

    <div class=""> <?php require "inc/navigation.php"; ?> </div>
        
    <div class="container">

        <h2>It's now or never</h2>
        <h1>Come on , Join us!</h1>
    
        <form action="<?php echo URLROOT; ?>/userController/registerUserController" method="post" id="join-us">
            <div class="fields">
                <span>
                    <input name="name" placeholder="Name" type="text" value="<?php if(!empty($data["name"])) { echo $data["name"]; } ?>" />
                    <div class="error red">
                        <?php if (!empty($data["nameError"])) {
                            echo $data["nameError"];
                        } ?>
                    </div>
                </span>
                <br />
                <span>
                    <input name="username" placeholder="Username" type="text" value="<?php if(!empty($data["username"])) { echo $data["username"]; } ?>" />
                    <div class="error red">
                        <?php if (!empty($data["usernameError"])) {
                            echo $data["usernameError"];
                        } ?>
                    </div>
                </span>
                <br />
                <span>
                    <input name="email" placeholder="Email ID" type="email" value="<?php if(!empty($data["email"])) { echo $data["email"]; } ?>" />
                    <div class="error red">
                        <?php if (!empty($data["emailError"])) {
                            echo $data["emailError"];
                        } ?>
                    </div>
                </span>
                <br />
                <span>
                    <input name="password" placeholder="Password" type="password" value="<?php if(!empty($data["password"])) { echo $data["password"]; } ?>" />
                    <div class="error red">
                        <?php if (!empty($data["passwordError"])) {
                            echo $data["passwordError"];
                        } ?>
                    </div>
                </span>
            </div>
            <div class="submit">
                <input class="submit" value="Submit" type="submit" />
            </div>
        </form>

    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html> 