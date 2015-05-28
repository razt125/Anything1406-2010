

<div id="pagecontent">
<?php
foreach ($list as $k => $v) {
    ?>
        <?php if ($k == 0 ) {?>
<div id="featured">
		<a href="http://<?php echo $v['link']?>"><img
			src="<?php echo $v['img'];?>" alt="Main Event"
			style="width: 600px; height: 300px"></a>
		<p><?php echo $v['title'];?></p>
	</div>
<?php }else{?>
<div id="event1">
		<a href="http://<?php echo $v['link']?>"><img
			src="<?php echo $v['img'];?>" alt="event1"
			style="width: 300px; height: 200px; text-shadow: 0px 0px #F41D20;"> </a>
		<p><?php echo $v['title'];?></p>
	</div>
	
<?php }
        }?>
</div>