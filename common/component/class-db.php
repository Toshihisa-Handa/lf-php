<?php 


class DB{
    public $host = 'localhost';
    public $db = 'lf';
    public $user = 'root';
    public $pw = 'root';
    //本番環境とローカルを適宜切り替えて使用する。
    // public $host = '本番環境のURL';
    // public $db = '本番環境のDB';
    // public $user = '本番環境のuser';
    // public $pw = '本番環境のpw';

    function dbset(){
        try {
          $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->user,$this->pw);

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