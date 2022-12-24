<?php

class UserController
{
    private PDO $pdo;
    
    public function __construct()
    {
        $absolutePath = dirname(__FILE__);
        $this->pdo = new PDO("sqlite:$absolutePath/users.db.sqlite");
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query(string $request)
    {
        return $this->pdo->query($request);
    }

    public function getUsers() : Array {
        $users = $this->pdo->query('SELECT * FROM users')->fetchAll();
        $userObject = [];
        foreach($users as $user) {
            $userObject[] = [
                'USERNAME' => $user['USERNAME']
            ];
        }
        return $userObject;
    }

    public function getUserByUsernameAndPassword(string $username, string $password) : Array {
        $user = $this->pdo->query("SELECT * FROM users WHERE USERNAME = '" . $username . "' AND PASSWORD = '" . $password . "' LIMIT 1")->fetchAll();
        if (empty($user)) {
            return [];
        }
        return ($user[0]);
    }

    public function getUserByUsername(string $username) : Array {
        $user = $this->pdo->query("SELECT * FROM users WHERE USERNAME = '" . $username . "'")->fetchAll();
        if (empty($user)) {
            return [];
        }
        return $user[0];
    }

    public function getStatus(string $username) : bool {
        $sql = "SELECT * FROM users WHERE USERNAME = '" . $username . "' LIMIT 1";
        $user = $this->PDO->query($sql)->fetchOne();
        if (empty($user)) {
            return false;
        }
        elseif ($user['ISADMIN'] == 1) {
            return true; 
        }
        else {
            return false;
        }
    }

    public function addAdmin(string $username, string $password) {
        $sql = 'INSERT OR REPLACE INTO users (USERNAME, PASSWORD, ISADMIN) VALUES (:usernames, :passwords, :isAdmin)';
        $statement = $this->pdo->prepare($sql);
        $isAdmin = 1;
        $statement->execute([$username, $password, $isAdmin]);
    }

}