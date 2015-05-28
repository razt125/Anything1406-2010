

<div id="pagecontent">
<div id="menu" style="
    float: left;
">
<h2>Welcome <?php echo $_SESSION['username'];?></h2>
<p><a href="edit.php?method=profile">Edit Profile</a></p>
<?php if($_SESSION['level'] >1 ){?>
<p><a href="bulletin.php?method=list">Edit Bulletins</a></p>
<p><a href="events.php?method=list">Edit Events</a></p>
<p><a href="musicians.php?method=list">Edit Musicians</a></p>
<?php }?>
<?php if ($_SESSION['level'] == 3){?>
<p><a href="user.php?method=list">Edit Members</a></p>
<p><a href="list.php?method=list">Edit Class</a></p>
<?php }?>
<p><a href='user.php?method=logout'>Log Out</a></p>
</div>

<?php if ($_SESSION['level'] == 1){?>
<div id= section3 style="
    width: 600px;
    text-align: left    ;

">

<br>
<br>
<a>You can support the Music Centre by becoming a Member and derive some benefits for yourself at the same time. Your subscription helps to keep us operating and we provide substantial discounts whenever possible.<br> 
<br>
For the Music Centre's own events, Members' ticket discounts can be as high as 50%!<br>

The Music Centre is also registered as a Deductible Gift Recipient. Any extra donations are tax-deductible!</a><br><br>
<div style="
    text-align: center;
">
<a>To become a Member, or to update an existing Membership -
<br>
<a style="text-align: center;" href="views/style/Membership_applic_form_2015.doc">Download the Application Form</a><br>
Complete and return the form with cheque to -<br>

Townsville Community Music Centre<br>
PO Box 1006, Townsville, Qld 4810<br>
<br>
or email -<br>
<a href="mailto:test@test.com" >admin@townsvillemusic.org.au</a><br>
</a>
</div>
<?php }else{?>
<div id= section3 style="
    width: 600px;
    margin:auto   ;

">

<br>
<br>
<div style="
    margin-top: 100px;
">
<a>Based in Townsville, North Qld, the Music Centre presents concerts and workshops throughout the year, in a diverse range of genres including classical, jazz, folk, blues, world and contemporary music, featuring touring artists and locally-based professional and emerging artists.</a>
</div>
<?php }?>
</div>
</div>
