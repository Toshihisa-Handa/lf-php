<?php include('favicon.php') ?>

    <title>ログイン</title>
    <?php include('../common/style.php') ?>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>



<div class="flowers-glid">
  <header>
    <ul>
      
    <?php include('../common/header-nav-leftIcon.php') ?>

  
 

    </ul>
 </header>
     <div class="img1">

    </div>
     <div class="title1 ">
       <h1 class='topTitle'>Login Page</h1>
     </div>
     
</div>

 

 


<div class="login-list">

 <div class="loginimg">

 </div>


    <div class="loginList">
       
  
      <div class='login-card'>
        <!-- <form action="/login" method="post">
            <span class="label">E-mail</span><input class='linput' type="email" name="email" class="input" required><br>
            <br>
            <span class="label">Password</span><input class='linput' type="password" name="password" class="input" required><br>
            <br>
            <button class="lbutton" type="submit" class="submit">login</button>
        </form>
        <% if (typeof noUser !== 'undefined') { %>
          <p class="error"><%= noUser %></p>
      <% } %> -->
      <div class="rlink">
        <a href="/register"><span class='underbar'>&nbsp;&nbsp;新規御登録の方はこちらへ</span></a>
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
  <li ><a href="/map" ><img class='navimg' src="../images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
  <li ><a href="/shops" ><img class='navimg' src="../images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
  <li ><a href="/diarys" ><img class='navimg' src="../images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
  <li ><a href="/flowers" ><img class='navimg' src="../images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
  <!-- <li><div id='search'>検索</div></li> -->

  </ul>
  </div>
</div>
<!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->



</body>
</html>