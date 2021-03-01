<?php
session_start();
include('common/favicon.html')
?>
<title>ログインエラー</title>
<link rel="stylesheet" href="/public/css/stripe.css">
</head>

<body>
  <section>
    <p>
      ログインしていません
      <br>
      下記リンクからログインページへ戻れます。
    </p>
    <p><a href="/login.php">戻る</a></p>
  </section>
</body>

</html>