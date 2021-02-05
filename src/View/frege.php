<?php  
session_start();
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

//画像処理
if($_SERVER['REQUEST_METHOD'] != 'POST'){
  //画像を取得
    
    //2．データ登録SQL作成
  //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
  $stmt = $pdo->prepare("SELECT* FROM flower ORDER BY created_at DESC");//日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $images = $stmt->fetchAll();//今までなかった記述。画像のアップロード特有
  
  
  
  }else{
    //POSTデータ取得
    //ここのFILESで[]されているimageはinput type=fileタグのname部分の名称
    $imgname = date("Ymd") . random_int(1, 999999) . $_FILES['image']['name'];//ここのnameはアップロードされたファイルのファイル名

  
    //指定フォルダに画像を保存
    $save = '/public/upload/' . basename($imgname);//保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
    move_uploaded_file($_FILES['image']['tmp_name'], $save);//指定した保存先へ保存
  
  //３．データ登録SQL作成
  //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
  $stmt = $pdo->prepare("INSERT INTO flower(name, price, feature, tag, text, created_at, user_id, image)VALUES(:name,:price,:feature,:tag,:text,sysdate(),1,:imgname);
  ");
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $stmt->bindValue(':price', $price, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $stmt->bindValue(':feature', $feature, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT
  $stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':imgname', $imgname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $status = $stmt->execute();
  
  
  //４．データ登録処理後（基本コピペ使用でOK)
  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);//エラーが起きたらエラーの2番目の配列から取ります。ここは考えず、これを使えばOK
                               // SQLEErrorの部分はエラー時出てくる文なのでなんでもOK
  }else{
    //５．index.phpへリダイレクト(エラーがなければindex.phpt)
    header('Location: frege.php');//Location:の後ろの半角スペースは必ず入れる。
    exit();
  
  }
    
  }





?>



<?php include('../../common/favicon.html') ?>
    <title>花登録</title>
    <?php include('../../common/style.html') ?>
    <link rel="stylesheet" href="/public/css/frege.css">

</head>
<body>
    <div class="grid-box">

        <header>
            <ul>
              
            <?php include('../../common/header-nav-leftIcon.html') ?>

              <div class='nav-right'>
<!--               
              <% if (typeof user == 'undefined') { %>
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



        
    

    <div class="main">
        <h1>花登録</h1>
        <form  method="POST" enctype="multipart/form-data">
            <div id='attachment'>
                <label>
                    <input type="file" name="image" class="fileinput">花の登録
                  </label>
                  <span class="filename">選択されていません</span>
              </div><br>
              <div class='inframe'>
                <div>　　　　品名</div><input class='inputs' type="text" name="name"><br>
            </div>
              <div class='inframe'>
                <div>価格（税込）</div><input class='inputs' type="text" placeholder="例：120  (半角数字で入力。単位（円）は入力不要です)" name="price"><br>
            </div>
              <div class='inframe'>
                <div>　　　　特徴</div><input class='inputs' type="text" name="feature"><br>
            </div>
              <div class='inframe'>
                <div>　　　　タグ</div><input class='inputs' type="text" name="tag"><br>
            </div>
              <div class='inframe'>
                <div>　　テキスト</div><textarea class='txt' name="text" ></textarea><br>
            </div>
         
            <button type="submit" class='sends'>送信</button>
        </form>

      </div>
      <div class="line">

      </div>
    


<div class="main2">
    
    <h2>花一覧</h2>
    <div class="flower-container">
        
    <?php for($i = 0; $i <count($images); $i++): ?>
         <div class="fcard">
            <div class='flower-card'>
                <a href="flower.php/<?= $images[$i]['id']; ?>">
                <img src="/public/upload/<?= $images[$i]['image']; ?>" alt="">
                <h3><?= $images[$i]['name']; ?></h3>
                <div class='fprice'><?= $images[$i]['price']; ?>円（税別）</div>
                <div class='ffeature'><?= $images[$i]['feature']; ?></div>
                <div class='ffeature'><?= $images[$i]['tag']; ?></div>
          
            </a>
           </div>
           <div class="option">
            <div class="update"><a href="/flowerEdit/<%=item.id%>">編集</a></div>
            <div class="delete"><a href="/flowerDelete/<%=item.id%>">削除</a></div>
        </div>
        </div>
        <?php endfor; ?>
        </div>



  </div>


    <div class="nav">
        <p><a href="/myprofile">店舗情報</a></p>
        <p><a href="/drege">日記の登録</a></p>
        <p><a href="/mapinfo">マップ情報</a></p>
    </div>


</div>

<!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
<div class="footer-glid">
    <footer>
        <h3>Copyright  second-cube</h3>
    </footer>
  
    <!-- フッターナビ -->
    <div class='Fnav web ' >
    <ul class='navs'>
    <li ><a href="/map" ><img class='navimg' src="/public/images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
    <li ><a href="/shops" ><img class='navimg' src="/public/images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
    <li ><a href="/diarys" ><img class='navimg' src="/public/images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
    <li ><a href="/flowers" ><img class='navimg' src="/public/images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
    <!-- <li><div id='search'>検索</div></li> -->
  
    </ul>
    </div>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
     $('#attachment .fileinput').on('change', function () {
 var file = $(this).prop('files')[0];
 $(this).closest('#attachment').find('.filename').text(file.name);
});
 </script>
</body>
</html>