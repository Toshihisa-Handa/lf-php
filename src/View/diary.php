<?php
session_start();
include('../../common/funcs.php');
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
$id = $_GET['id'];
$dcomment = $_POST['dcomment'];
//DB接続
$pdo = dbcon();

if (!$_POST) {
  //データ登録SQL作成
  // $sql = "SELECT diary.id,diary.title,diary.image,diary.tag,diary.text,diary.user_id,shop.name AS shopname
  //         FROM diary 
  //         JOIN shop on diary.user_id = shop.user_id 
  //         WHERE diary.id = $id";

  $sql = "SELECT diary.id,diary.title,diary.image,diary.tag,diary.text,diary.user_id,
          shop.name AS shopname,shop.account_name,shop.account_img,
          dcomment.diary_id,dcomment.dcomment,dcomment.created_at
        FROM diary 
        JOIN shop on diary.user_id = shop.user_id 
        JOIN dcomment on diary.id = dcomment.diary_id
        WHERE diary.id = 117
        ORDER BY created_at DESC";

  // $sql2 = "SELECT dcomment.diary_id,dcomment.dcomment FROM dcomment where diary_id = $id";

  // $sql2 = "SELECT diary.id,diary.title,diary.image,diary.tag,diary.text,diary.user_id,shop.name AS shopname,dcomment.diary_id,dcomment.dcomment
  //        FROM dcomment where diary_id = $id";



  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
} else {



  $sql = 'INSERT INTO dcomment (diary_id, dcomment, created_at, user_id) VALUES (:diary_id,:dcomment,sysdate(),:uid)';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':diary_id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':dcomment', $dcomment, PDO::PARAM_STR);
  $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
  $status = $stmt->execute();

  if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]); //エラーが起きたらエラーの2番目の配列から取ります。ここは考えず、これを使えばOK
    // SQLEErrorの部分はエラー時出てくる文なのでなんでもOK
  } else {
    //５．index.phpへリダイレクト(エラーがなければindex.phpt)
    header("Location: /src/View/diary.php/? id=$id"); //Location:の後ろの半角スペースは必ず入れる。
    exit();
  }
}





?>

<?php include('../../common/favicon.html') ?>

<title>日記詳細</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/diary.css">

</head>

<body>
  <div class="main-glid">


    <header>
      <ul>

        <?php include('../../common/header-nav-leftIcon.html') ?>

        <div class='nav-right'>

          <?php if ($uid == false || '') : ?>
            <li class='log'><a href="/src/View/login.php" class='hlink'>Login</a></li>
          <?php else : ?>
            <li class='log'><a href="/src/View/logout.php" class='hlink'>Logout</a></li>
          <?php endif; ?>
          <li class='account_img'>
            <a href="/src/View/mypage.php">
              <?php if ($uid) { ?>
                <?php if ($items['account_img'] === null) : ?>
                  <img src="/public/images/account3.png" class='aimg' alt="">
                <?php else : ?>
                  <img src="/public/upload/<?= $items['account_img']; ?>" class='aimg' alt="">
                <?php endif; ?>
              <?php } ?>
            </a>
          </li>
          </a>
          </li>
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
        <?php for ($i = 0; $i < 1; $i++) : ?>
          <div><img class='diaryImg' src="/public/upload/<?= $items[$i]['image']; ?>"></div>
          <h2 class='dfont'><?= $items[$i]['title'] ?></h2>
          <p class='diaryText dfont2'><?= $items[$i]['text'] ?></p>
        <?php endfor; ?>
        <div id='cbtn'><span class='btnClick'></span>コメント（<%=ditems.length %>）</div>

        <div class="dcomment">
          <% if (ditems.length) { %>
          <?php foreach ($items as $item) : ?>
            <div class="comment-box">
              <div class="dcname "><%= ditem.user_name %></div>
              <div class='dccreatedAt'> <?= $item['created_at']; ?></div>
              <div class="dccomment"><?= $item['dcomment']; ?></div>
            </div>
            <% }); %>
          <?php endforeach; ?>
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
    const cbtn = document.querySelector('#cbtn')
    const hideComment = document.querySelector('.dcomment')
    cbtn.onclick = function() {
      hideComment.classList.toggle('dcomment')
      // alert('hit')
    }
  </script>
</body>

</html>