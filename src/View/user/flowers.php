<?php
session_start();
include('../../common/funcs/funcs.php');
$uid = $_SESSION['uid'];
$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$title = $_POST['title'];
$text = $_POST['text'];


//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();
include('../../common/component/header-icon.php');


if (!$_GET) {
  //2．データ登録SQL作成
  $sql = "SELECT 
         flower.id,flower.name,flower.price,flower.feature,flower.tag,flower.created_at,flower.user_id,flower.image,shop.name AS shopname,shop.account_img
         FROM flower JOIN shop on flower.user_id =shop.user_id
         ORDER BY flower.created_at DESC";
  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
} else {
  // var_dump($_GET);
  // echo $_GET['kensaku'];
  // return;
  $kensaku = $_GET['kensaku'];
  $kensaku = '%' . $kensaku . '%';
  $sql = "SELECT flower.id,flower.name,flower.price,flower.feature,flower.tag,
                flower.created_at,flower.user_id,flower.image,shop.name AS shopname
                FROM flower JOIN shop on
                flower.user_id =shop.user_id 
                WHERE flower.name LIKE :kensaku 
                OR flower.feature LIKE :kensaku OR flower.text LIKE :kensaku OR flower.tag LIKE :kensaku OR shop.name LIKE :kensaku
                ORDER BY flower.created_at DESC";
  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $stmt->bindParam(':kensaku', $kensaku, PDO::PARAM_STR);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
}









?>







<?php include('../../common/component/favicon.html'); ?>
<title>花一覧</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/flowers.css">


</head>

<body>



  <div class="flowers-glid">
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
      <img src="/public/images/flowerimg2.png" alt="">
    </div>
    <div class="title1">
      <h1 class='topTitle'>Flower List </h1>
    </div>

  </div>






  <div class="flower-list">
    <div class="flowerList">

      <div class="flower-container">
        <?php foreach ($items as $item) : ?>
          <div class="fcard">
            <div class='flower-card'>
              <a href="flower.php/? id=<?= $item['id']; ?>">
                <img src="/public/upload/<?= $item['image']; ?>" alt="">
                <h3 class='fsname'><?= $item['name']; ?></h3>
                <div class='fprice'><?= number_format($item['price']); ?>円（税込）</div>
                <div class='ffeature'><?= $item['feature']; ?></div>
              </a>
            </div>
            <h2 class='fname'><?= $item['shopname']; ?></h2>
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
      // alert('hit')
    }
  </script>
</body>

</html>