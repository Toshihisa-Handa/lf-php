<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shops</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shops.css">
    
</head>
<body>



<div class="shops-glid">
    <header>
        <ul>
            <li>
                <a href="/mypage">
                   <!-- <% if (typeof user !== 'undefined') { %>
                       <img src="images/account.jpg" class='aimg' alt="" >  
                     <% } %> -->
               </a>
           </li>
           <li><a href="top.php">Home</a></li>
            <li><a href="shops.php">Shop</a></li>
            <li><a href="diarys.php">Diary</a></li>
            <li><a href="flowers.php">Flower</a></li>
            <form action="/s_search" method='get'>
                <span class='search-bar'>Search</span><input  class='search' type="text" name='kensaku' placeholder="検索ワード入力" required>
            </form>
               <!-- <% if (typeof user == 'undefined') { %>
                <li><a href="/login">Login</a></li>
                <% } else{%>
                <li><a href="/logout">Logout</a></li>
                <% } %> -->
        </ul>
     </header>
     <div class="img1">
        <img src="../images/shopsimg1.png" alt="">
    </div>
    
     <div class="title1">
       <h1>Shop List</h1>
     </div>
     

</div>

 

 


<div class="shop-list">
    <div class="shopList">
        <div class="shop-container">
        <!-- <% items.forEach((item) => { %>

           <div class="shop-card">
             <a href="/shop/<%=item.id%>">
                <img src="<%= item.shop_img %>" alt="">  
                <h3><%= item.shopname%></h3>
                <h4>営業時間：<%= item.open%>~<%= item.close%></h4>
                <p>休業日：<%= item.holiday%></p>
                <p>特徴：<%= item.feature%></p>
            </a>
           </div>

        <% }) %> -->
        </div>
  </div>
</div>

<footer>
    <h3>Copyright  second-cube</h3>
</footer>

</body>
</html>