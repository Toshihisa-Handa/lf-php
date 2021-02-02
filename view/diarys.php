<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diaries</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/diarys.css">
</head>
<body>



<div class="diarys-glid">
    <header>
        <ul>
            <li>
                <a href="/mypage">
                   <!-- <% if (typeof user !== 'undefined') { %> -->
                       <img src="images/account.jpg" class='aimg' alt="" >  
                     <!-- <% } %> -->
               </a>
           </li>
            <li><a href="top.php">Home</a></li>
            <li><a href="shops.php">Shop</a></li>
            <li><a href="diarys.php">Diary</a></li>
            <li><a href="flowers.php">Flower</a></li>
            <form action="/d_search" method='get'>
                <span class='search-bar'>Search</span><input  class='search' type="text" name='kensaku' placeholder="検索ワード入力" required>
            </form>
               <!-- <% if (typeof user == 'undefined') { %> -->
                <li><a href="/login">Login</a></li>
                <!-- <% } else{%> -->
                <!-- <li><a href="/mypage">mypage</a></li> -->
                <li><a href="/logout">Logout</a></li>
                <!-- <% } %> -->
        </ul>
     </header>
     <div class="img1">
        <img src="../images/diaryimg2.png" alt="">
    </div>
     <div class="title1">
       <h1>Diary List</h1>
     </div>
     
</div>

 

 


<div class="diary-list">
    <div class="diaryList">
       
    <div class="diary-container">
        <!-- <% items.forEach((item) => { %>
            <div class="dcard">
            <div class='diary-card'>
                <a href="/diary/<%=item.id%>">
                    <img src="<%= item.image %>" alt="" >
                    <h3><%= item.title%></h3>               
                    <p class='dtext'><%= item.text%></p>
                </a>
           </div>
           <div class="dname"><%= item.shopname %></div>
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