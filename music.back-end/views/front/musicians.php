
<div id="pagecontent">
<br>
<div style="text-align: right;">
Type:
<select name=type onchange=getUrl(this)>
    <option value='all'>all</option>
<?php foreach($listList as $value){?>
    <option value="<?php echo $value['title'];?>" <?php echo $value['title'] == $type?'selected':'';?>><?php echo $value['title'];?></option>
<?php }?>
</select>
</div>
    <?php 
        foreach ( $list as $k=>$v ){
    ?>
<div id="featured"><a href="musicians.php?method=info&id=<?php echo $v['id'];?>"><img src="<?php echo $v['img'];?>" alt="event2" style="width:600px;height:300px" ></a><p><?php echo $v['title'];?></p></div>
    <?php 
        }
    ?>

</div>

<script type="text/javascript">
    function getUrl ( type )
    {
        window.location.href='musicians.php?type='+type.value;
    }
</script>