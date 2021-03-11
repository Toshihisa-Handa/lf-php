<?php
session_start();
include('../../funcs.php');

//DB接続
$pdo = dbcon();


$uid = $_SESSION['uid'];
include('../../common/header-icon.php');

$sql = "SELECT map.lat,map.lon,map.maptitle,map.pincolor,map.description,shop.id,shop.shop_img 
        FROM map JOIN shop on map.user_id = shop.user_id";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$items = $stmt->fetchAll();

?>


<?php include('../../common/metas.html') ?>
<title>マップ</title>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        padding: 0;
        margin: 0;
    }

    h1 {
        padding: 0;
        margin: 0;
        font-size: 50%;
    }
</style>
<?php include('../../common/style.html') ?>
</head>

<body>
    <header style="max-height: 70px;">
        <ul>
            <?php include('../../common/header-nav-leftIcon.html') ?>
            <div class='nav-right'>
                <?php include('../../common/header-nav-rightIcon.php') ?>
            </div>
        </ul>
    </header>
    <!-- MAP[START] -->
    <h1 style='height: 64px;'></h1>
    <div id="myMap" style="width:100vw;height:100vh;"></div>
    <!-- MAP[END] -->
    <style>
        h1 {
            color: rgb(0, 153, 255)
        }
    </style>
    <!-- フッターナビ -->
    <?php include('../../common/footer.html') ?>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AmJSmi0DfSGMPQNbHQ7GSRPBRvWKZHpsv13mLTVUyr-EEQpqyk2I-d4tHVYiGw88' async defer></script>
    <script src="/map/BmapQuery.js"></script>
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
            map.geolocation(function(data) {
                //location
                const lat = data.coords.latitude;
                const lon = data.coords.longitude;
                //Map
                map.startMap(lat, lon, "load", 11);
                //pin
                map.pin(lat, lon, ":rgb(0, 153, 255)");
                // map.pin(36.4147612,139.3320506,"#ff0000");
                const options = [];

                let i = 0
                console.log(i)
                <?php foreach ($items as $item) : ?>
                    options[i] = {
                        "lat": <?= $item['lat'] ?>,
                        "lon": <?= $item['lon'] ?>,
                        "title": "<?= $item['maptitle'] ?>",
                        "pinColor": "<?= $item['pincolor'] ?>",
                        "height": 220,
                        "width": 200,
                        "description": '<a href="/shop/? id=<?= $item['id'] ?>"><?= $item['description'] ?><br><img src="/upload/<?= $item['shop_img'] ?>" width="180"></a>',
                        "show": false
                    };
                    i++
                <?php endforeach; ?>
                map.infoboxLayers(options, true);
            });
        }
    </script>
</body>

</html>