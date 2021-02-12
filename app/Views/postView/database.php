<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $post) : ?>
            <tr>
                <td style="width:10%"><?php echo $post->id; ?></td>
                <td style="width:30%"><?php echo ucwords($post->title); ?></td>
                <td style="width:37%"><?php echo ucwords($post->body); ?></td>
                <td style="width:23%">
                    <a href="<?php echo URLROOT . "/postController/viewSinglePostController/" . $post->id; ?>" class="btn btn-success">View</a>
                    <a href="<?php echo URLROOT . "/postController/updatePostController/" . $post->id; ?>" class="btn btn-warning">Update</a>
                
                    <form class="delete-form" action="<?php echo URLROOT . '/postController/deletePostController/' . $post->id; ?>" method="post">
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
            <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>