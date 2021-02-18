<?php 


class DB{
    public function dbset($a,$b,$c,$d){
        try {
            $pdo = new PDO("mysql:host=$a;dbname=$b', '$c', '$d");
          } catch (PDOException $e) {
            print "エラー！" . $e->getMessage() . "<br/>";
            exit('終了します');
          }
          return $pdo;
    }
}



?>