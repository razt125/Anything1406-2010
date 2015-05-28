

<div id="pagecontent">
<?php 

 foreach ($userAll as $k=>$v)
        {
        ?>
        
<div id="event1"><a href="edit.php?method=user&account=<?php echo $v['email'];?>">
  <p><?php echo $v['email'];?></p></a>
</div>
<?php
        }?>
</div>