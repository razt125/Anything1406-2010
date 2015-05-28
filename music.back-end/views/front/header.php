
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>index.html</title>
<link href="<?php echo CSS_PATH;?>/styles.css" rel="stylesheet" type="text/css">
<script src="<?php echo JS_PATH;?>/script.js"></script>
</head>
<body>

<header style="
    height: auto;
">
  <div class="logo"><img src="<?php echo IMAGES_PATH;?>/logo/logo.jpg" alt="Logo" style="width:150px;height:100px"></div>
<h1>Townsville Community Music Centre</h1>
<?php 
    if (isset($_SESSION['username'])){
?><a href="center.php">welcome:<?php  echo $_SESSION['username'];?></a>
<span style=" margin-left: 700px;"><a href="user.php?method=logout">Logout</a></span>

    <?php     
    }
    else 
    {
?>
<div style="
    margin-left: 140px;
">
<form action="user.php" method="get">
  Username:
  <input type="text" name="username">
  Password:
  <input type="password" name='password'>
  <input type="submit" value="Sign in"/>
  <input type="hidden" name='method' value='login'/>
</form>
<div style="
    margin-top: 20px;
">
<span style=" margin-left: 500px;"><a href="user.php?method=reg">No account? sign up here!</a></span></div>
</div>
<?php 
    }
?>
</header>

<nav class="navbar">
<a href="index.php"><p>Home</p></a>
<a href="events.php"><p>Events</p></a>
<a href="bulletin.php"><p>Bulletin Board</p></a>
<a href="musicians.php"><p>Musicians</p></a>
<a href="about.php"><p id="activepage">About Us</p></a>
<a href="instrument.php"><p id="activepage">Instrument</p></a>
</nav>
<br><br>