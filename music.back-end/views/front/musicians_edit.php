
<div style="
    margin-left: 40%;
    color: #fff;
">
    <form action="musicians.php" method="post" style="text-align:center;width: 100%;" enctype="multipart/form-data">
        <table>
        <?php foreach ($info as $k=>$v){
                if (is_numeric($k) || in_array($k, array('uid','create_time','id'))){
                    continue;
                }
            ?>
            <tr>
                <td>
                   <?php echo $k != 'remake'?$k:'Members';?>: 
                </td>
                <td>
                    <?php if ($k == 'status'){?>
                    Disable:<input type="radio" name="<?php echo $k;?>" value="0" <?php echo $v == 0 ?'checked':'';?>/>
                    Normal:<input type="radio" name="<?php echo $k;?>" value="1" <?php echo $v == 1 ?'checked':'';?>/>
                    <?php }elseif($k == 'img'){?>
                    <input type="file" name="img" id="file"  accept="image/gif, image/jpeg,image/png"/ value="<?php echo $v;?>"> 
                    <?php }elseif($k == 'long_time'){?>
                    <input type="text" name='long_time' value='<?php echo intval(($info['long_time']-time()) / 86400);?>'>
                    <?php }elseif($k == 'facebook'){?>
                    <select name='facebook'>
                        <option value='Type 1' <?php echo $v=='Type 1'?'selected':''?>>Type 1</option>
                        <option value='Type 2' <?php echo $v=='Type 2'?'selected':''?>>Type 2</option>
                        <option value='Type 3' <?php echo $v=='Type 3'?'selected':''?>>Type 3</option>
                    </select>
                    <?php }elseif($k == 'type'){?>
                        <select name='type'>
                    <?php foreach ($list as $type){?>
                           <option value='<?php echo $type['title'];?>' <?php  echo $v == $type['title']?'selected':'';?>><?php echo $type['title'];?></option>
                      
                    <?php }?>
                      </select>
                    <?php }else{?>
                    <input type="text"  name="<?php echo $k;?>" value="<?php echo $v;?>"/>
                    <?php }?>
                </td>
            </tr>
            <?php }?>
        </table>
        <div style="
    text-align: left;
    margin: 20px 0px 0 120px;
        ">
        <input type="submit" value="submit" >
        <input type="hidden" value="<?php echo $_GET['id'];?>" name='id'>
        <input type="hidden" value='edit' name="method">
        </div>
             
    </form>
</div>

