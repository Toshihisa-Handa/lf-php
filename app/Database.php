<?php

class Database
{

    //db接続
    public static function dbcon()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
        } catch (PDOException $e) {
            print "エラー！" . $e->getMessage() . "<br/>";
            exit('終了します');
        }
        return $pdo;
    }
}
