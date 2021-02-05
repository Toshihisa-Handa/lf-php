<?php
include('../../common/funcs.php');
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];


//DB接続
try {
  $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
} catch (PDOException $e) {
  //ここでエラー時の内容を確認できるようになる。これがないとerror500が出るだけ
  print "エラー！" . $e->getMessage() . "<br/>";
  die('終了します');
}


//2．データ登録SQL作成
//prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
$stmt = $pdo->prepare("SELECT* FROM diary ORDER BY created_at DESC"); //日付で登録が新しいものが上になる様に抽出
$status = $stmt->execute();
$result = $stmt->fetchAll();





?>


<?php 
session_start();
include('../../common/favicon.html') 
?>

<title>日記一覧</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/diarys.css">

</head>

<body>



  <div class="diarys-glid">
    <header>
      <ul>

        <?php include('../../common/header-nav-leftIcon.html') ?>

        <div class='nav-right'>
          <li class='searchNav'>
            <form action="/d_search" method='get'>
              <span class='search-bar'>Search</span><input class='search t-search' type="text" name='kensaku' placeholder="検索ワード入力" required>
            </form>
          </li>
          <!-- <% if (typeof user == 'undefined') { %>
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
    <div class="img1">
      <img src="/public/images/diaryimg2.png" alt="">
    </div>
    <div class="title1">
      <h1 class='topTitle'>Diary List</h1>
    </div>

  </div>






  <div class="diary-list">
    <div class="diaryList">

      <div class="diary-container">
        <?php for ($i = 0; $i < count($result); $i++) : ?>
          <div class="dcard">
            <div class='diary-card'>
              <a href="diary/<?= $result[$i]['image']; ?>">
                <img src="/public/upload/<?= $result[$i]['image']; ?>" alt="">
                <h3><?= $result[$i]['title']; ?></h3>
                <p class='dtext'><?= $result[$i]['text']; ?></p>
              </a>
            </div>
            <!-- <div class="dname"><?= $result[$i]['shopname']; ?></div> -->
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>

  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3 class='topSubtitle'>Copyright second-cube</h3>
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



  <script>
    const search = document.querySelector('#search')
    const hideSearch = document.querySelector('.t-search')
    search.onclick = function() {
      hideSearch.classList.toggle('t-search')
      // alert('hit')
    }
  </script>
</body>

</html>