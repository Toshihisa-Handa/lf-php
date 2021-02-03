<?php include('favicon.php') ?>

    <title>日記一覧</title>
    <?php include('../common/style.php') ?>
    <link rel="stylesheet" href="../css/diarys.css">

</head>
<body>



<div class="diarys-glid">
    <header>
        <ul>
          
        <?php include('../common/header-nav-leftIcon.php') ?>

          <div class='nav-right'>
            <li class='searchNav'>
                <form action="/d_search" method='get'>
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
        <img src="../images/diaryimg2.png" alt="">
    </div>
     <div class="title1">
       <h1 class='topTitle'>Diary List</h1>
     </div>
     
</div>

 

 


<div class="diary-list">
    <div class="diaryList">
       
    <!-- <div class="diary-container">
        <% items.forEach((item) => { %>
            <div class="dcard">
            <div class='diary-card'>
                <a href="/diary/<%=item.id%>">
                    <img src="<%= item.image %>" alt="" >
                    <h3><%= item.title%></h3>               
                    <p class='dtext'><%= item.text%></p>
                </a>
           </div>
           <div class="dname"><%= item.shopname %></div>
        </div>
        <% }) %>
    </div> -->
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