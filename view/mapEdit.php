<?php include('favicon.php') ?>

    <title>マップ情報編集</title>
    <?php include('../common/style.php') ?>
    <link rel="stylesheet" href="../css/mapEdit.css">

</head>
 <body>
<div class="grid-box">

  <header>
    <ul>
      
    <?php include('../common/header-nav-leftIcon.php') ?>

      <div class='nav-right'>
<!--       
      <% if (typeof user == 'undefined') { %>
      <li class='log'><a href="/login" class='hlink'>Login</a></li>
      <% } else{%>
      <li class='log'><a href="/logout" class='hlink'>Logout</a></li>
      <% } %>
      <li class='account_img' >
         <a href="/mypage">
            <% if (typeof user !== 'undefined' ) { %>
                <% if(sitems[0].account_img=== null){%>
                    <img src="../images/account3.png" class='aimg' alt="" >  
              <% }else{ %>
                <img src="<%=sitems[0].account_img %>" class='aimg' alt="" >  
              <% } %>
              <% } %>
        </a>
    </li> -->
 </div>

    </ul>
 </header>
    <div class="main">
        <h1>マップ情報登録</h1>
        <form class='editform' action="/map_insert" method="post" enctype="multipart/form-data">
            <div id='attachment'>
                <label>
                    <input type="file" name="image" class="fileinput">マップ画像登録
                  </label><br>
                  <span class="filename">選択されていません</span>
              </div><br>
            <button type="submit" class='sends'>送信</button>
        </form>
        <form action='/mapUpdate/<%=item.id%>' method="post" >
            <!-- <div class='inframe'>
              <div>　　緯度</div><input class='inputs' type="text" name="lat" value='<%= item.lat%>'><br>
          </div>
            <div class='inframe'>
              <div>　　経度</div><input class='inputs' type="text" name="lon" value='<%= item.lon%>'><br>
          </div>
            <div class='inframe maphidden'>
              <div>ピンの色</div><input class='inputs' type="text" name="pincolor" value='<%= item.pincolor%>'><br>
          </div>
            <div class='inframe '>
              <div>タイトル</div><input class='inputs' type="text" name="maptitle" value='<%= item.title%>'><br>
          </div>
            <div class='inframe'>
              <div>　　説明</div><textarea class='txt'  name="description" ><%= item.description%></textarea><br>
          </div> -->
       
          <button type="submit" class='sends'>送信</button>
      </form>
    </div>

    <div class="nav">
        <p><a href="/mapinfo">マップ情報</a></p>
        <p><a href="/myprofile">店舗情報</a></p>
        <p><a href="/drege">日記の登録</a></p>
        <p><a href="/frege">花の登録</a></p>
      </div>
     
   
</div>

<!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
<div class="footer-glid">
  <footer>
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
     $('#attachment .fileinput').on('change', function () {
 var file = $(this).prop('files')[0];
 $(this).closest('#attachment').find('.filename').text(file.name);
});
 </script>
 </body>
</html>