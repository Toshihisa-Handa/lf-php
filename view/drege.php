<?php 
include('../common/funcs.php');
$title = $_POST['title'];
$tag = $_POST['tag'];
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
  $stmt = $pdo->prepare("SELECT* FROM diary ORDER BY created_at DESC");//日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $images = $stmt->fetchAll();//今までなかった記述。画像のアップロード特有
  
  
  
  }else{
    //POSTデータ取得
    //ここのFILESで[]されているimageはinput type=fileタグのname部分の名称
    $imgname = date("Ymd") . random_int(1, 999999) . $_FILES['image']['name'];//ここのnameはアップロードされたファイルのファイル名

  
    //指定フォルダに画像を保存
    $save = '../upload/' . basename($imgname);//保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
    move_uploaded_file($_FILES['image']['tmp_name'], $save);//指定した保存先へ保存
  
  //３．データ登録SQL作成
  //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
  $stmt = $pdo->prepare("INSERT INTO diary(title,image,tag,text,created_at,user_id)VALUES(:title, :imgname,:tag,:text,sysdate(),1);
  ");
  $stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $stmt->bindValue(':imgname', $imgname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();
  
  
  //４．データ登録処理後（基本コピペ使用でOK)
  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);//エラーが起きたらエラーの2番目の配列から取ります。ここは考えず、これを使えばOK
                               // SQLEErrorの部分はエラー時出てくる文なのでなんでもOK
  }else{
    //５．index.phpへリダイレクト(エラーがなければindex.phpt)
    header('Location: drege.php');//Location:の後ろの半角スペースは必ず入れる。
    exit();
  
  }
    
  }





?>





<?php include('../common/favicon.php') ?>

    <title>日記登録</title>
    <?php include('../common/style.php') ?>
    <link rel="stylesheet" href="../css/drege.css">

  
</head>
<body>
    <div class="grid-box">
        <header>
            <ul>
              
            <?php include('../common/header-nav-leftIcon.php') ?>

              <div class='nav-right'>
              
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

     <div class="main">
        <h1>日記登録</h1>
        <form  method="POST" enctype="multipart/form-data">
            <div id='attachment'>
                <label>
                    <input type="file" name="image" class="fileinput">日記の登録
                  </label>
                  <span class="filename">選択されていません</span>
              </div><br>
              <div class='inframe'>
                <div>タイトル</div><input class='inputs' type="text" name="title"><br>
            </div>
              <div class='inframe'>
                <div>　　タグ</div><input class='inputs' type="text" name="tag"><br>
            </div>
              <div class='inframe'>
                <div>テキスト</div><textarea class='txt' name="text" ></textarea><br>
            </div>
         
            <button type="submit" class='sends'>送信</button>
        </form>

      </div>
      <div class="line">

      </div>
    
  <div class="main2">
    <h2>日記一覧</h2>

    <div class="diary-container">
    <?php for($i = 0; $i <count($images); $i++): ?>
          
            <div class="dcard">
            <div class='diary-card'>
                <a href="/diary/<%=item.id%>">
                    <img src="../upload/<?= $images[$i]['image']; ?>" alt="" >
                    <h3><?= $images[$i]['title']; ?></h3>               
                    <p class='dtext'><?= $images[$i]['text']; ?></p>
                </a>
                <div class="option">
                    <div class="update"><a href="/diaryEdit/<%=item.id%>">編集</a></div>
                    <div class="delete"><a href="/diaryDelete/<%=item.id%>">削除</a></div>
                </div>
                
           </div>
        </div>
        <?php endfor; ?>
    </div>
  </div>


<br>
<div class="nav">
    <p><a href="/myprofile">店舗情報</a></p>
    <p><a href="/frege">花の登録</a></p>
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
    <li ><a href="/map" ><img class='navimg' src="../images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
    <li ><a href="/shops" ><img class='navimg' src="../images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
    <li ><a href="/diarys" ><img class='navimg' src="../images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
    <li ><a href="/flowers" ><img class='navimg' src="../images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
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