<?php
session_start();
include('../../common/funcs.php');
$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
$id = $_GET['id'];
$fcomment = $_POST['fcomment'];

//DB接続
$pdo = dbcon();
include('../../common/header-icon.php');




if (!$_POST) {
  //データ登録SQL作成
  $sql0 = "SELECT fcomment.fcomment_id,fcomment.flower_id,fcomment.fcomment,fcomment.created_at,fcomment.user_id ,user.user_id,user.name
           FROM fcomment
           JOIN flower on fcomment.flower_id = flower.id
           JOIN user on fcomment.user_id = user.user_id
           WHERE flower.id = $id
           ORDER BY fcomment.created_at DESC";
  $stmt = $pdo->prepare($sql0);
  $stmt->bindValue(':uid', $item['user_id'], PDO::PARAM_INT);
  $status = $stmt->execute();
  $commentitems = $stmt->fetchAll();


  $sql = "SELECT flower.id,flower.name,flower.price,flower.feature,flower.text,flower.user_id,flower.image,shop.name AS shopname
        FROM flower 
        JOIN shop on flower.user_id = shop.user_id 
        WHERE flower.id = $id";
  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $item = $stmt->fetch();
} else {



  $sql = 'INSERT INTO fcomment (flower_id, fcomment, created_at, user_id) VALUES (:flower_id,:fcomment,sysdate(),:uid)';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':flower_id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':fcomment', $fcomment, PDO::PARAM_STR);
  if ($uid == null) {
    $stmt->bindValue(':uid', 0, PDO::PARAM_INT);
  } else {
    $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
  }
  $status = $stmt->execute();

  if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]); //エラーが起きたらエラーの2番目の配列から取ります。ここは考えず、これを使えばOK
    // SQLEErrorの部分はエラー時出てくる文なのでなんでもOK
  } else {
    //５．index.phpへリダイレクト(エラーがなければindex.phpt)
    header("Location: /src/View/flower.php/? id=$id"); //Location:の後ろの半角スペースは必ず入れる。
    exit();
  }
}




?>

<?php include('../../common/favicon.html') ?>
<title>花詳細</title>
<?php include('../../common/style.html') ?>

<link rel="stylesheet" href="/public/css/flower.css">

</head>

<body>
  <div class="main-glid">

    <header>
      <ul>

        <?php include('../../common/header-nav-leftIcon.html') ?>

        <div class='nav-right'>

          <?php include('../../common/header-nav-rightIcon.php') ?>

        </div>

      </ul>
    </header>


    <div class="title1">
      <h1 class='topTitle'>Flower</h1>
    </div>
  </div>


  <div class="editar-area">
    <div class="container">
      <main class="main">
        <!-- メインコンテンツ -->
        <div><img src="/public/upload/<?= $item['image']; ?>" alt="" class='diaryImg'></div>
        <h3 class='dfont'><?= $item['name'] ?></h3>
        <p class='dfont2'>店舗：<?= $item['shopname'] ?></p>
        <p class='dfont2'>価格：<?= $item['price'] ?>円（税込）</p>
        <p class='dfont2'>特徴：<?= $item['name'] ?></p>
        <p class='dfont2' class='diaryText'><?= $item['text'] ?></p>
        <div id='cbtn'><span class='btnClick'></span>コメント（<?= count($commentitems) ?>）</div>

        <div class="dcomment">

          <?php if (count($commentitems) >= 1) : ?>
            <?php foreach ($commentitems as $citem) : ?>
              <div class="comment-box">
                <div class="dcname"><?= $citem['name'] ?></div>
                <div class='dccreatedAt'> <?= $citem['created_at']; ?></div>
                <div class="dccomment"><?= $citem['fcomment']; ?></div>
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
            <textarea name="fcomment" id="fcomment" class="form textarea" placeholder="Comment"></textarea>
            <button class="lbutton" type="submit" class="submit">submit</button>
          </form>

          <div class="btncontainer">
            <button class='btn-open' id="checkout-button">購入画面へ</button>
          </div>


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





  <!-- stripe読み込み↓ -->
  <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <!-- 購入ページボタンのアクション↓ -->
  <script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("pk_test_51HbhniH1kHMqkRvftZX8frXuhhtIQe7Sm7bnQmv0uuF6Nsqsy2s7E6CQy2j0jj0jU5L2klAtfnrr2vorzPIbLbVl00eLZ8qSlj");
    var checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", function() {

      fetch("/create-session/<%=item.id%>", {
          method: "POST",
        })
        .then(function(response) {
          return response.json();
        })
        .then(function(session) {
          return stripe.redirectToCheckout({
            sessionId: session.id
          });
        })
        .then(function(items) {
          // If redirectToCheckout fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using error.message.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error("Error:", error);
        });
    });
  </script>
  <!-- コメントの表示↓ -->
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