<?php
require('controller/registerShop.php');
?>

<?php include('common/favicon.html'); ?>
<title>店舗情報編集</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/myprofileEdit.css">
</head>

<body>
    <div class="grid-box">
        <header>
        </header>
        <div class="main">
            <h2>基本情報編集</h2>
            <form method="post" class='editform1' enctype="">
                <div class='inframe'>
                    <div>　　　　店舗名</div><input class='inputs' type="text" name="name" placeholder="例：花田商店"><br>
                    <span style='color:red;'> <?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　サブタイトル</div><input class='inputs' type="text" name="title" placeholder="例：お店のキャッチコピーなど"><br>
                    <span style='color:red;'> <?php echo isset($errors['title1']) ? $errors['title1'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['title2']) ? $errors['title2'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　アカウント名</div><input class='inputs' type="text" name="account_name" value='<?= $uname ?>' placeholder="例：花田かすみ"><br>
                    <span style='color:red;'> <?php echo isset($errors['account_name']) ? $errors['account_name'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　ウェブサイト</div><input class='inputs' type="text" name="web" placeholder="例：https://xxxxx.com"><br>
                    <span style='color:red;'> <?php echo isset($errors['web']) ? $errors['web'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>メールアドレス</div><input class='inputs' type="text" name="email" value='<?= $uemail ?>' placeholder="例：hanadaxxxxx@gmail.com（半角英数字で入力して下さい）"><br>
                    <span style='color:red;'> <?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　　　電話番号</div><input type="text" class='inputs' name="tell" placeholder="「–」なし半角数字で入力して下さい"><br>
                    <span style='color:red;'> <?php echo isset($errors['tell']) ? $errors['tell'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['tell2']) ? $errors['tell2'] : ''; ?></span>
                </div>
                <h2>営業時間</h2>
                <div class='inframe'>
                    <div>　　　オープン</div>
                    <select name="open-hour">
                        <option value="">選択して下さい</option>
                        <?php include('common/select0-23.html') ?>
                    </select>
                    <div>:</div>
                    <select name="open-time">
                        <option value="">選択して下さい</option>
                        <?php include('common/select00-59.html') ?>
                    </select>
                </div>
                <div class='inframe'>
                    <div>　　　クローズ</div>
                    <select name="close-hour">
                        <option value="">選択して下さい</option>
                        <?php include('common/select0-23.html') ?>
                    </select>
                    <div>:</div>
                    <select name="close-time">
                        <option value="">選択して下さい</option>
                        <?php include('common/select00-59.html') ?>
                    </select>
                </div>
                <div class='inframe'>
                    <div>　　　　定休日</div>
                    <select name="holiday">
                        <option value="">選択して下さい</option>
                        <?php include('common/selectMon-Sun.html') ?>
                    </select>
                </div>
                <div class='inframe'>
                    <div>　　　　　住所</div><input type="text" class='inputs' name="location" placeholder="〇〇県〇〇市〇〇町〜"><br>
                    <span style='color:red;'> <?php echo isset($errors['location']) ? $errors['location'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　　　　　地図</div><input type="text" class='inputs' name="map" placeholder="https://goo.gl/maps/xxxxxxxx"><br>
                </div>
                <div class='inframe'>
                    <div>　店舗タイトル</div><input type="text" class='inputs' name="message" placeholder="店舗からお客様への一言を記入"><br>
                    <span style='color:red;'> <?php echo isset($errors['message1']) ? $errors['message1'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['message2']) ? $errors['message2'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　店舗コメント</div><textarea class='inputs' placeholder="店舗からお客様へのメッセージを記入" name="comment"></textarea><br>
                </div>
                <div class='inframe'>
                    <div>　　　店舗特徴</div><input type="text" class='inputs' name="feature" placeholder="店舗の特徴を一言で"><br>
                    <span style='color:red;'> <?php echo isset($errors['feature']) ? $errors['feature'] : ''; ?></span>
                </div>
                <button class='sends1 sends' type="submit">送信</button>
            </form>
        </div>
    </div>
    <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <div class="footer-glid">
        <footer>
            <h3>Copyright second-cube</h3>
        </footer>
        <!-- フッターナビ -->
        <!-- <?php include('common/footer.html') ?> -->
    </div>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>