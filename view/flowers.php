<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/flowers.css">
 
</head>
<body>



<div class="flowers-glid">
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
            <form action="/f_search" method='get'>
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
        <img src="../images/flowerimg2.png" alt="">
    </div>
     <div class="title1">
       <h1>Flower List</h1>
     </div>
     
</div>

 

 


<div class="flower-list">
    <div class="flowerList">
       
        <!-- <div class="flower-container">
            <% items.forEach((item) => { %>
             <div class="fcard">
                <div class='flower-card'>
                    <a href="/flower/<%=item.id%>">
                    <img src="<%= item.image %>" alt="">
                    <h3><%= item.name%></h3>
                    <div class='fprice'><%= item.price%>円（税別）</div>
                    <div class='ffeature'><%= item.feature%></div>
                </a>
               </div>
               <h2 class='fname'><%= item.shopname %></h2>
            </div>
               <% }) %>
            </div> -->
  </div>
</div>


<footer>
    <h3>Copyright  second-cube</h3>
</footer>
</body>
</html>