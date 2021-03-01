<?php
session_start();
include('../funcs.php');


//DB接続
$pdo = dbcon();


$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
$id = $_GET['id']; //diaryのid
$dcomment = $_POST['dcomment'];
include('../common/header-icon.php');

if (!$_POST) {
  //データ登録SQL作成
  $sql0 = "SELECT dcomment.dcomment,DATE_FORMAT(dcomment.created_at,'%Y/%m/%d %k:%i') AS created_at,ifnull(user.name,'名無し') AS user_name
          FROM dcomment
          LEFT OUTER JOIN user on dcomment.user_id = user.user_id
          WHERE dcomment.diary_id = $id
          ORDER BY dcomment.created_at DESC";

  $stmt = $pdo->prepare($sql0);
  $stmt->bindValue(':uid', $item['user_id'], PDO::PARAM_INT);
  $status = $stmt->execute();
  $commentitems = $stmt->fetchAll();


  $sql = "SELECT diary.id,diary.title,diary.image,diary.tag,diary.text,diary.user_id,shop.name AS shopname
          FROM diary 
          JOIN shop on diary.user_id = shop.user_id 
          WHERE diary.id = $id";
  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $item = $stmt->fetch();
} else {
  $sql = 'INSERT INTO dcomment (diary_id, dcomment, created_at, user_id) VALUES (:diary_id,:dcomment,sysdate(),:uid)';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':diary_id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':dcomment', h($dcomment), PDO::PARAM_STR);
  $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
  $status = $stmt->execute();

  if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
  } else {
    header("Location: /diary/? id=$id");
    exit();
  }
}

?>

<?php include('../common/favicon.html') ?>
<title>日記詳細</title>
<?php include('../common/style.html') ?>
<link rel="stylesheet" href="/css/diary.css">
</head>

<body>
  <div class="main-glid">
    <header>
      <ul>
        <?php include('../common/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
          <?php include('../common/header-nav-rightIcon.php') ?>
        </div>
      </ul>
    </header>
    <div class="title1">
      <h1 class='topTitle'>diary</h1>
    </div>
  </div>
  <div class="editar-area">
    <div class="container">
      <main class="main">
        <!-- メインコンテンツ -->
        <div><img class='diaryImg' src="/upload/<?= $item['image']; ?>"></div>
        <h2 class='dfont'><?= $item['title'] ?></h2>
        <p class='diaryText dfont2'><?= $item['text'] ?></p>
        <div id='cbtn'><span class='btnClick'></span>コメント（<?= count($commentitems) ?>）</div>
        <div class="dcomment">
          <?php if (count($commentitems) >= 1) : ?>
            <?php foreach ($commentitems as $citem) : ?>
              <div class="comment-box">
                <div class="dcname "><?= $citem['user_name'] ?></div>
                <div class='dccreatedAt'> <?= $citem['created_at']; ?></div>
                <div class="dccomment"><?= $citem['dcomment']; ?></div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </main>
      <div class="sidebar">
        <div class="sidebar__item">
          <!-- 中身 -->
        </div>
        <div class="sidebar__item sidebar__item--fixed">
          <!-- 固定・追従させたいエリア -->
          <form method="post">
            <textarea name="dcomment" id="dcomment" class="form textarea" placeholder="Comment"></textarea>
            <input type="hidden" name='did' value=''>
            <button class="lbutton" type="submit" class="submit">submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3 class='topSubtitle'>Copyright second-cube</h3>
    </footer>
    <!-- フッターナビ -->
    <?php include('../common/footer.html') ?>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <script>
    const cbtn = document.querySelector('#cbtn')
    const hideComment = document.querySelector('.dcomment')
    cbtn.onclick = function() {
      hideComment.classList.toggle('dcomment')
    }
  </script>
</body>

</html>