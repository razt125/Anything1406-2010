
<div id="pagecontent">
<?php 

    foreach ($list as $k=>$v)
    {
    ?>
<div id="bulletin"><img src="<?php echo $v['img'];?>" alt="width:300px;height:150px"  style="width:300px;height:200px">
<p><?php echo date('Y-m-d H:i:s',$v['create_time']);?><br>

<?php echo $v['uname'];?><br>
<?php echo $v['title'];?><br><br>
<?php echo $v['content'];?>
<br><br>
Visit us on Facebook
<a>Email Cassandra Fixter</a>
</div>
<?php }?>
</div>