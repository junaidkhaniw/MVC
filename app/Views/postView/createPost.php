<?php require "inc/head.php"; ?>

    <div class=""> <?php require "inc/navigation.php"; ?> </div>

    <div class="container">

        <h1>Add Post</h1>

        <form action="<?php echo URLROOT; ?>/postController/createPostController" method="POST" id="join-us">
            <div class="mb-3">
                <input type="text" name="title" placeholder="Add Post Title">
                <div class="error red">
                    <?php if (!empty($data["titleError"])) {
                        echo $data["titleError"];
                    } ?>
                </div>
            </div>

            <div class="mb-3">
                <textarea name="body" rows="8" placeholder="Add Post Content"></textarea>
                <div class="error red">
                    <?php if (!empty($data["bodyError"])) {
                        echo $data["bodyError"];
                    } ?>
                </div>
            </div>

            <div class="submit">
                <input class="submit" value="Submit" type="submit" />
            </div>
        </form>

    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html>
