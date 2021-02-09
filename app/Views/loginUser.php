<?php require "inc/head.php"; ?>

    <div class="navbar dark"> <?php require "inc/navigation.php"; ?> </div>
        
    <div class="container">

        <h2>It's now or never</h2>
        <h1>Come on , Join us!</h1>
    
        <form action="http://localhost/mvc/userController/loginUserController" id="join-us">
            <div class="fields">
                <span>
                    <input name="username" placeholder="Userame" type="text" />
                </span>
                <br />
                <span>
                    <input name="password" placeholder="Password" type="password" />
                </span>
            </div>
            <div class="submit">
                <input class="submit" name="submit" value="Submit" type="submit" />
            </div>
        </form>

    </div>

</body>
</html> 