<?php 
//管理画面リンクのヘッダーアイコンの読み込み
$stmt = $pdo->prepare("SELECT account_img FROM shop where user_id=:uid");
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
$item = $stmt->fetch();
$aimg = $item['account_img'];
?>