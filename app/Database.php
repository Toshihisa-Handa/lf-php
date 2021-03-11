<?php

class Database
{
    private $host = 'localhost';
    private $db = 'lf';
    private $user = 'root';
    private $password = 'root';
    public $test = "test";

    public function dbconnect()
    {
        try {
            $dbh = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->password);
        } catch (PDOException $e) {
            print "エラーです" . $e->getMessage() . "<br/>";
            exit();
        }
        return $dbh;
    }

    public function redirect($status, $stmt, $location)
    {
        if ($status == false) {
            $error = $stmt->errorInfo();
            exit("SQLError:" . $error[2]);
        } else {
            header("Location: $location");
            exit();
        }
    }

    public function hoge(){
        echo 'hoge';
    }
}
