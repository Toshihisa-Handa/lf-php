<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店舗登録情報画面</title>
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
    <h1>店舗登録情報画面</h1>
    <!-- <% if (typeof user !== 'undefined') { %>
      <h2 class="login-user"><%= user.name %>さんとしてログインしています</h2>
  <% } %> -->

  <a href="drege.php">新しい日記の登録</a>
  <a href="frege.php">新しいお花の登録</a>
  <br>
<!-- 
  <% items.forEach((item) => { %>

    <a href="/myprofileEdit/<%=item.id%>">編集画面へ</a>
    <img src="<%= item.account_img %>" alt="" style='width:300px'><span>プロフィール写真の変更</span><br>
    <h1>店舗名：<%= item.name %></h1>
    <h2>店舗サブタイトル：<%= item.title %></h2>
    <p>ユーザー名：<%= item.account_name %></p>  
    <p>ウェブサイト：<a href="<%= item.web %>" target=”_blank”><%= item.web %></a></p>
    <p>メールアドレス：<%= item.email %></p>  
    <p>電話番号：<%= item.tell %></p>  
    <h2>営業時間</h2>
    <h3><%= item.open %>　〜　<%= item.close %></h3>
    <p>定休日：<%= item.holiday %></p>
    <h3>住所</h3>
    <textarea name="" id="" cols="30" rows="10"><%= item.location %></textarea>
    <h3>地図</h3>
    <iframe src="<%=item.map %>" width='300px' frameborder="0"></iframe>
    <h3>店舗詳細写真</h3><img src="<%= item.shop_img %>" alt="" style='width:300px'>
    <h3>店舗写真①</h3><img src="<%= item.img1 %>" alt="" style='width:300px'>
    <h3>店舗写真②</h3><img src="<%= item.img2 %>" alt="" style='width:300px'>
    <h2>店舗タイトル：<%= item.message %></h2>
    <h2>店舗コメント</h2>
    <textarea name="" id="" cols="30" rows="10"><%= item.comment %></textarea>
    <p>特徴：<%= item.feature %></p>

   <% }) %> -->





</body>
</html>