<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>花登録ページ</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/frege.css">

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
    <h1>花登録</h1>
    <!-- <% if (typeof user !== 'undefined') { %>
        <span class="login-user"><%= user.name %>さんとしてログインしています</span>
    <% } %> -->

<br>
<br>
<a href="myprofile.php">店舗登録情報</a>
<a href="drege.php">新しい日記の登録</a>
<br>
<br>

    <form action="/f_insert" method="POST" enctype="multipart/form-data">
        
        <input type="file" name="file"><br>
        品名<input type="text" name="name"><br>
        価格<input type="text" name="price"><br>
        特徴<input type="text" name="feature"><br>
        タグ<input type="text" name="tag"><br>
        テキスト<textarea name="text" ></textarea><br>
    
        <button type="submit">送信</button>
    </form>

<h2>画像表示</h2>
<!-- 
<% items.forEach((item) => { %>
 <div class='diary-card'>
    <div ><a href="/flowerEdit/<%=item.id%>">編集</a></div>
    <div ><a href="/flowerDelete/<%=item.id%>">削除</a></div>
     <h2><%= item.name%></h2>
     <h2><%= item.price%>円</h2>
     <h2><%= item.feature%></h2>
     <p><%= item.tag%></p>
     <h3><%= item.text%></h3>
     <p><%= item.created_at%></p>
    <img src="<%= item.image %>" alt="" style='width:300px'>
    <h2><%= item.uname %></h2>
</div>
<% }) %> -->

</body>
</html>