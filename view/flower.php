<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/flower.css">
</head>

<body>
<div class="main-glid">


    <header>
       <ul>
         <li>
             <a href="/mypage">
                <!-- <% if (typeof user !== 'undefined') { %>
                    <img src="../images/account.jpg" class='aimg' alt="" >  
                  <% } %> -->
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
       <h1>Flower</h1>
   </div>

</div>


<div class="editar-area">
   <div class="container">
    <main class="main">
      <!-- メインコンテンツ -->
      <div><img src="<%= item.image %>" alt=""class='diaryImg'></div>
      <!-- <h3 class='flowerName'><%=item.name%></h3>
    <p>店舗：<%=item.shopname%></p>
    <p>価格：<%=item.price%>円（税抜き）</p>
    <p>特徴：<%=item.feature%></p>
    <p class='diaryText'><%=item.text%></p>
    <div id='cbtn'><span class='btnClick'>▶︎</span>コメント（<%=fitems.length %>）</div> -->

    <div class="dcomment">

      <!-- <% if (fitems.length) { %>
                <% fitems.forEach(function(fitem) { %>
                 <div class="comment-box">
                  <div class="dcname"><%= fitem.user_name %></div>             
                  <div class='dccreatedAt'> <%= fitem.created_at %></div>       
                  <div class="dccomment"><%= fitem.fcomment %></div>
                </div> 
                <% }); %>
    <% } %> -->

   
  </div>
    </main>
    <div class="sidebar">
      <div class="sidebar__item">
        <!-- 中身 -->
      </div>
      <div class="sidebar__item sidebar__item--fixed">
        <!-- 固定・追従させたいエリア -->
        <form action="/fcomment_post/<%= item.id %>" method="post">
            <textarea name="fcomment" id="message" class="form textarea"  placeholder="Message"></textarea>
            <button class="lbutton" type="submit" class="submit">submit</button>
            
        </form>
        
      </div>
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
         // alert('hit')
      }
     
     </script>
</body>
</html>