<?php include('../../common/favicon.html') ?>

    <title>新規登録</title>
    <?php include('../../common/style.html') ?>
    <link rel="stylesheet" href="/public/css/login.css">

</head>
<body>



<div class="flowers-glid">
  <header>
    <ul>
      
    <?php include('../../common/header-nav-leftIcon.html') ?>

  
 

    </ul>
 </header>
     <div class="img1">

    </div>
     <div class="title1 ">
       <h1 class='topTitle'>SignUp Page</h1>
     </div>
     
</div>

 

 


<div class="login-list">

 <div class="loginimg2">

 </div>


    <div class="loginList2">
       
  
      <div class='login-card'>
        <form action="../action/register_act.php" method="post" class="board-form">
          <span class="label ">User Name</span><input type="text" name="name" class="input linput2" placeholder="例：花田かすみ" required><br>
          <br>
          <span class="label">E-mail</span><input type="email" name="email" class="input linput2" placeholder="例：hanadaxxxxx@gmail.com" required><br>
          <br>
          <span class="label">Password</span><input type="password" name="password" class="input linput2" placeholder="例：abc12345　（半角英数字使用可能）" required><br>
          <br>
          <button type="submit" class="submit lbutton2">SignUp</button>
      </form>
        <!-- <% if (typeof noUser !== 'undefined') { %>
          <p class="error"><%= noUser %></p>
      <% } %> -->
      <div class="rlink">
        <a href="login.php"><span class='underbar'>&nbsp;&nbsp;ログインの方はこちらへ</span></a>
      </div>
    </div>
  </div>
</div>



<!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
<div class="footer-glid">
  <footer class='topSubtitle'>
      <h3>Copyright  second-cube</h3>
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



</body>
</html>