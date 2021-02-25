<?php
require('controller/diary.php');
?>

<?php include('common/favicon.html') ?>
<title>日記詳細</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/diary.css">
</head>

<body>
  <div class="main-glid">
    <header>
      <ul>
        <?php include('common/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
          <?php include('common/header-nav-rightIcon.php') ?>
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
        <div><img class='diaryImg' src="/public/upload/<?= $item['image']; ?>"></div>
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
    <?php include('common/footer.html') ?>
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