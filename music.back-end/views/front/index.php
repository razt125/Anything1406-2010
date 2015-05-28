
<div id="pagecontent">
<br>
<div id="section1">
<p>Help us out by becoming a member, donating or volunteering </p>
</div>
<div id= section2>
<?php if (empty($_SESSION)){?>
<p id="Button1"><a href="user.php?method=reg">Sign Up</a></p>
<?php }?>
<p id="Button2">Donate</p>
<p id="Button3">Volunteer</p>
</div>
<div id= section3>
<a href="bulletin.php"><h2>Announcements</h2></a>
<?php 
    foreach ($list as $k=>$v)
    {
        echo '<p>Announcement '.($k+1).': </p>';
        echo '<p>'.$v['title'].'<a href="bulletin.php?id='.$v['id'].'"> (read more)</a></p>';
    }

?>
</div>
<div id= section4>
<center>
<a href="events.php">
<img name="adBanner" src="views/style/images/rotatingBanner/image2.jpg"/>
</a>
</center>
</div>
</div>
