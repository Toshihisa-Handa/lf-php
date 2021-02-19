<?php
session_start();
include('../../common/funcs/funcs.php');

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$uid = $_SESSION['uid'];
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
include('../../common/component/header-icon.php');

if (!$_GET) {
  //データ登録SQL作成
  $sql = "SELECT 
          id,name,open,close,holiday,shop_img,feature,created_at
          FROM shop 
          ORDER BY created_at DESC";
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
} else {
  $kensaku = $_GET['kensaku'];
  $kensaku = '%' . $kensaku . '%';
  $sql = "SELECT 
          id,name,open,close,holiday,location,shop_img,feature,created_at
          FROM shop 
          WHERE name LIKE :kensaku 
          OR feature LIKE :kensaku OR location LIKE :kensaku 
          ORDER BY shop.created_at DESC";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':kensaku', $kensaku, PDO::PARAM_STR);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
}

?>

<?php include('../../common/component/favicon.html') ?>
<title>店舗一覧</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/shops.css">
</head>

<body>
  <div class="shops-glid">
    <header>
      <ul>
        <?php include('../../common/component/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
          <li class='searchNav'>
            <form method='get'>
              <span class='search-bar'>Search</span><input class='search t-search' type="text" name='kensaku' placeholder="検索ワード入力" required>
            </form>
          </li>
          <?php include('../../common/component/header-nav-rightIcon.php') ?>
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
        <?php foreach ($items as $item) : ?>
          <div class="shop-card">
            <a href="shop.php/? id=<?= $item['id']; ?>">
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
    <?php include('../../common/component/footer.html') ?>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <script>
    const search = document.querySelector('#search')
    const hideSearch = document.querySelector('.t-search')
    search.onclick = function() {
      hideSearch.classList.toggle('t-search')
    }
  </script>
</body>

</html>