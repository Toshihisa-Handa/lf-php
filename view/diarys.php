<?php
require('../controller/diarys.php');

?>

<?php include('common/favicon.html') ?>
<title>日記一覧</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/diarys.css">
</head>

<body>
  <div class="diarys-glid">
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
      <img src="/public/images/diaryimg2.png" alt="">
    </div>
    <div class="title1">
      <h1 class='topTitle'>Diary List</h1>
    </div>
  </div>
  <div class="diary-list">
    <div class="diaryList">
      <div class="diary-container">
        <?php foreach ($items as $item) : ?>
          <div class="dcard">
            <div class='diary-card'>
              <a href="/view/diary.php/? id=<?= $item['id']; ?>">
                <img src="/public/upload/<?= $item['image']; ?>" alt="">
                <h3><?= $item['title']; ?></h3>
                <p class='dtext'><?= $item['text']; ?></p>
              </a>
            </div>
            <div class="dname"><?= $item['shopname'] ?></div>
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