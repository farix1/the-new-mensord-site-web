<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8;', 'root', '');
if(isset($_POST['login'])){
  if(!empty($_POST['username']) AND !empty($_POST['password'])){
    $username = htmlspecialchars($_POST['username']);
    $password = sha1($_POST['password']);

    $recupUser = $bdd->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $recupUser->execute(array($username, $password));

    if($recupUser->rowCount() > 0){
        $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['id'] = $recupUser->fetch()['id'];
      echo  "we are now ";
      header('Location: index.php');
      }else {
          echo "Your password or nickname is incorrect";
      }
  }else{ 
    echo "Please complete all fields ...";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mensord | Login</title>
    <link rel="stylesheet" href="css./styleee.css">
    <link rel="stylesheet" href="css./styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
  </head>
  <body>

  <nav class="Menu-nav">
        <ul>
            
            <li class="page">
                <a  href="index.php">
                    Home
                </a>
            </li>
            <li class="page">

                <a href="support.php">
                    Support
                </a>

            </li>
            
            

            <li class="page">
                <a href="https://discord.gg/cWj49zpckh" target="blanc">
                Discord</a>
            </li>
            
            <li class="page">
                <a href="register.php">
                Register</a>
            </li>
            
           
        </ul>
    </nav>

            <!-- login page -->
    <form class="box" action="" method="post">
    <h3 class="login">Login</h3>
    <input type="text" name="username" placeholder="username" autocomplete="off">
    <input type="password" name="password" placeholder="password" autocomplete="off">
    <input type="submit" name="login" value="login">

</form>



  
         <!--Start of Tawk.to Script-->
         <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6163fd9886aee40a5735f246/1fhn9d7af';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



</body>
</html>