<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
   
</head>
<body>



<div class="flowers-glid">
    <header>
        <ul>
        <li><a href="top.php">Home</a></li>
            <li><a href="shops.php">Shop</a></li>
            <li><a href="diarys.php">Diary</a></li>
            <li><a href="flowers.php">Flower</a></li>
           
               <!-- <% if (typeof user == 'undefined') { %>
                <li><a href="/register">Sign Up</a></li>
                <% } else{%>
                <li><a href="/mypage">mypage</a></li>
                <li><a href="/logout">Logout</a></li>
                <% } %> -->
        </ul>
     </header>
     <div class="img1">

    </div>
     <div class="title1">
       <h1>Login Page</h1>
     </div>
     
</div>

 

 


<div class="login-list">

 <div class="loginimg">

 </div>


    <div class="loginList">
       
  
      <div class='login-card'>
        <form action="/login" method="post">
            <span class="label">E-mail</span><input class='linput' type="email" name="email" class="input" required><br>
            <br>
            <span class="label">Password</span><input class='linput' type="password" name="password" class="input" required><br>
            <br>
            <button class="lbutton" type="submit" class="submit">login</button>
        </form>
        <!-- <% if (typeof noUser !== 'undefined') { %>
          <p class="error"><%= noUser %></p>
      <% } %> -->
      <div class="rlink">
        <a href="register.php"><span class='underbar'>&nbsp;&nbsp;新規御登録の方はこちらへ</span></a>
      </div>
    </div>
  </div>
</div>


<footer>
    <h3>Copyright  second-cube</h3>
</footer>
</body>
</html>