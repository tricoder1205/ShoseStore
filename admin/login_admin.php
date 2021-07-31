<?php
    require_once 'conf/db.php';
    if(isset($_POST['txtUsername'])){   
        $sql = "SELECT * from nhanvien where username ='".$_POST['txtUsername']."' ";
        $result = mysqli_query($connect, $sql);
        $row =mysqli_fetch_assoc($result);
        //echo $row['PassWord'];
        $pass = md5($_POST['txtPassword']);
        // $pass = $_POST['txtPassword'];
        if(isset($row)){
          if($pass == $row['passwd'] ){
            session_start();
            $_SESSION['IDQT']= $row['MSNV'];
            $_SESSION['FullNameNV'] = $row['HoTenNV'];
            $_SESSION['UserNameNV'] = $row['username'];
            header('location: dashboard.php');
          }else{
            echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không chính xác !');</script>";
          }}
          else{
            echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không chính xác !');</script>";
    }
    mysqli_close($connect);
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">  
  <link rel="stylesheet" href="css/admin.css">
  <style>
 
/* layout/base.css */

* {
  -webkit-box-sizing: inherit;
          box-sizing: inherit;
}

html {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  font-size: 100%;
  height: 100%;
}

body {
  background: linear-gradient(to bottom right , #005aff, #e68c2f);  
  color: #606468;
  font-family: 'Open Sans', sans-serif;
  font-size: 14px;
  font-size: 0.875rem;
  font-weight: 400;
  height: 100%;
  line-height: 1.5;
  margin: 0;
  min-height: 100vh;
}
  </style>
</head>
<body class="align">
    <div class="grid">
        <form action="" method="POST" class="form login">  
          <h1>ĐĂNG NHẬP</h1>      
            <div class="form__field">
                <label for="login__username">
                <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                </svg>
                <span class="hidden">User name</span></label>
                <input id="login__username" type="text" name="txtUsername" class="form__input" placeholder="User Name" required>
            </div>            
            <div class="form__field">
                <label for="login__password">
                <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use>
                </svg>
                <span class="hidden">Password</span></label>
                <input id="login__password" type="password" name="txtPassword" class="form__input" placeholder="Password" required>
            </div>            
            <div class="form__field">
                <input type="submit" value="Sign In">
            </div>        
        </form>    
	</div>
  <svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>
</body>
</html>
