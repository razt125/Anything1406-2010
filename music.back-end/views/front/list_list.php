
<div id="pagecontent">
 <p><a  href="list.php?method=add">add</a></p>
<?php 
if (!empty($list)){
    ?><div id="event1">
    <?php foreach ($list as $k=>$v)
    {
        ?>

 <p><a   href="list.php?method=info&id=<?php echo $v['id'];?>"><?php echo $v['title'];?></a></p></a>


        <?php }?>
        </div>
     <?php    }?>
</div>