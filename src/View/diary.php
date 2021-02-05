<?php 
session_start();
include('../../common/favicon.html') 
?>

    <title>日記詳細</title>
    <?php include('../../common/style.html') ?>
    <link rel="stylesheet" href="/public/css/diary.css">

</head>

<body>
<div class="main-glid">


  <header>
    <ul>
      
    <?php include('../../common/header-nav-leftIcon.html') ?>

      <div class='nav-right'>
     
      <!-- <% if (typeof user == 'undefined') { %> -->
      <li class='log'><a href="/login" class='hlink'>Login</a></li>
      <!-- <% } else{%> -->
      <li class='log'><a href="/logout" class='hlink'>Logout</a></li>
      <!-- <% } %> -->
      <li class='account_img' >
         <a href="/mypage">
            <!-- <% if (typeof user !== 'undefined' ) { %>
                <% if(sitems[0].account_img=== null){%>
                    <img src="/public/images/account3.png" class='aimg' alt="" >  
              <% }else{ %>
                <img src="<%=sitems[0].account_img %>" class='aimg' alt="" >  
              <% } %>
              <% } %> -->
        </a>
    </li>
 </div>

    </ul>
 </header>


   <div class="title1">
       <h1 class='topTitle'>diary</h1>
   </div>

</div>


<div class="editar-area">
   <div class="container">
    <main class="main">
      <!-- メインコンテンツ -->
      <div><img class='diaryImg' src="<%= item.image %>"></div>
      <!-- <h2 class='dfont'><%=item.title%></h2>
      <p class='diaryText dfont2'><%=item.text%></p>
      <div id='cbtn'><span class='btnClick'>▶︎</span>コメント（<%=ditems.length %>）</div> -->
 
      <div class="dcomment">
        <!-- <% if (ditems.length) { %>
                  <% ditems.forEach(function(ditem) { %>
                   <div class="comment-box">
                    <div class="dcname "><%= ditem.user_name %></div>             
                    <div class='dccreatedAt'> <%= ditem.created_at %></div>       
                    <div class="dccomment"><%= ditem.dcomment %></div>
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
        <form action="/dcomment_post/<%= item.id %>" method="post">
            <textarea name="dcomment" id="message" class="form textarea"  placeholder="Comment"></textarea>
            <button class="lbutton" type="submit" class="submit">submit</button>
        </form>
        
      </div>
    </div>
  
  </div>
</div>

<!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
<div class="footer-glid">
  <footer>
      <h3 class='topSubtitle'>Copyright  second-cube</h3>
  </footer>

  <!-- フッターナビ -->
  <div class='Fnav web ' >
  <ul class='navs'>
  <li ><a href="/map" ><img class='navimg' src="/public/images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
  <li ><a href="/shops" ><img class='navimg' src="/public/images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
  <li ><a href="/diarys" ><img class='navimg' src="/public/images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
  <li ><a href="/flowers" ><img class='navimg' src="/public/images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
  <!-- <li><div id='search'>検索</div></li> -->

  </ul>
  </div>
</div>
<!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->




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