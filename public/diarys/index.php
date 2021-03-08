<?php
session_start();
include('../../funcs.php');


//DB接続
$pdo = dbcon();


$uid = $_SESSION['uid'];
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
include('../../common/header-icon.php');

if (!$_GET) {
  //データ登録SQL作成
  $sql = "SELECT 
         diary.id,diary.title,diary.image,diary.tag,diary.text,diary.created_at,shop.name AS shopname
         FROM diary JOIN shop on diary.user_id =shop.user_id
         ORDER BY diary.created_at DESC";
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
} else {
  $kensaku = $_GET['kensaku'];
  $kensaku = '%' . $kensaku . '%';
  $sql = "SELECT diary.id,diary.title,diary.image,diary.tag,diary.text,
        diary.created_at,shop.name AS shopname FROM diary JOIN shop on
        diary.user_id =shop.user_id 
        WHERE diary.title LIKE :kensaku 
        OR diary.tag LIKE :kensaku OR diary.text LIKE :kensaku OR shop.name LIKE :kensaku
        ORDER BY diary.created_at DESC";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':kensaku', $kensaku, PDO::PARAM_STR);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
}

?>

<?php include('../../common/favicon.html') ?>
<title>日記一覧</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/css/diarys.css">
</head>

<body>
  <div class="diarys-glid">
    <header>
      <ul>
        <?php include('../../common/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
          <li class='searchNav'>
            <form method='get'>
              <span class='search-bar'>Search</span><input class='search t-search' type="text" name='kensaku' placeholder="検索ワード入力" required>
            </form>
          </li>
          <?php include('../../common/header-nav-rightIcon.php') ?>
        </div>
      </ul>
    </header>
    <div class="img1">
      <img src="/images/diaryimg2.png" alt="">
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
              <a href="/diary/? id=<?= $item['id']; ?>">
                <img src="/upload/<?= $item['image']; ?>" alt="">
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
    <?php include('../../common/footer.html') ?>
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