<?php
require('controller/flowers.php');
?>

<?php include('common/favicon.html'); ?>
<title>花一覧</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/flowers.css">
</head>

<body>
  <div class="flowers-glid">
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