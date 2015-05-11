
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>index.html</title>
<link href="styles.css" rel="stylesheet" type="text/css">

<script language="Javascript" type="text/javascript">
adImages = Array("images/banner.jpg","images/banner1.jpg","images/banner2.jpg")
thisAd = 0
imgCt = adImages.length
function rotate() {
if (document.images) {
thisAd++
if (thisAd == imgCt) {
thisAd = 0
}
document.adBanner.src=adImages[thisAd]
setTimeout("rotate()", 3 * 1000)
}
}
</script>

</head>

<body>

<h1>Townsville Community Music Centre</h1>

<nav class="navbar">
  <p>Home</p>
  <p>Events </p>
  <p>Bulletin Board</p>
  <p>Musicians</p>
  <p> About Us</p>
  <p class="login">Login:</p>
   <p id="username">Username <input type = "text" username = "Username"> </p>
   <p id="password">Password<input type = "text" password = "Password"></p>
    
</nav>
<br><br>

  <div id= section1>
  <p>Help us out by becoming a member, donating or volunteering </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id= section2>
  <p id="Buttons">Sign Up</p>
  <p id="Buttons">Donate</p>
  <p id="Buttons">Volunteer</p>
</div>
<div id= section3>
  <h2>Announcements</h2>
  <p>Announcement 1: (text)</p>
  <p>Announcement 2: (text)</p>
  <p>Announcement 3: (text)</p>
  <p>Announcement 4: (text)</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

<body onload="rotate()">
<center>
<img src="images/banner.jpg"/>
</center>

<footer> 
  <p>Contact Info</p>
  <p>&nbsp;</p>
</footer>
</body>
</html>
