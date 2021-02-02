<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店舗情報編集</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
 <body>
    <header>
        <ul>
        <li><a href="top.php">Home</a></li>
            <li><a href="shops.php">Shop</a></li>
            <li><a href="diarys.php">Diary</a></li>
            <li><a href="flowers.php">Flower</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
     </header>
    <h1>店舗情報編集</h1>

    <a href="myprofile.php">店舗登録情報</a>
    <a href="drege.php">新しい日記の登録</a>
    <a href="frege.php">新しいお花の登録</a>


<h2>画像情報編集</h2>
    <form action="/myprofile_img" method="post" enctype="multipart/form-data">
        プロフィール写真の変更<input type="file" name="account_img"><br>
        <input type="submit" value="送信">
    </form>
    <form action="/myprofile_img2" method="post" enctype="multipart/form-data">
        店舗詳細写真の変更 <input type="file" name="shop_img"><br>
        <input type="submit" value="送信">
    </form>
    <form action="/myprofile_img3" method="post" enctype="multipart/form-data">
        店舗画像１<input type="file" name="img1"><br>
        <input type="submit" value="送信">
    </form>
    <form action="/myprofile_img4" method="post" enctype="multipart/form-data">
        店舗画像２<input type="file" name="img2"><br>
        <input type="submit" value="送信">
    </form>
    


<h2>基本情報編集</h2>
    <form action='/myprofileUpdate/<%=item.id%>' method="post" >
        店舗名<input type="text" name="name" value='<%= item.name%>'><br>
        店舗サブタイトル<input type="text" name="title" value='<%= item.title%>'><br>
        アカウント名<input type="text" name="account_name" value='<%= item.account_name%>'><br>
        ウェブサイト<input type="text" name="web" value='<%= item.web%>'><br>
        メールアドレス<input type="text" name="email" value='<%= item.email%>'><br>
        電話番号<input type="text" name="tell" value='<%= item.tell%>'><br>
        営業時間
        オープン<input type="text" name="open" value='<%= item.open%>'><br>
        クローズ<input type="text" name="close" value='<%= item.close%>'><br>
        定休日<input type="text" name="holiday" value='<%= item.holiday%>'><br>
        住所<input type="text" name="location" value='<%= item.location%>'><br>
        地図<input type="text" name="map" value='<%= item.map%>'><br>
        店舗タイトル<input type="text" name="message" value='<%= item.message%>'><br>
        店舗コメント<textarea name="comment"><%= item.comment%></textarea><br>
        店舗特徴<input type="text" name="feature" value='<%= item.feature%>'><br>
        <button type="submit">送信</button>
    </form>
 </body>
</html>