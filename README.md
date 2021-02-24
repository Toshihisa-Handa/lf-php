# lf-php
ドキュメントルート 
htdocs/php/lf

ドキュメント構造（参照：https://www.php.net/manual/ja/yaf.tutorials.php#example-4381）
例1 標準的なアプリケーションのディレクトリ構造

- index.php 
- .htaccess 
+ conf
  |- application.ini // アプリケーションの設定
- application/
  - Bootstrap.php   
  + controllers
     - Index.php // デフォルトのコントローラ
  + views    
     |+ index   
        - index.phtml // デフォルトアクション用のビューテンプレート
  + modules 
  - library
  - models  
  - plugins 

  上記を参考に作成。



確認すること
相対パスしか聞かない時とルートパスが聞く時の違いはなんなのか
$stmt = $pde->prepare();
$status = $stmt->execute();






drege.php
投稿にバリデーションを後ほど加える


2/15残作業。
・各ページaタグリンクを設定 ok
・map情報登録更新機能 ok
・日記、花詳細ページにDBから取得した情報を表示させる ok
・日記、花詳細ページにそれぞれコメント機能を実装。 △未登録ユーザーの投稿が出来ていない。→OK
・ログイン時ヘッダー管理画面アイコンを表示させる。未ログイン時は隠す。 ok
・店舗ページにshopテーブルから取得した情報を表示させる ok
・店舗ページの日記と花に各詳細ページへのリンクを追加 ok
・店舗ページの日記と花にGride.jsのカルーセルを適用 ok
・店舗情報登録時の住所を元に緯度経度を取得するロジック作成
・マップ画面を表示させ、現在地を取得しそこにピンを表示させる。ok
・DBに登録された緯度経度から登録店舗をピンで表示させる。ok
・表示させたピンに各店舗ページへのリンクをつける。ok
・花詳細ページにstripe機能を追加 △画像表示は断念

＝＝＝＝＝＝＝＝＝基本機能上記＝＝＝＝＝＝＝＝＝＝＝＝＝＝
＝＝＝＝＝＝＝＝＝以下追加点＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
・店舗, map , 日記、花、各登録、編集画面のフォーム入力欄にバリデーションを設定。
・店舗情報登録欄にセレクトボックスを追加 ok
・店舗ページのマップ表示をiframeからbingマップへ変更する。
・DB接続やファイルアップロードなど複数回使用している処理を関数やclassを使用して短く書けないか試す。
・上記緯度経度がmapテーブルに登録されるようにmapインサートを変更
・登録された情報を元に地図情報を表示




覚えた点
 <a href="shop.php/<?= $item['id']; ?>">
 <a href="diaryEdit.php/? id=<?= $images[$i]['id']; ?>">
 上記の違い。
 ? id=とするとgetでリンク先でidを取得できる。
 sqlの
 JOINはINNNER JOIN の略称
LEFT JOIN と LEFT OUTER JOINの違いについて
「LEFT JOIN は　LEFT OUTER JOIN の略