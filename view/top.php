<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/top.css">
</head>
<body>
<div class="grid-box">
    <header>
       <ul>
         <li>
             <a href="mypage.php">

                <!-- <% if (typeof user !== 'undefined') { %> -->
                    <img src="../images/account.jpg" class='aimg' alt="" >  
                  <!-- <% } %> -->
            </a>
        </li>
         <li><a href="shops.php">Shop</a></li>
         <li><a href="diarys.php">Diary</a></li>
         <li><a href="flowers.php">Flower</a></li>
         <!-- <% if (typeof user == 'undefined') { %> -->
         <li><a href="login.php">Login</a></li>
         <!-- <% } else{%> -->
         <li><a href="logout.php">Logout</a></li>
         <!-- <% } %> -->
       </ul>
    </header>

    <div class='main'>
            <p class='mainTitle'>Life flower</p>
            <p class='mainSubtitle'>日々に彩り＋</p>
    </div>
    <div class='title1'>
          <h1>いつもの場所に花を飾りませんか</h1>       
    </div>

    <div class="tips1">
        <h3>Life Flower で花をもっと身近に<br>
            日常に一輪挿しの彩りを</h3>
    </div>
</div>

<div class="glid-box2">

    <div class='img1'>
        <img src="../images/1-1.png" alt="">
    </div>

    <div class='title2'>
      <h1>使い方</h1>
    </div>

    <div class="tips2">
        <h3>現在地周辺のお花屋さんを簡単に検索<br>
            気になるお店はフォロー可能<br>
            販売している商品だけでなく、そのお店の日常の投稿も併せて閲覧<br>
            お気に入りのお店を見つけてください。<br>
            お花がちょっとでも身近になった方は、ぜひ、一度直接店舗へ遊びへ行ってみてください。</h3>
    </div>


    <div class='img2'>
        <img src="../images/img2.png" alt="">

    </div>


    <div class='link1'>
      <h1><a href="/shops"><span class='underbar'>&nbsp;&nbsp;&nbsp;Check Shops→&nbsp;&nbsp;</span></a></h1>
    </div>

    <div class='title3'>
      <h1>News</h1>
    </div>
</div>


<div class="glid-box3">

    <div class='left1'>
        <img src="../images/topimg6.png" alt="">
    </div>

    <div class="right1">
        <h1>FRIDA'S</h1>
        <h3>お店の情報、お店の情報、お店の情報、<br>
            お店の情報、お店の情報、お店の情報、お店の情報、<br>
            お店の情報、お店の情報</h3>
    </div>


    <div class='left2'>
        <h1>Sun Flowers</h1>
        <h3>お店の情報、お店の情報、お店の情報、<br>
            お店の情報、お店の情報、お店の情報、お店の情報、<br>
            お店の情報、お店の情報</h3>
    </div>

    <div class="right2">
        <img src="../images/topimg5.jpg" alt="">
    </div>



  

     <footer>
         <h3>Copyright  second-cube</h3>
     </footer>
    </div>






<script>
 const search = document.querySelector('#search')
 const hideSearch = document.querySelector('.search')
   search.onclick = function(){
     hideSearch.classList.toggle('search')
    // alert('hit')
 }

</script>
</body>
</html>