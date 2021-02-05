<?php 
session_start();
include('../../common/favicon.html') 
?>
<title>マップ</title>
<style>html,body{height:100%;}body{padding:0;margin:0;}h1{padding:0;margin:0;font-size:50%;}</style>
<?php include('../../common/style.html') ?>


</head>
<body>

    <header style="max-height: 70px;">
        <ul>
          
        <?php include('../../common/header-nav-leftIcon.html') ?>

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



<!-- MAP[START] -->
<h1 style='height: 64px;'></h1>
<div id="myMap" style="width:100vw;height:100vh;"></div>
<!-- MAP[END] -->

<style>
    h1{
        color:rgb(0, 153, 255)
    }
</style>
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
    
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    
  
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AmJSmi0DfSGMPQNbHQ7GSRPBRvWKZHpsv13mLTVUyr-EEQpqyk2I-d4tHVYiGw88' async defer></script>
<script src="js/BmapQuery.js"></script>
<script>
    //init
    function GetMap() {
        //------------------------------------------------------------------------
        //1. Instance
        //------------------------------------------------------------------------
        const map = new Bmap("#myMap");
        //------------------------------------------------------------------------
        //2. Display Map
        //------------------------------------------------------------------------
    //     map.geolocation(function(data) {
    //     //location
    //     const lat = data.coords.latitude;
    //     const lon = data.coords.longitude;
    //     //Map
    //     map.startMap(lat, lon, "load", 11);
    //     //pin
    //     map.pin(lat,lon,":rgb(0, 153, 255)");
    //     // map.pin(36.4147612,139.3320506,"#ff0000");
    //     const options = [];
        
    //     let i =0
    //     console.log(i)
    //     <% items.forEach((item) => { %>
    //     options[i]={
    //         "lat":<%=item.lat%>,
    //         "lon":<%=item.lon%>,
    //         "title":"<%=item.title%>",
    //         "pinColor":"<%=item.pincolor%>",
    //         "height":220,
    //         "width":200,
    //         "description": '<a href="/shop/<%=item.sid%>"><%=item.description%><br><img src="<%=item.image%>" width="180"></a>',
    //         "show":false
    //     };
    //     i++
    //     <% }) %>


    //     map.infoboxLayers(options,true);

    // });

       
    }
</script>
</body>
</html>
