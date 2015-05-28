
<div id="pagecontent">
 <p><a  href="musicians.php?method=add">add</a></p>
<?php 
if (!empty($list)){

    foreach ($list as $k=>$v)
    {
        ?>
        <?php if ($k%2 != 0) {?>
<div id="event1"><p><?php echo $v['title'];?></p>
<a href="musicians.php?method=edit&id=<?php echo $v['id'];?>"><img src="<?php echo $v['img'];?>" alt="event1" style="width: 300px; height: 200px; text-shadow: 0px 0px #F41D20;">
 <p><a href="musicians.php?method=edit&id=<?php echo $v['id'];?>">edit</a></p></a>
</div>
<?php }else{?>
<div id="event1"><p><?php echo $v['title'];?></p><a href="musicians.php?method=edit&id=<?php echo $v['id'];?>"><img src="<?php echo $v['img']?>" alt="event2" style="width:300px;height:200px"><p><a href="musicians.php?method=edit&id=<?php echo $v['id'];?>" >edit</a></p></a></div>
<?php
        }
        }?>'
        <?php }else{?>
                       
                        <?php }?>
        
</div>