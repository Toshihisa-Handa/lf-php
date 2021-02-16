<?php
session_start();
include('../../common/funcs.php');
$uid = $_SESSION['uid'];


//DB接続
$pdo = dbcon();
include('../../common/header-icon.php');


// 画像投稿の項目＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
if ($_FILES) {
    //account_img
    if ($_FILES['account_img']['name']) {

        $account_img = date("Ymd") . random_int(1, 999999) . $_FILES['account_img']['name']; //ここのnameはアップロードされたファイルのファイル名
        $save1 = '../../public/upload/' . basename($account_img);
        move_uploaded_file($_FILES['account_img']['tmp_name'], $save1);
        $sql = "UPDATE shop SET account_img=:account_img WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':account_img', $account_img, PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //shop_img
    if ($_FILES['shop_img']['name']) {
        $shop_img = date("Ymd") . random_int(1, 999999) . $_FILES['shop_img']['name'];
        $save2 = '../../public/upload/' . basename($shop_img); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['shop_img']['tmp_name'], $save2);
        $sql = "UPDATE shop SET shop_img=:shop_img WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':shop_img', $shop_img, PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //img1
    if ($_FILES['img1']['name']) {
        $img1 = date("Ymd") . random_int(1, 999999) . $_FILES['img1']['name'];
        $save3 = '../../public/upload/' . basename($img1); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['img1']['tmp_name'], $save3);
        $sql = "UPDATE shop SET img1=:img1 WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':img1', $img1, PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //img2
    if ($_FILES['img2']['name']) {
        $img2 = date("Ymd") . random_int(1, 999999) . $_FILES['img2']['name'];
        $save4 = '../../public/upload/' . basename($img2); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['img2']['tmp_name'], $save4);
        $sql = "UPDATE shop SET img2=:img2 WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':img2', $img2, PDO::PARAM_STR);
        $status = $stmt->execute();
    }

    if ($status == false) {
        $error = $stmt->errorInfo();
        exit("SQLError:" . $error[2]);
    } else {
        header('Location: /src/View/myprofileEdit.php'); //Location:の後ろの半角スペースは必ず入れる。
        exit();
    }
} else {
    // echo 'miss';
    // return;
}
// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝


//sql作成
$sql = "SELECT * FROM shop WHERE user_id=:uid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
$view = '';
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
} else {
    $item = $stmt->fetch();
}

?>


<?php include('../../common/favicon.html') ?>
<title>店舗情報編集</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/myprofileEdit.css">

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
            <h2>基本情報編集</h2>
            <form action='/src/View/myprofileEditUpdate.php' method="post" class='editform1'>
                <div class='inframe'>
                    <div>　　　　店舗名</div><input class='inputs' type="text" name="name" placeholder="例：花田商店" value='<?= $item["name"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>　サブタイトル</div><input class='inputs' type="text" name="title" placeholder="例：お店のキャッチコピーなど" value='<?= $item["title"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>　アカウント名</div><input class='inputs' type="text" name="account_name" placeholder="例：花田かすみ" value='<?= $item["account_name"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>　ウェブサイト</div><input class='inputs' type="text" name="web" placeholder="例：https://xxxxx.com" value='<?= $item["web"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>メールアドレス</div><input class='inputs' type="text" name="email" placeholder="例：hanadaxxxxx@gmail.com（半角英数字で入力して下さい）" value='<?= $item["email"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>　　　電話番号</div><input type="text" class='inputs' name="tell" placeholder="「–」なし半角数字で入力して下さい" value='<?= $item["tell"] ?>'><br>
                </div>

                <h2>営業時間</h2>
                <div class='inframe'>
                    <div>　　　オープン</div>
                    <!-- <input type="text" class='inputs' name="open" placeholder="10時" value='<?= $item["open"] ?>'><br> -->
                    <select  name="open-hour">
                        <option value="">選択して下さい</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                    </select>
                    <div>:</div>
                    
                    <select  name="open-time">
                        <option value="">選択して下さい</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                    </select>

                </div>

                <div class='inframe'>
                    <div>　　　クローズ</div>
                    <!-- <input type="text" class='inputs' name="close" placeholder="18時" value='<?= $item["close"] ?>'><br> -->
                    <select  name="close-hour">
                        <option value="">選択して下さい</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                    </select>
                    <div>:</div>
                    <select  name="close-time">
                        <option value="">選択して下さい</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                    </select>
                </div>

                <div class='inframe'>
                    <div>　　　　定休日</div><input type="text" class='inputs' name="holiday" placeholder="水曜日" value='<?= $item["holiday"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>　　　　　住所</div><input type="text" class='inputs' name="location" placeholder="〇〇県〇〇市〇〇町〜" value='<?= $item["location"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>　　　　　地図</div><input type="text" class='inputs' name="map" placeholder="https://goo.gl/maps/xxxxxxxx" value='<?= $item["map"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>　店舗タイトル</div><input type="text" class='inputs' name="message" placeholder="店舗からお客様への一言を記入" value='<?= $item["message"] ?>'><br>
                </div>

                <div class='inframe'>
                    <div>　店舗コメント</div><textarea class='inputs' placeholder="店舗からお客様へのメッセージを記入" name="comment"><?= $item["comment"] ?></textarea><br>
                </div>

                <div class='inframe'>
                    <div>　　　店舗特徴</div><input type="text" class='inputs' name="feature" placeholder="店舗の特徴を一言で" value='<?= $item["feature"] ?>'><br>
                </div>
                <input type="hidden" name='id' value="<?= $item["id"] ?>">

                <button class='sends1 sends' type="submit">送信</button>
            </form>

        </div>

        <div class="line"></div>
        <div class="main2">
            <h2>画像情報編集</h2>
            <img class='formimg' src="../..//public/upload/<?= $item["account_img"] ?>" alt="">

            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="account_img" class="fileinput">プロフィール写真の変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="../..//public/upload/<?= $item["shop_img"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="shop_img" class="fileinput">　店舗メイン画像変更　
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="../..//public/upload/<?= $item["img1"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="img1" class="fileinput">店舗画像①（横長）変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="../..//public/upload/<?= $item["img2"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="img2" class="fileinput">店舗画像②（縦長）変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>


        </div>


        <div class="nav">
            <p><a href="/src/View/myprofile.php">店舗情報</a></p>
            <p><a href="/src/View/drege.php">日記の登録</a></p>
            <p><a href="/src/View/frege.php">花の登録</a></p>
            <p><a href="/src/View/mapinfo.php">マップ情報</a></p>
        </div>

    </div>
    <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <div class="footer-glid">
        <footer>
            <h3>Copyright second-cube</h3>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#attachment .fileinput').on('change', function() {
            var file = $(this).prop('files')[0];
            $(this).closest('#attachment').find('.filename').text(file.name);
        });
    </script>
</body>

</html>