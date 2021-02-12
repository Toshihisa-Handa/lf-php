<?php
session_start();
include('../../common/funcs.php');
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];


//DB接続
$pdo = dbcon();


//2．データ登録SQL作成
$sql = "SELECT 
         id,name,open,close,holiday,shop_img,feature,created_at
         FROM shop 
         ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
$status = $stmt->execute();
$result = $stmt->fetchAll();





?>

<?php
include('../../common/favicon.html')
?>
<title>店舗一覧</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/shops.css">

</head>

<body>



  <div class="shops-glid">
    <header>
      <ul>

        <?php include('../../common/header-nav-leftIcon.html') ?>

        <div class='nav-right'>
          <li class='searchNav'>
            <form action="/s_search" method='get'>
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
      <img src="/public/images/shopsimg1.png" alt="">
    </div>

    <div class="title1">
      <div class='topTitle'>Shop List</div>
    </div>


  </div>






  <div class="shop-list">
    <div class="shopList">
      <div class="shop-container">
        <?php foreach ($result as $item) : ?>
          <div class="shop-card">
            <a href="shop.php/<?= $item['id']; ?>">
              <img src="/public/upload/<?= $item['shop_img']; ?>" alt="">
              <div class='shopTitle'><?= $item['name'] ?></div>
              <div class='shopSub'>営業時間：<?= $item['open'] ?>~<?= $item['close'] ?></div>
              <div class='shopSub'>休業日：<?= $item['holiday'] ?></div>
              <div class='shopSub'>特徴：<?= $item['feature'] ?></div>
            </a>
          </div>

        <?php endforeach; ?>
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