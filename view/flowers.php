<?php  

$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$title = $_POST['title'];
$text = $_POST['text'];


//DB接続
try{
  $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
} catch(PDOException $e) {
  //ここでエラー時の内容を確認できるようになる。これがないとerror500が出るだけ
  print "エラー！" . $e->getMessage() . "<br/>";
  die('終了します');
}


    //2．データ登録SQL作成
  //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
  $stmt = $pdo->prepare("SELECT* FROM flower ORDER BY created_at DESC");//日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $result = $stmt->fetchAll();//今までなかった記述。画像のアップロード特有
  
  
  




?>







<?php include('favicon.php') ?>

    <title>花一覧</title>
    <?php include('../common/style.php') ?>
    <link rel="stylesheet" href="../css/flowers.css">

 
</head>
<body>



<div class="flowers-glid">
    <header>
        <ul>
        <?php include('../common/header-nav-leftIcon.php') ?>

          <div class='nav-right'>
            <li class='searchNav'>
                <form action="/f_search" method='get'>
                <span class='search-bar'>Search</span><input  class='search t-search' type="text" name='kensaku' placeholder="検索ワード入力" required>
            </form>
           </li>
          <!-- <% if (typeof user == 'undefined') { %>
          <li class='log'><a href="/login" class='hlink'>Login</a></li>
          <% } else{%>
          <li class='log'><a href="/logout" class='hlink'>Logout</a></li>
          <% } %>
          <li class='account_img' >
             <a href="/mypage">
                <% if (typeof user !== 'undefined' ) { %>
                    <% if(sitems[0].account_img=== null){%>
                        <img src="images/account3.png" class='aimg' alt="" >  
                  <% }else{ %>
                    <img src="<%=sitems[0].account_img %>" class='aimg' alt="" >  
                  <% } %>
                  <% } %>
            </a>
        </li> -->
     </div>
 
        </ul>
     </header>
     <div class="img1">
        <img src="../images/flowerimg2.png" alt="">
    </div>
     <div class="title1">
        <h1 class='topTitle'>Flower List</h1>
    </div>
     
</div>

 

 


<div class="flower-list">
    <div class="flowerList">
       
        <div class="flower-container">
        <?php for($i = 0; $i <count($result); $i++): ?>
             <div class="fcard">
                <div class='flower-card'>
                    <a href="flower.php/<?= $result[$i]['id']; ?>">
                    <img src="../upload/<?= $result[$i]['image']; ?>" alt="">
                    <h3 class='fsname'><?= $result[$i]['name']; ?></h3>
                    <div class='fprice'><?= $result[$i]['price']; ?>円（税込）</div>
                    <div class='ffeature'><?= $result[$i]['feature']; ?></div>
                </a>
               </div>
               <!-- <h2 class='fname'><?= $result[$i]['shopname']; ?></h2> -->
            </div>
            <?php endfor; ?>
            </div>
  </div>
</div>


<!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
<div class="footer-glid">
    <footer>
        <h3 class='topSubtitle'>Copyright  second-cube</h3>
    </footer>

    <!-- フッターナビ -->
    <div class='Fnav web ' >
    <ul class='navs'>
    <li ><a href="/map" ><img class='navimg' src="../images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
    <li ><a href="/shops" ><img class='navimg' src="../images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
    <li ><a href="/diarys" ><img class='navimg' src="../images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
    <li ><a href="/flowers" ><img class='navimg' src="../images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
    <!-- <li><div id='search'>検索</div></li> -->

    </ul>
    </div>
</div>
<!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->



<script>
 const search = document.querySelector('#search')
 const hideSearch = document.querySelector('.t-search')
   search.onclick = function(){
     hideSearch.classList.toggle('t-search')
    // alert('hit')
 }

</script> 
</body>
</html>