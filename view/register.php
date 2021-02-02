<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/register.css">
 
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
                <li><a href="/login">Login</a></li>
                <% } else{%>
                <li><a href="/mypage">mypage</a></li>
                <li><a href="/logout">Logout</a></li>
                <% } %> -->
        </ul>
     </header>
     <div class="img1">

    </div>
     <div class="title1">
       <h1>SignUp Page</h1>
     </div>
     
</div>

 

 


<div class="login-list">

 <div class="loginimg">

 </div>


    <div class="loginList">
       
  
      <div class='login-card'>
        <form action="/register" method="post" class="board-form">
            <span class="label ">User Name</span><input type="text" name="name" class="input linput" required><br>
            <br>
            <span class="label">E-mail</span><input type="email" name="email" class="input linput" required><br>
            <br>
            <span class="label">Password</span><input type="password" name="password" class="input linput" required><br>
            <br>
            <button type="submit" class="submit lbutton">SignUp</button>
        </form>
        <!-- <% if (typeof emailExists !=='undefined'){ %>
            <p><%= emailExists%></p>
        <% } %> -->
      <div class="rlink"> 
        <a href="login.php"><span class='underbar'>&nbsp;&nbsp;ログインの方はこちらへ</span></a>
      </div>
    </div>
  </div>
</div>




<footer>
    <h3>Copyright  second-cube</h3>
</footer>
</body>
</html>