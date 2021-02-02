<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/diary.css">
</head>
<body>
<div class="main-glid">


    <header>
       <ul>
         <li>
             <a href="/mypage">
                <!-- <% if (typeof user !== 'undefined') { %> -->
                    <img src="../images/account.jpg" class='aimg' alt="" >  
                  <!-- <% } %> -->
            </a>
        </li>
        <li><a href="top.php">Home</a></li>
            <li><a href="shops.php">Shop</a></li>
            <li><a href="diarys.php">Diary</a></li>
            <li><a href="flowers.php">Flower</a></li>
         <!-- <% if (typeof user == 'undefined') { %>
         <li><a href="/login">Login</a></li>
         <% } else{%>
         <li><a href="/logout">Logout</a></li>
         <% } %> -->
       </ul>
    </header>


   <div class="title1">
       <h1>diary</h1>
   </div>

</div>


<div class="editar-area">
   <div class="container">
    <main class="main">
      <!-- メインコンテンツ -->
      <div><img class='diaryImg' src="<%= item.image %>"></div>
      <!-- <h2><%=item.title%></h2>
      <h3><%=item.tag%></h3>
      <p class='diaryText'><%=item.text%></p>
      <div id='cbtn'><span class='btnClick'>▶︎</span>コメント（<%=ditems.length %>）</div>
 
      <div class="dcomment">
        <% if (ditems.length) { %>
                  <% ditems.forEach(function(ditem) { %>
                   <div class="comment-box">
                    <div class="dcname"><%= ditem.user_name %></div>             
                    <div class='dccreatedAt'> <%= ditem.created_at %></div>       
                    <div class="dccomment"><%= ditem.dcomment %></div>
                  </div> 
                  <% }); %>
         <% } %>
     </div> -->
    </main>
    <div class="sidebar">
      <div class="sidebar__item">
        <!-- 中身 -->
      </div>
      <div class="sidebar__item sidebar__item--fixed">
        <!-- 固定・追従させたいエリア -->
        <form action="/dcomment_post/<%= item.id %>" method="post">
            <textarea name="dcomment" id="message" class="form textarea"  placeholder="Comment"></textarea>
            <button class="lbutton" type="submit" class="submit">submit</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

     <footer>
         <h3>Copyright  second-cube</h3>
     </footer>







<script>
 const cbtn = document.querySelector('#cbtn')
 const hideComment = document.querySelector('.dcomment')
   cbtn.onclick = function(){
     hideComment.classList.toggle('dcomment')
 }

</script>
</body>
</html>