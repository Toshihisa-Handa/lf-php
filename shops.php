<?php
require('controller/shops.php');

?>

<?php include('common/favicon.html') ?>
<title>店舗一覧</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/shops.css">
</head>

<body>
  <div class="shops-glid">
    <header>
      <ul>
        <?php include('common/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
          <li class='searchNav'>
            <form method='get'>
              <span class='search-bar'>Search</span><input class='search t-search' type="text" name='kensaku' placeholder="検索ワード入力" required>
            </form>
          </li>
          <?php include('common/header-nav-rightIcon.php') ?>
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
            <a href="/shop.php/? id=<?= $item['id']; ?>">
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
    <?php include('common/footer.html') ?>
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