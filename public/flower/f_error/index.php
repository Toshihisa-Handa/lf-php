<?php
session_start();
include('../../common/metas.html')
?>
<title>決済エラー</title>
<link rel="stylesheet" href="/css/stripe.css">
</head>

<body>
  <section>
    <p>
      決済が失敗しました。
      <br>
      下記リンクからトップページへ戻れます。
    </p>
    <p><a href="/">戻る</a></p>
  </section>
</body>

</html>