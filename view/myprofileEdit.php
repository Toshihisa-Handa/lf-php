<?php include('../common/favicon.php') ?>

    <title>店舗情報編集</title>
    <?php include('../common/style.php') ?>
    <link rel="stylesheet" href="../css/myprofileEdit.css">

</head>
 <body>
    <div class="grid-box">
        <header>
            <ul>
              
            <?php include('../common/header-nav-leftIcon.php') ?>

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
                            <img src="../images/account3.png" class='aimg' alt="" >  
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
        <h2>基本情報編集</h2>
        <form action='/myprofileUpdate/<%=item.id%>' method="post" class='editform1'>
            <!-- <div class='inframe'>
                <div>　　　　店舗名</div><input class='inputs' type="text" name="name" placeholder="例：花田商店" value='<%= item.name%>'><br>
            </div>

            <div class='inframe'>
            <div>　サブタイトル</div><input class='inputs' type="text" name="title" placeholder="例：お店のキャッチコピーなど" value='<%= item.title%>'><br>
            </div>

            <div class='inframe'>
                <div>　アカウント名</div><input class='inputs' type="text" name="account_name" placeholder="例：花田かすみ" value='<%= item.account_name%>'><br>
            </div>

            <div class='inframe'>
                <div>　ウェブサイト</div><input class='inputs' type="text" name="web" placeholder="例：https://xxxxx.com" value='<%= item.web%>'><br>
            </div>

            <div class='inframe'>
                <div>メールアドレス</div><input class='inputs' type="text" name="email" placeholder="例：hanadaxxxxx@gmail.com（半角英数字で入力して下さい）" value='<%= item.email%>'><br>
            </div>

            <div class='inframe'>
                <div>　　　電話番号</div><input type="text" class='inputs' name="tell" placeholder="「–」なし半角数字で入力して下さい" value='<%= item.tell%>'><br>
            </div>

            <h2>営業時間</h2>
            <div class='inframe'>
            <div>　　　オープン</div><input type="text" class='inputs' name="open" placeholder="10時" value='<%= item.open%>'><br>
            </div>

            <div class='inframe'>
                <div>　　　クローズ</div><input type="text" class='inputs' name="close" placeholder="18時" value='<%= item.close%>'><br>
            </div>

            <div class='inframe'>
                <div>　　　　定休日</div><input type="text" class='inputs' name="holiday" placeholder="水曜日" value='<%= item.holiday%>'><br>
            </div>

            <div class='inframe'>
                <div>　　　　　住所</div><input type="text" class='inputs' name="location" placeholder="〇〇県〇〇市〇〇町〜" value='<%= item.location%>'><br>
            </div>

            <div class='inframe'>
                <div>　　　　　地図</div><input type="text" class='inputs' name="map" placeholder="https://goo.gl/maps/xxxxxxxx" value='<%= item.map%>'><br>
            </div>

            <div class='inframe'>
                <div>　店舗タイトル</div><input type="text" class='inputs' name="message" placeholder="店舗からお客様への一言を記入" value='<%= item.message%>'><br>
            </div>

            <div class='inframe'>
                <div>　店舗コメント</div><textarea class='inputs' placeholder="店舗からお客様へのメッセージを記入" name="comment"><%= item.comment%></textarea><br>
            </div>

            <div class='inframe'>
                <div>　　　店舗特徴</div><input type="text"  class='inputs' name="feature" placeholder="店舗の特徴を一言で" value='<%= item.feature%>'><br>
           </div>
             -->
            <button class='sends1 sends' type="submit">送信</button>
        </form>

      </div>

      <div class="line"></div>
       <div class="main2">
        <h2>画像情報編集</h2>
        <!-- <img class='formimg' src="<%= item.account_img %>" alt="">
        <form class='editform' action="/myprofile_img" method="post" enctype="multipart/form-data">
          <div id='attachment'>
              <label>
                  <input type="file" name="account_img" class="fileinput">プロフィール写真の変更
                </label>
                <span class="filename">選択されていません</span>
            </div><br>
            <input class='sends' type="submit" value="送信">
        </form>
        <img class='formimg' src="<%= item.shop_img %>" alt="" >
        <form class='editform' action="/myprofile_img2" method="post" enctype="multipart/form-data">
            <div id='attachment'>
                <label>
                    <input type="file" name="shop_img" class="fileinput">　店舗メイン画像変更　
                  </label>
                  <span class="filename">選択されていません</span>
              </div><br>
              <input class='sends' type="submit" value="送信">
            </form>
        <img class='formimg' src="<%= item.img1 %>" alt="" >
        <form class='editform' action="/myprofile_img3" method="post" enctype="multipart/form-data">
            <div id='attachment'>
                <label>
                    <input type="file" name="img1" class="fileinput">店舗画像①（横長）変更
                  </label>
                  <span class="filename">選択されていません</span>
              </div><br>
              <input class='sends' type="submit" value="送信">
            </form>
        <img class='formimg' src="<%= item.img2 %>" alt="" >
        <form class='editform' action="/myprofile_img4" method="post" enctype="multipart/form-data">
            <div id='attachment'>
                <label>
                    <input type="file" name="img2" class="fileinput">店舗画像②（縦長）変更
                  </label>
                  <span class="filename">選択されていません</span>
              </div><br>
              <input class='sends' type="submit" value="送信">
            </form> -->
        
    
      </div>


    <div class="nav">
        <p><a href="/myprofile">店舗情報</a></p>
        <p><a href="/drege">日記の登録</a></p>
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