<?php
require('../../controller/user/shop.php');
?>


<?php include('../../common/component/favicon.html') ?>
<title>店舗</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/shop.css">
<link rel="stylesheet" href="/public/css/Rshop.css">

<!-- glide.jsの読み込み -->
<link rel="stylesheet" href="/public/css/glide.core.min.css">
<link rel="stylesheet" href="/public/css/glide.theme.min.css">
</head>

<body>
  <div class="main-glid">
    <header>
      <ul>
        <?php include('../../common/component/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
          <?php include('../../common/component/header-nav-rightIcon.php') ?>
        </div>
      </ul>
    </header>
    <div class='main' style='background-image: url(/public/upload/<?= $item['shop_img'] ?>)'>
      <p class='mainTitle'><span class='mainspan1'>&nbsp;<?= $item['name'] ?> &nbsp;</span></p>
      <p class='mainSubtitle'><span class='mainspan2'>&nbsp;<?= $item['title'] ?>&nbsp;</span></p>
    </div>
    <div class='title1'>
      <h1 class='StopTitle'><?= $item['message'] ?></h1>
    </div>
  </div>
  <div class="tips-glid">
    <div class="tips1">
      <h3 class='StopsubTitle'><?= $item['comment'] ?></h3>
    </div>
  </div>
  <div class="img-glid">
    <div class='img1'>
      <img src="/public/upload/<?= $item['img1'] ?>" alt="">
    </div>
  </div>
  <div class="flower-glid">
    <div class='title2'>
      <h1 class='StopTitle'>Our Flowers</h1>
    </div>

    <!-- お花一覧 -->
    <?php if (count($floweritems) >= 1) : ?>
      <div class="flist">
        <div class="glide">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
              <?php foreach ($floweritems as $fitem) : ?>
                <div class="glide__slide">
                  <div class="flower-box">
                    <a href="/src/view/user/flower.php/? id=<?= $fitem['id'] ?>">
                      <div class="flower"><img src="/public/upload/<?= $fitem['image'] ?>" alt=""></div>
                      <h3 class='fname'><?= $fitem['name'] ?></h3>
                      <p class='fprice'><?= number_format($fitem['price']) ?>円（税込）</p>
                      <p class='ffeature'><?= $fitem['feature'] ?></p>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div class="flist">
        <p class='StopsubTitle' style='text-align: center; color:rgb(129, 131, 134)'>お花は登録されてません</p>
      </div>
    <?php endif; ?>
    <!-- お花一覧ここまで -->
    <div class='title3'>
      <h1 class='StopTitle'>Our Diaries</h1>
    </div>
    <!-- 日記一覧 -->
    <?php if (count($diaryitems) >= 1) : ?>
      <div class="dlist">
        <div class="dglide">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
              <?php foreach ($diaryitems as $ditem) : ?>
                <div class="glide__slide">
                  <div class="diary-box">
                    <a href="/src/view/user/diary.php/? id=<?= $ditem['id'] ?>">
                      <div class="diary"><img src="/public/upload/<?= $ditem['image'] ?>" alt=""></div>
                      <div class='dtitle'><?= $ditem['title'] ?></div>
                      <div class='dtext'><?= $ditem['text'] ?></div>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div class="dlist">
        <p class='StopsubTitle' style='text-align: center; color:rgb(129, 131, 134)'>日記は登録されてません</p>
      </div>
    <?php endif; ?>
  </div>
  <!-- 日記一覧ここまで -->

  <!-- アクセスグリッド -->
  <div class="access-glid">
    <div class='title4'>
      <h1>
        <span class='accessTitle StopTitle'>Access</span>
      </h1>
    </div>
    <div class="shopName">
      <h1 class='StopTitle'> <?= $item['name'] ?></h1>
    </div>
  </div>
  <!-- アクセスここまで -->

  <!-- マップ -->
  <div class="map-glid">
    <div class="img3">
      <div class="imgBox">
        <img src="/public/upload/<?= $item['img2'] ?>" alt="">
      </div>
    </div>
    <div class="access">
      <h3 class='afont'>　　　住　所　：<?= $item['location'] ?></h3>
      <h3 class='afont'>　　営業時間　：<?= $item['open'] ?>〜<?= $item['close'] ?></h3>
      <h3 class='afont'>　　　定休日　：<?= $item['holiday'] ?></h3>
      <h3 class='afont'>　　電話番号　：<a class='link' href="tel:<%= item[0].tell %> "><?= $item['tell'] ?></a></h3>
      <h3 class='afont'>メールアドレス：<a class='link' href="<%= item[0].email %>"><?= $item['email'] ?></a></h3>
      <h3 class='afont'>ホームページ　：</h3>
      <h3 class='afont'><a href="<?= $item['web'] ?>" class='link' target=”_blank”><?= $item['web'] ?></a></h3>
    </div>
    <div class="map">
      <iframe src="<?= $item['map'] ?>" class='shopmap' frameborder="0"></iframe>
    </div>
  </div>
  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3 class='StopsubTitle'>Copyright second-cube</h3>
    </footer>
    <!-- フッターナビ -->
    <?php include('../../common/component/footer.html') ?> -->
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->

  <!-- glide.jsの読み込み -->
  <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
  <script>
    //お花のカルーセルの設定
    let config;
    <?php if (count($floweritems) > 4) { ?>
      config = {
        type: 'carousel',
        perView: <?= count($floweritems) ?>,
        breakpoints: {
          2250: {
            perView: 5
          },
          1620: {
            perView: 4
          },
          1350: {
            perView: 3
          },
          1000: {
            perView: 2
          },
          650: {
            perView: 1
          }
        }
      }
    <?php } else { ?>
      config = {
        type: 'carousel',
        perView: <?= count($floweritems) ?>,
        breakpoints: {
          1620: {
            perView: <?= count($floweritems) ?>
          },

          1350: {
            perView: <?= count($floweritems) ?>
          },

          1000: {
            perView: <?= count($floweritems) ?>
          },

          650: {
            perView: <?= count($floweritems) ?>
          }

        }
      }
    <?php } ?>

    // //日記のカルーセルの設定
    let dconfig;
    <?php if (count($diaryitems) > 4) { ?>
      dconfig = {
        type: 'carousel',
        perView: <?= count($diaryitems) ?>,
        breakpoints: {
          2250: {
            perView: 5
          },
          1620: {
            perView: 4
          },
          1350: {
            perView: 3
          },
          1000: {
            perView: 2
          },
          650: {
            perView: 1
          }
        }
      }
    <?php } else { ?>
      dconfig = {
        type: 'carousel',
        perView: <?= count($diaryitems) ?>,
        breakpoints: {

          1620: {
            perView: <?= count($diaryitems) ?>
          },

          1350: {
            perView: <?= count($diaryitems) ?>
          },

          1000: {
            perView: <?= count($diaryitems) ?>
          },

          650: {
            perView: <?= count($diaryitems) ?>
          }


        }
      }
    <?php } ?>

    new Glide('.glide', config).mount()
    new Glide('.dglide', dconfig).mount()
  </script>
</body>

</html>