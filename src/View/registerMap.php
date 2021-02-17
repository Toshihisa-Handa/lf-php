<?php
session_start();
include('../../common/funcs.php');
$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$maptitle = $_POST['maptitle'];
$description = $_POST['description'];






if ($_POST) {

  //db接続
  $pdo = dbcon();

  //sql作成
  $stmt = $pdo->prepare("INSERT INTO map(lat,lon,maptitle,description,created_at,user_id)VALUES(:lat,:lon,:maptitle,:description,sysdate(),:user_id)");
  $stmt->bindValue(':lat', $lat, PDO::PARAM_INT);
  $stmt->bindValue(':lon', $lon, PDO::PARAM_INT);
  $stmt->bindValue(':maptitle', $maptitle, PDO::PARAM_STR);
  $stmt->bindValue(':description', $description, PDO::PARAM_STR);
  $stmt->bindValue(':user_id', $uid, PDO::PARAM_INT);
  $status = $stmt->execute();


  //データ登録処理後
  if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
  } else {

    header('Location: /index.php'); //Location:の後ろの半角スペースは必ず入れる。
    exit();
  }
}


?>



<?php include('../../common/favicon.html') ?>
<title>マップ情報編集</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/mapEdit.css">

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
                    <img src="/public/images/account3.png" class='aimg' alt="" >  
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
      <form method="post">
        <div class='inframe'>
          <div>　　緯度</div><input class='inputs' type="text" name="lat" value=''><br>
        </div>
        <div class='inframe'>
          <div>　　経度</div><input class='inputs' type="text" name="lon" value=''><br>
        </div>
        <!-- <div class='inframe maphidden'>
              <div>ピンの色</div><input class='inputs' type="text" name="pincolor" value='<%= item.pincolor%>'><br>
          </div> -->
        <div class='inframe '>
          <div>タイトル</div><input class='inputs' type="text" name="maptitle" value=''><br>
        </div>
        <div class='inframe'>
          <div>　　説明</div><textarea class='txt' name="description"></textarea><br>
        </div>

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
      <h3>Copyright second-cube</h3>
    </footer>

    <!-- フッターナビ -->
    <!-- <?php include('../../common/footer.html') ?> -->
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $('#attachment .fileinput').on('change', function() {
      var file = $(this).prop('files')[0];
      $(this).closest('#attachment').find('.filename').text(file.name);
    });
  </script>
</body>

</html>