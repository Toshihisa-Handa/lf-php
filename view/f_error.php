<?php
session_start();
include('common/favicon.html')
?>
<title>決済エラー</title>
<link rel="stylesheet" href="/public/css/stripe.css">
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