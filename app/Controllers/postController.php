<?php

class postController extends Framework {

    public function __construct() {

        $this->helper("link");
        $this->postModel = $this->model("postModel");
        
    }

    public function index() {

        $userId = $this->getSession("userId");
        $result = $this->postModel->viewPostsModel($userId);

        $this->view("postView/viewPosts", $result);
    }

    public function viewSinglePostControllerPath() {

        $this->view("postView/viewSinglePost");
    }

    public function viewSinglePostController($id) {

        $post = $this->postModel->viewSinglePostModel($id);
        $data = [
            "post" => $post,
            "comments" => $this->viewCommentsPostController($id),
        ];

        $this->createCommentPostController($id);
        
        $this->view("postView/viewSinglePost", $data);
    }

    public function createPostController() {

        $postData = [
            "title" => $this->input("title"),
            "body"  => $this->input("body"),
            "userId" => $this->getSession("userId"),
            "titleError" => "",
            "bodyError" => ""
        ];  

        if (empty($postData["title"])) {
            $postData["titleError"] = "**Title is required**";
        }

        if (empty($postData["body"])) {
            $postData["bodyError"] = "**Body is required**";
        }

        if (empty($postData["titleError"]) && empty($userData["bodyError"])) {

            if ($this->postModel->createPostModel($postData["title"], $postData["body"], $postData["userId"])) {

                $this->setFlash("postAdded", "Your Post has been added successfuly");
                $this->redirect("postController/index");
            }
            else {
                echo "Not Inserted";
            }

        }

        else {
            $this->view("postView/createPost", $postData);
        }
        
    }

    public function updatePostController($id) {

        $userId = $this->getSession("userId");
        $post = $this->postModel->viewSinglePostModel($id, $userId);

        $postData = [
            "post" => $post,
            "id" => $id,
            "userId" => $userId,
            "title" => $this->input("title"),
            "body"  => $this->input("body"),
            "titleError" => "",
            "bodyError" => ""
        ];  

        
        if (empty($postData["title"])) {
            $postData["titleError"] = "**Title is required**";
        }

        if (empty($postData["body"])) {
            $postData["bodyError"] = "**Body is required**";
        }

        if (empty($postData["titleError"]) && empty($userData["bodyError"])) {

            if ($this->postModel->updatePostModel($postData["title"], $postData["body"], $postData["id"], $postData["userId"])) {

                $this->setFlash("postUpdated", "Your Post has been Updated successfuly");
                $this->redirect("postController/index");
            }
            else {
                echo "Not Inserted";
            }
        }

        $this->view("postView/updatePost", $postData);
        
    }

    public function deletePostController($id) {

        $userId = $this->getSession("userId");

        if ($this->postModel->deletePostModel($id, $userId)) {

            $this->setFlash("postDeleted", "Your Post has been Deleted successfuly");
            $this->redirect("postController/index");
        }
        else {
            echo "Not Deleted";
        }
        
    }

    public function viewCommentsPostController($id) {
        
        $result = $this->postModel->viewCommentsPostModel($id);
        return $result;
    }

    public function createCommentPostController($id) {

        $commentData = [
            "postId" => $id,
            "userId" => $this->getSession("userId"),
            "comment" => $this->input("comment"),
            "commentError" => ""
        ];

        

        if (!empty($commentData["comment"])) {

            if ($this->postModel->createCommentPostModel($commentData["comment"], $commentData["postId"], $commentData["userId"])) {
                echo "asdasd";
                $this->setFlash("commentAdded", "Your Comment has been Added successfuly");
                $this->redirect("/postController/viewSinglePostController/$id");
            }
            else {
                echo "Not Inserted";
            }
        }
    
    }

}

?>