<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">
    <!-- glide.jsの読み込み -->
    <link rel="stylesheet" href="../css/glide.core.min.css">
    <link rel="stylesheet" href="../css/glide.theme.min.css">
</head>

<body>
<div class="main-glid">


    <header>
       <ul>
         <li>
             <a href="/mypage">
                <% if (typeof user !== 'undefined') { %>
                    <img src="../images/account.jpg" class='aimg' alt="" >  
                  <% } %>
            </a>
        </li>
        <li><a href="top.php">Home</a></li>
            <li><a href="shops.php">Shop</a></li>
            <li><a href="diarys.php">Diary</a></li>
            <li><a href="flowers.php">Flower</a></li>
         <!-- <% if (typeof user == 'undefined') { %>
         <li><a href="/login">Login</a></li>
         <% } else{%>
         <li><a href="/logout">Logout</a></li>
         <% } %> -->
       </ul>
    </header>

    <!-- <div class='main' style='background-image: url(<%= item[0].shop_img %>)'>
            <p class='mainTitle'><span class='mainspan1'>&nbsp;<%=item[0].name%>&nbsp;</span></p>
            <p class='mainSubtitle'><span class='mainspan2'>&nbsp;<%=item[0].title%>&nbsp;</span></p>
    </div>
    <div class='title1'>
          <h1><%=item[0].message%></h1>       
    </div>
  </div>

  <div class="tips-glid">
    <div class="tips1">
        <h3><%=item[0].comment%></h3>
    </div>
  </div>

  <div class="img-glid">
    <div class='img1'>
        <img src="<%= item[0].img1 %>" alt="">
    </div>
  </div> -->

  <div class="flower-glid">
    <div class='title2'>
      <h1>Our Flowers</h1>
    </div>


    <!-- お花一覧 -->

<!-- 
    <% if (fitem.length) { %>
      <div class="flist">
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides">
                <% fitem.forEach((fite) => { %>
                  <div class="glide__slide">
                    <div class="flower-box">
                    <a href="/flower/<%=fite.id%>">
                        <div class="flower"><img src="<%= fite.image %>" alt=""></div>
                        <h3 class='fname'><%=fite.name%></h3>
                        <p class='fprice'><%=fite.price%>円（税別）</p>
                        <p class='ffeature'><%=fite.feature%></p>
                    </a>
                  </div>
                  </div>
                <% }) %>

              </ul>
          
            </div>
            <!-- <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left fbl" data-glide-dir="<">←</button>
                <button class="glide__arrow glide__arrow--right fbr" data-glide-dir=">">→</button>
              </div> -->
          </div>
    </div>
<% }else{ %>
  <div class="flist">
 <p class='notAlert'>お花は登録されてません</p>
</div>

  <% } %> -->
<!-- お花一覧ここまで -->

  <div class='title3'>
    <h1>Our Diaries</h1>
  </div>
    
<!-- 日記一覧 -->
<!-- 
<% if (ditem.length) { %>
  <div class="dlist">
    <div class="dglide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <% ditem.forEach((dite) => { %>
              <div class="glide__slide">
                <div class="diary-box">
                <a href="/diary/<%=dite.id%>">
                  <div class="diary"><img src="<%= dite.image %>" alt=""></div>
                  <div class='dtitle'><%=dite.title%></div>
                  <div class='dtext'><%=dite.text%></div>
                </a> 
              </div>
            </div>
            <% }) %>
          </ul>
        </div>
    </div>
  </div>
 
<% }else{ %>
  <div class="dlist">
 <p class='notAlert'>日記は登録されてません</p>
</div>

<% } %> -->





</div>
<!-- 日記一覧ここまで -->

<!-- アクセスグリッド -->
<div class="access-glid">

<div class='title4'>
  <h1>
    <span class='accessTitle'>Access</span>
  </h1>
</div>

<!-- <div class="shopName">
  <h2> <%=item[0].name%></h2>
</div>
</div> -->
<!-- アクセスここまで -->

<!-- マップ -->
<!-- <div class="map-glid">

<div class="img3">
  <div class="imgBox">
    <img src="<%= item[0].img2 %>" alt="">
  </div>
</div>


<div class="access">
      <h3>住所：<%=item[0].location%></h3>
      <h3>営業時間：<%=item[0].open%>〜<%=item[0].close%></h3>
      <h3>定休日：<%=item[0].holiday%></h3>
      <h3>電話番号：<%=item[0].tell%></h3>
      <h3>メールアドレス：<%=item[0].email%></h3>
</div>


<div class="map">
  <iframe src="<%=item[0].map %>" class='shopmap'  frameborder="0"></iframe>
</div>

     <footer>
         <h3>Copyright  second-cube</h3>
     </footer>

</div> -->







<!-- glide.jsの読み込み -->
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
const config = {
  //お花のカルーセルの設定
    type: 'carousel',
    perView: 5,
    breakpoints: {
    1400: {
      perView: 4
    },
    1250: {
      perView: 3
    },
    850: {
      perView: 2
    },
    600: {
      perView: 1
    }
  }
}
//日記のカルーセルの設定
const dconfig = {
    type: 'carousel',
    perView: 4,
    breakpoints: {
    
    1350: {
      perView: 3
    },
    950: {
      perView: 2
    },
    600: {
      perView: 1
    }
  }
}


    new Glide('.glide', config).mount()
    new Glide('.dglide', dconfig).mount()
  </script>
</body>
</html>