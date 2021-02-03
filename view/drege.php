<?php include('favicon.php') ?>

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
        <form action="/d_insert" method="POST" enctype="multipart/form-data">
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
        <!-- <% items.forEach((item) => { %>
          
            <div class="dcard">
            <div class='diary-card'>
                <a href="/diary/<%=item.id%>">
                    <img src="<%= item.image %>" alt="" >
                    <h3><%= item.title%></h3>               
                    <p class='dtext'><%= item.text%></p>
                </a>
                <div class="option">
                    <div class="update"><a href="/diaryEdit/<%=item.id%>">編集</a></div>
                    <div class="delete"><a href="/diaryDelete/<%=item.id%>">削除</a></div>
                </div>
                
           </div>
        </div>
        <% }) %> -->
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