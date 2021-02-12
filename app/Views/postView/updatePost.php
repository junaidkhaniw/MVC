<?php require "inc/head.php"; ?>

    <div class=""> <?php require "inc/navigation.php"; ?> </div>

    <div class="container">

        <h1>Edit Post</h1>

        <form action="<?php echo URLROOT; ?>/postController/updatePostController/<?php echo $data["post"]->id; ?>" method="POST" id="join-us">
            <div class="mb-3">
                <input type="text" name="title" value="<?php echo $data["post"]->title ?>">
                <div class="error red">
                    <?php if (!empty($data["titleError"])) {
                        echo $data["titleError"];
                    } ?>
                </div>
            </div>

            <div class="mb-3">
                <textarea name="body" rows="8"><?php echo $data["post"]->body ?></textarea>
                <div class="error red">
                    <?php if (!empty($data["bodyError"])) {
                        echo $data["bodyError"];
                    } ?>
                </div>
            </div>

            <div class="submit">
                <input class="submit" value="Update" type="submit" />
            </div>
        </form>

    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html>
