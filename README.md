# lf-php
ドキュメントルート 
htdocs/php/lf

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
・日記、花詳細ページにそれぞれコメント機能を実装。 xDBのsql分につまづく
・ログイン時ヘッダー管理画面アイコンを表示させる。未ログイン時は隠す。 ok
・店舗ページにshopテーブルから取得した情報を表示させる
・店舗ページの日記と花に各詳細ページへのリンクを追加
・店舗ページの日記と花にGride.jsのカルーセルを適用
・店舗情報登録時の住所を元に緯度経度を取得するロジック作成
・マップ画面を表示させ、現在地を取得しそこにピンを表示させる。
・DBに登録された緯度経度から登録店舗をピンで表示させる。
・表示させたピンに各店舗ページへのリンクをつける。
・花詳細ページにstripe機能を追加

＝＝＝＝＝＝＝＝＝基本機能上記＝＝＝＝＝＝＝＝＝＝＝＝＝＝
＝＝＝＝＝＝＝＝＝以下追加点＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
・店舗, map , 日記、花、各登録、編集画面のフォーム入力欄にバリデーションを設定。
・店舗情報登録欄にセレクトボックスを追加
・店舗ページのマップ表示をiframeからbingマップへ変更する。
・DB接続やファイルアップロードなど複数回使用している処理を関数やclassを使用して短く書けないか試す。
・上記緯度経度がmapテーブルに登録されるようにmapインサートを変更
・登録された情報を元に地図情報を表示




覚えた点
 <a href="shop.php/<?= $item['id']; ?>">
 <a href="diaryEdit.php/? id=<?= $images[$i]['id']; ?>">
 上記の違い。
 ? id=とするとgetでリンク先でidを取得できる。