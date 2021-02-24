<?php 


class Utils
{
//1.XSS対応（ echoする場所で使用！それ以外はNG ）
public static function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES);
}


public static function bvint($stmt,$str, $var){
    $stmt->bindValue($str, $var, PDO::PARAM_INT);
  }
public static function bvstr($stmt,$str, $var){
    $stmt->bindValue($str, $var, PDO::PARAM_STR);
  }
  



}