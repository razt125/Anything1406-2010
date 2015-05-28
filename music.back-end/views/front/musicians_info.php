
<div id="pagecontent">
<div id="musicianimage">
<img src="<?php echo $info['img'];?>" alt="width:400px;height:200px" style="width:300px;height:200px"></div>

<div id="musicianbio">
<h2><?php echo $info['title'];?></h2>
 <p>
<?php echo $info['content'];?>
 </div>
<div id="musicianbrief">
  <h3><?php echo $info['title'];?></h3>
  <p>Members:<br><?php echo $info['remake'];?></p>
  <?php if (!empty($info['facebook'])){?>
  <p>facebook: <?php echo $info['facebook'];?></p>
  <?php }?>  
  <?php if (!empty($info['email'])){?>
  <p>Email: <?php echo $info['email'];?></p>
  <?php }?>
</div>

</div>