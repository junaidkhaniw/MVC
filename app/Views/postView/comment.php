<form method="POST" id="join-us">

    <div class="mb-3">
        <textarea name="comment" rows="8" placeholder="Add Your Comment"></textarea>
        <div class="error red">
            <?php if (!empty($data["commentError"])) {
                echo $data["commentError"];
            } ?>
        </div>
    </div>

    <div class="submit">
        <input class="submit" name="comment_submit" value="Submit" type="submit" />
    </div>
</form>