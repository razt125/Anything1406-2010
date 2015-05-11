<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>index.html</title>
<script type="text/javascript">
adImages = Array("TCMC Images Docs/events/ACVCnewlogo.gif","TCMC Images Docs/events/Allegro600.png","TCMC Images Docs/events/Allegro600BB.png")
thisAd = 0
imgCt = adImages.length
function rotate() {
if (document.images) {
thisAd++
if (thisAd == imgCt) {
thisAd = 0
}
document.adBanner.src=adImages[thisAd]
setTimeout("rotate()", 1 * 1000)
}
}
</script>

<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body onload="rotate()">

<h1>Townsville Community Music Centre</h1>

<nav class="navbar">
  <p>Home</p>
  <p>Events </p>
  <p>Bulletin Board</p>
  <p>Musicians</p>
  <p> About Us</p>
</nav>
<br><br>
<div id="sectionsbox">
<br>
<div id="section4">
  <p>Help us out by becoming a member, donating or volunteering </p>
 </div>
    <div id= section1>
    

<center>
<img name="adBanner" src="TCMC Images Docs/events/ACVCnewlogo.gif"/>
</center>

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
</div>
<footer> 
  <p>Contact Info</p>
  <p>&nbsp;</p>
</footer>
</body>
</html>
