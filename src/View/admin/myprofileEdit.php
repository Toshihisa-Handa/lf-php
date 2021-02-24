<?php
require('../../controller/admin/myprofileEdit.php');
$posted = $_SESSION['posted']

?>


<?php include('../../common/component/favicon.html') ?>
<title>店舗情報編集</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/myprofileEdit.css">
</head>

<body>
    <div class="grid-box">
        <header>
            <ul>
                <?php include('../../common/component/header-nav-leftIcon.html') ?>
                <div class='nav-right'>
                    <?php include('../../common/component/header-nav-rightIcon.php') ?>
                </div>
            </ul>
        </header>
        <div class="main">
            <h2>基本情報編集</h2>
            <h3 style='color:red;'> <?php echo isset($errors['other']) ? $errors['other'] : ''; ?></h3>
            <form action='/src/model/myprofileEditUpdate.php' method="post" class='editform1'>
                <div class='inframe'>
                    <div>　　　　店舗名</div><input class='inputs' type="text" name="name" placeholder="例：花田商店" value='<?=isset($posted['name'])?$posted['name'] : $item["name"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　サブタイトル</div><input class='inputs' type="text" name="title" placeholder="例：お店のキャッチコピーなど" value='<?=isset($posted['title'])?$posted['title'] : $item["title"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['title1']) ? $errors['title1'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['title2']) ? $errors['title2'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　アカウント名</div><input class='inputs' type="text" name="account_name" placeholder="例：花田かすみ" value='<?=isset($posted['account_name'])?$posted['account_name'] : $item["account_name"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['account_name']) ? $errors['account_name'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　ウェブサイト</div><input class='inputs' type="text" name="web" placeholder="例：https://xxxxx.com" value='<?=isset($posted['web'])?$posted['web'] : $item["web"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['web']) ? $errors['web'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>メールアドレス</div><input class='inputs' type="text" name="email" placeholder="例：hanadaxxxxx@gmail.com（半角英数字で入力して下さい）" value='<?=isset($posted['email'])?$posted['email'] : $item["email"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　　　電話番号</div><input type="text" class='inputs' name="tell" placeholder="「–」なし半角数字で入力して下さい" value='<?=isset($posted['tell'])?$posted['tell'] : $item["tell"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['tell']) ? $errors['tell'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['tell2']) ? $errors['tell2'] : ''; ?></span>
                </div>
                <h2>営業時間</h2>
                <div class='inframe'>
                    <div>　　　オープン</div>
                    <?php if ($item['open'] == null) : ?>
                        <select name="open-hour">
                            <option value="">選択して下さい</option>
                            <?php include('../../common/component/select0-23.html') ?>
                        </select>
                        <div>:</div>
                        <select name="open-time">
                            <option value="">選択して下さい</option>
                            <?php include('../../common/component/select00-59.html') ?>
                        </select>
                    <?php else : ?>
                        <select name="open-hour">
                            <option value="<?=isset($posted['open-hour'])?$posted['open-hour'] :  explode(":", $item['open'])[0]?>"><?=isset($posted['open-hour'])?$posted['open-hour'] :  explode(":", $item['open'])[0]?></option>
                            <?php include('../../common/component/select0-23.html') ?>
                        </select>
                        <div>:</div>
                        <select name="open-time">
                        <option value="<?=isset($posted['open-time'])?$posted['open-time'] :  explode(":", $item['open'])[1]?>"><?=isset($posted['open-time'])?$posted['open-time'] :  explode(":", $item['open'])[1]?></option>
                            <?php include('../../common/component/select00-59.html') ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class='inframe'>
                    <div>　　　クローズ</div>
                    <?php if ($item['close'] == null) : ?>
                        <select name="close-hour">
                            <option value="">選択して下さい</option>
                            <?php include('../../common/component/select0-23.html') ?>
                        </select>
                        <div>:</div>
                        <select name="close-time">
                            <option value="">選択して下さい</option>
                            <?php include('../../common/component/select00-59.html') ?>
                        </select>
                    <?php else : ?>
                        <select name="close-hour">
                        <option value="<?=isset($posted['close-hour'])?$posted['close-hour'] :  explode(":", $item['close'])[0]?>"><?=isset($posted['close-hour'])?$posted['close-hour'] :  explode(":", $item['close'])[0]?></option>
                            <?php include('../../common/component/select0-23.html') ?>
                        </select>
                        <div>:</div>
                        <select name="close-time">
                        <option value="<?=isset($posted['close-time'])?$posted['close-time'] :  explode(":", $item['close'])[1]?>"><?=isset($posted['close-time'])?$posted['close-time'] :  explode(":", $item['close'])[1]?></option>
                            <?php include('../../common/component/select00-59.html') ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class='inframe'>
                    <div>　　　　定休日</div>
                    <?php if ($item['holiday'] == null) : ?>
                        <select name="holiday">
                            <option value="">選択して下さい</option>
                            <?php include('../../common/component/selectMon-Sun.html') ?>
                        </select>
                    <?php else : ?>
                        <select name="holiday">
                            <option value="<?=isset($posted['holiday'])?$posted['holiday'] : $item["holiday"] ?>"><?=isset($posted['holiday'])?$posted['holiday'] : $item["holiday"] ?></option>
                            <option value="<?= $item['holiday'] ?>"><?= $item['holiday'] ?></option>
                            <?php include('../../common/component/selectMon-Sun.html') ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class='inframe'>
                    <div>　　　　　住所</div><input type="text" class='inputs' name="location" placeholder="〇〇県〇〇市〇〇町〜" value='<?=isset($posted['location'])?$posted['location'] : $item["location"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['location']) ? $errors['location'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　　　　　地図</div><input type="text" class='inputs' name="map" placeholder="https://goo.gl/maps/xxxxxxxx" value='<?= $item["map"] ?>'><br>
                </div>
                <div class='inframe'>
                    <div>　店舗タイトル</div><input type="text" class='inputs' name="message" placeholder="店舗からお客様への一言を記入" value='<?=isset($posted['message'])?$posted['message'] : $item["message"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['message1']) ? $errors['message1'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['message2']) ? $errors['message2'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　店舗コメント</div><textarea class='inputs' placeholder="店舗からお客様へのメッセージを記入" name="comment"><?=isset($posted['comment'])?$posted['comment'] : $item["comment"] ?></textarea><br>
                </div>
                <div class='inframe'>
                    <div>　　　店舗特徴</div><input type="text" class='inputs' name="feature" placeholder="店舗の特徴を一言で" value='<?=isset($posted['feature'])?$posted['feature'] : $item["feature"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['feature']) ? $errors['feature'] : ''; ?></span>
                </div>
                <input type="hidden" name='id' value="<?= $item["id"] ?>">
                <button class='sends1 sends' type="submit">送信</button>
            </form>
        </div>
        <div class="line"></div>
        <div class="main2">
            <h2>画像情報編集</h2>
            <img class='formimg' src="/public/upload/<?= $item["account_img"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="account_img" class="fileinput">プロフィール写真の変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="/public/upload/<?= $item["shop_img"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="shop_img" class="fileinput">　店舗メイン画像変更　
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="/public/upload/<?= $item["img1"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="img1" class="fileinput">店舗画像①（横長）変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="/public/upload/<?= $item["img2"] ?>" alt="">
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
            <p><a href="/src/view/admin/myprofile.php">店舗情報</a></p>
            <p><a href="/src/view/admin/drege.php">日記の登録</a></p>
            <p><a href="/src/view/admin/frege.php">花の登録</a></p>
            <p><a href="/src/view/admin/mapinfo.php">マップ情報</a></p>
        </div>
    </div>
    <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <div class="footer-glid">
        <footer>
            <h3>Copyright second-cube</h3>
        </footer>
        <!-- フッターナビ -->
        <?php include('../../common/component/footer.html') ?>
    </div>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->

    <!-- 以下はファイルアップロードの記述 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#attachment .fileinput').on('change', function() {
            var file = $(this).prop('files')[0];
            $(this).closest('#attachment').find('.filename').text(file.name);
        });
    </script>
</body>

</html>