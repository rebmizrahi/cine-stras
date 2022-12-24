<?php

class PostController
{
    private PDO $pdo;
    
    public function __construct()
    {
        $absolutePath = dirname(__FILE__);
        $this->pdo = new PDO("sqlite:$absolutePath/posts.db.sqlite");
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPosts() : Array {
        $posts = $this->pdo->query("SELECT * FROM posts")->fetchAll();
        $postObject = [];
        foreach ($posts as $post) {
            $postObject[] = [
                'ID' => $post['ID'],
                'TITLE' => $post['TITLE'],
                'CONTENT' => $post['CONTENT']
            ];
        }
        return $postObject;
    }

    public function getPostByID(int $id) : Array {
        $postList = $this->pdo->query("SELECT * FROM posts WHERE ID = '$id' LIMIT 1")->fetchAll();
        $post = $postList[0];
        $postObject[] = [
                'ID' => $post['ID'],
                'TITLE' => $post['TITLE'],
                'CONTENT' => $post['CONTENT']
            ];
        return $postObject[0];
    }

    public function setTitle(string $newtitle, int $id) : bool {
        if (empty($newtitle)) {
            return false;
        }
        $sql = "UPDATE posts SET TITLE = '" . $newtitle . "' WHERE ID = " . $id;
        $this->pdo->query($sql);
        $sql_check = "SELECT * FROM posts WHERE TITLE = '" . $newtitle;
        
        // $check = $this->pdo->query($sql)->fetchAll();
        // if (empty($check)) {
        //     return false;
        // }
        return true;
    }

    public function setContent(string $newcontent, int $id) : bool {
        if (empty($newcontent)) {
            return false;
        }
        $sql = "UPDATE posts SET CONTENT = '" . $newcontent . "' WHERE ID = " . $id;
        $this->pdo->query($sql);
        $sql_check = "SELECT * FROM posts WHERE CONTENT = '" . $newcontent;
        // $check = $this->pdo->query($sql)->fetchAll();
        // if (empty($check)) {
        //     return false;
        // }
        return true;
    }

}