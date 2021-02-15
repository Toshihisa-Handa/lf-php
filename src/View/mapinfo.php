<?php
session_start();
include('../../common/funcs.php');
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];

//DB接続
$pdo = dbcon();


//データ登録SQL作成
$sql = "SELECT map.id,map.lat,map.lon,map.pincolor,map.maptitle,
        map.description,map.created_at,map.user_id,shop.account_img 
        FROM map JOIN shop on map.user_id = shop.user_id 
        WHERE map.user_id = $uid";
$stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
$status = $stmt->execute();
$item = $stmt->fetch();






?>



<?php include('../../common/favicon.html') ?>
<title>マップ情報</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/mapinfo.css">

</head>

<body>
  <div class="grid-box">
    <header>
      <ul>

        <?php include('../../common/header-nav-leftIcon.html') ?>

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
                      <img src="images/account3.png" class='aimg' alt="" >  
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
      <h2>マップ情報</h2>
      <div class='inframe'>
        <div>表示画像</div>
        <div class='inputs'> <img src="../../public/upload/<?= $item['account_img'];?>" class='mapimg' alt="" ></div><br>
      </div>
      <div class='inframe'>
        <div>　　緯度</div>
        <div class='inputs'><?=$item['lat']?></div><br>
      </div>
      <div class='inframe'>
        <div>　　経度</div>
        <div class='inputs'><?=$item['lon']?></div><br>
      </div>
      <div class='inframe'>
        <div>タイトル</div>
        <div class='inputs'><?=$item['maptitle']?></div><br>
      </div>
      <div class='inframe'>
        <div>ピンの色</div>
        <div class='inputs'><?=$item['pincolor']?></div><br>
      </div>
      <div class='inframe'>
        <div>　　説明</div>
        <div class='txt'><?=$item['description']?></div><br>
      </div>

    </div>






    <div class="nav">
      <p><a class='maplink' href="/src/View/mapEdit.php/<?=$item['id']?>">マップ情報編集</a></p>
      <p><a href="/myprofile">店舗情報</a></p>
      <p><a href="/drege">日記の登録</a></p>
      <p><a href="/frege">花の登録</a></p>
    </div>


  </div>

  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3>Copyright second-cube</h3>
    </footer>

    <!-- フッターナビ -->
    <div class='Fnav web '>
      <ul class='navs'>
        <li><a href="/map"><img class='navimg' src="/public/images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
        <li><a href="/shops"><img class='navimg' src="/public/images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
        <li><a href="/diarys"><img class='navimg' src="/public/images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
        <li><a href="/flowers"><img class='navimg' src="/public/images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
        <!-- <li><div id='search'>検索</div></li> -->

      </ul>
    </div>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->


</body>

</html>