<?php 
session_start();
include('common/funcs.php');
$name = $_SESSION['name'];



// loginCheck();
include('common/favicon.html') 
?>


    <title>Life flower</title>
    <?php include('common/style.html') ?>
    <link rel="stylesheet" href="public/css/top.css">
</head>

<body>
<div class="grid-box">


    <header>
       <ul>
<?php echo $name; ?>
         <li><a href="/index.php" ><img src="/public/images/lf-logo-gray.png" alt="" class='logo' ></a></li>
         <?php include('common/header-nav.html') ?>
         <div class='nav-right'>
         <li><div id='search'>検索</div></li>
         <!-- <% if (typeof user == 'undefined') { %> -->
         <li class='log'><a href="/src/View/login.php" class='hlink'>Login</a></li>
         <!-- <% } else{%> -->
         <li class='log'><a href="/src/View/logout.php" class='hlink'>Logout</a></li>
         <!-- <% } %> -->
         <li class='account_img' >
            <a href="/src/View/mypage.php">
               <!-- <% if (typeof user !== 'undefined' ) { %> -->
                   <!-- <% if(sitems[0].account_img=== null){%> -->
                       <img src="/public/images/account3.png" class='aimg' alt="" >  
                 <!-- <% }else{ %>
                   <img src="<%=sitems[0].account_img %>" class='aimg' alt="" >  
                 <% } %>
                 <% } %> -->
           </a>
       </li>
    </div>

       </ul>
    </header>

    <div class='main'>
            <p class='mainTitle'>Life flower</p>
            <p class='mainSubtitle'>日々に彩り＋</p>
    </div>
    <div class='title1'>
          <h1 class='topTitle'>いつもの場所に花を飾りませんか</h1> 
               
    </div>

    <div class="tips1">
        <h3 class='topSubtitle'>Life Flower で花をもっと身近に<br>
            日常に花の彩りを<br>
            外出自粛が続く昨今、今だからこそ<br>
            いつもの日常にプラスの色彩を加えてみませんか<br>
            普段通るあの道のあのお店、一体どんなところなんだろう<br>
            そんな疑問を解決するためにLife flowerは生まれました

        </h3>
        
    </div>
</div>

<div class="glid-box2">

    <div class='img1'>
        <img src="./public/images/images/1-1.png" alt="">
    </div>

    <div class='title2'>
      <h1 class='topTitle'>使い方</h1>
    </div>

    <div class="tips2">
        <h3 class='topSubtitle'>現在地周辺のお花屋さんを簡単に検索<br>
            販売している商品だけでなく、そのお店の日常も併せて閲覧<br>
            お気に入りのお店を見つけてください<br>
            これまで身近にあったけど、入れなかったあのお店、<br>
            Life flowerで覗いてみませんか<br>
            お花の詳細ページからご購入も可能です<br>
            お花が少しでも身近になった方は、本サイトを飛び出し、<br>
            ぜひ一度店舗へ遊びに行ってみてください</h3>
    </div>


    <div class='img2'>
        <img src="/public/images/img2.png" alt="">

    </div>


    <div class='link1'>
      <h1><a href="/src/View/shops"><span class='underbar topTitle'>&nbsp;&nbsp;&nbsp;Check Shops→&nbsp;&nbsp;</span></a></h1>
    </div>

    <div class='title3'>
      <h1 class='topTitle'>News</h1>
    </div>
</div>


<div class="glid-box3">

    <div class='left1'>
        <img src="/public/images/topimg6.png" alt="">
    </div>

    <div class="right1">
        <h1 class='topTitle2'>Flower shop Geek</h1>
        <h3 class='topSubtitle2'>10月1日よりOPENしました。<br>秋のベラドンナ入荷しました。<br>発色がよくほのかに香ります。<br>お近くお通りの際に是非覗いてみて下さい。
        </h3>
    </div>


    <div class='left2'>
        <h1 class='topTitle2'>Sun Flowers</h1>
        <h3 class='topSubtitle2'>10月1日よりOPENしました。<br>四季折々の素敵なお花を毎日用意してお待ちしています。<br>贈り物用のアレンジメントも得意です。</h3>
    </div>

    <div class="right2">
        <img src="/public/images/topimg5.jpg" alt="">
    </div>



<!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
     <footer >
         <h3 class='topSubtitle'>Copyright  second-cube</h3>
     </footer>
    </div>
<!-- フッターナビ -->
<div class='Fnav web ' >
    <ul class='navs'>
      <li ><a href="/src/View/map.php" ><img class='navimg' src="/public/images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
      <li ><a href="/src/View/shops.php" ><img class='navimg' src="/public/images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
      <li ><a href="/src/View/diarys.php" ><img class='navimg' src="/public/images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
      <li ><a href="/src/View/flowers.php" ><img class='navimg' src="/public/images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
      <!-- <li><div id='search'>検索</div></li> -->

    </ul>
</div>

<!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->


<!-- 
<script>
 const search = document.querySelector('#search')
 const hideSearch = document.querySelector('.search')
   search.onclick = function(){
     hideSearch.classList.toggle('search')
    // alert('hit')
 }

</script> -->
</body>
</html>