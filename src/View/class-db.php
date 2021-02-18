<?php 


class DB{
    // public function dbset($a,$b,$c,$d){
    //     try {
    //         // mysql:host=localhost;dbname=lf', 'root', 'root')
    //         $pdo = new PDO("mysql:host=".$a.";dbname=".$b.",". $c.",".$d);
    //       } catch (PDOException $e) {
    //         print "エラー！" . $e->getMessage() . "<br/>";
    //         exit('終了します');
    //       }
    //       return $pdo;
    // }
    function dbset(){
        try {
          $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
        } catch (PDOException $e) {
          print "エラー！" . $e->getMessage() . "<br/>";
          exit('終了します');
        }
        return $pdo;
      }


    public function test($a,$b){
        return $a *$b;
    }
}



?>