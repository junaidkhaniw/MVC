<?php

class postModel extends Database {

    public function viewPostsModel($userId) {

        if ($this->query("SELECT * FROM posts WHERE userId = ?", [$userId])) {
            return $this->fetchall();
        }
        else {
            return false;
        }
        
    }

    public function viewSinglePostModel($id) {

        if ($this->query('SELECT * FROM posts WHERE id = ?', [$id])) {
            return $this->fetch();
        }
        else {
            return false;
        }
        
    }

    public function createPostModel($title, $body, $userId) {
        
        if ($this->query("INSERT INTO posts (title, body, userId) VALUES (?, ?, ?)", [$title, $body, $userId])) {
            return true;
        }     
        else {
            return false;
        }

    }

    public function updatePostModel($title, $body, $id, $userId) {
        
        if ($this->query("UPDATE posts SET title = ?, body = ? WHERE id = ? && userId = ?", [$title, $body, $id, $userId])) {
            return true;
        }     
        else {
            return false;
        }

    }

    public function deletePostModel($id, $userId) {
        
        if ($this->query("DELETE FROM posts WHERE id = ? && userId = ?", [$id, $userId])) {
            return true;
        }     
        else {
            return false;
        }

    }

    public function viewCommentsPostModel($id) {
        
        if ($this->query("SELECT * FROM comments WHERE postId = ?", [$id])) {
            return $this->fetchall();
        }
        else {
            echo "no";
        }
    }

    public function createCommentPostModel($comment, $postId, $userId) {
        
        if ($this->query("INSERT INTO comments (comment, postId, userId) VALUES (?, ?, ?)", [$comment, $postId, $userId])) {
            
            return true;
        }     
        else {
            
            return false;
        }

    }

}

?>