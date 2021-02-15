<?php 
session_start();
include('../../common/funcs.php');
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];


//DB接続
$pdo = dbcon();
include('../../common/header-icon.php');

//画像処理
if($_SERVER['REQUEST_METHOD'] != 'POST'){
  //画像を取得
    
    //2．データ登録SQL作成
  //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
  $stmt = $pdo->prepare("SELECT* FROM diary WHERE user_id = $uid ORDER BY created_at DESC");//日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $images = $stmt->fetchAll();//今までなかった記述。画像のアップロード特有
  
  
  
  }else{


    //POSTデータ取得
    //ここのFILESで[]されているimageはinput type=fileタグのname部分の名称
    $imgname = date("Ymd") . random_int(1, 999999) . $_FILES['image']['name'];//ここのnameはアップロードされたファイルのファイル名

  
    //指定フォルダに画像を保存
    $save = '../../public/upload/' . basename($imgname);//保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
    move_uploaded_file($_FILES['image']['tmp_name'], $save);//指定した保存先へ保存**現在ルートディレクトリがtmp_nameを含んでいない為move_uploadが効かない。


  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO diary(title,image,tag,text,created_at,user_id)VALUES(:title, :imgname,:tag,:text,sysdate(),:uid)");
  $stmt->bindValue(':title', $title, PDO::PARAM_STR);
  $stmt->bindValue(':imgname', $imgname, PDO::PARAM_STR); 
  $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);  
  $stmt->bindValue(':text', $text, PDO::PARAM_STR);
  $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);  
  $status = $stmt->execute();
  
  
  //４．データ登録処理後（基本コピペ使用でOK)
  if($status==false){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
                              
  }else{
    //５．
    header('Location: drege.php');//Location:の後ろの半角スペースは必ず入れる。
    exit();
  
  }
    
  }





?>





<?php include('../../common/favicon.html') ?>

    <title>日記登録</title>
    <?php include('../../common/style.html') ?>
    <link rel="stylesheet" href="/public/css/drege.css">

  
</head>
<body>
    <div class="grid-box">
        <header>
            <ul>
              
            <?php include('../../common/header-nav-leftIcon.html') ?>

              <div class='nav-right'>
              
              <?php include('../../common/header-nav-rightIcon.php') ?>

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
                <a href="diary.php/<?= $images[$i]['id']; ?>">
                    <img src="../../public/upload/<?= $images[$i]['image']; ?>" alt="" >
                    <h3><?= $images[$i]['title']; ?></h3>               
                    <p class='dtext'><?= $images[$i]['text']; ?></p>
                </a>
                <div class="option">
                    <div class="update"><a href="diaryEdit.php/? id=<?= $images[$i]['id']; ?>">編集</a></div>
                    <div class="delete"><a href="diaryDelete.php/? id=<?= $images[$i]['id']; ?>">削除</a></div>
                </div>
                
           </div>
        </div>
        <?php endfor; ?>
    </div>
  </div>


<br>
<div class="nav">
            <p><a href="/src/View/myprofile.php">店舗情報</a></p>
            <p><a href="/src/View/frege.php">花の登録</a></p>
            <p><a href="/src/View/mapinfo.php">マップ情報</a></p>
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