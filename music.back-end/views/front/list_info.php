
<div style="
    margin-left: 40%;
    color: #fff;
">
    <form action="list.php" method="post" style="text-align:center;width: 100%;" >
        <table>
        <?php foreach ($info as $k=>$v){
            
                if (is_numeric($k) || in_array($k, array('uid','create_time','id','uname'))){
                    continue;
                }
            ?>
            <tr>
                <td>
                   <?php echo $k;?>: 
                </td>
                <td>
                    <?php if ($k == 'status'){?>
                    Disable:<input type="radio" name="<?php echo $k;?>" value="0" <?php echo $v == 0 ?'checked':'';?>/>
                    Normal:<input type="radio" name="<?php echo $k;?>" value="1" <?php echo $v == 1 ?'checked':'';?>/>                  
                    <?php }elseif($k == 'img'){?>
                    <input type="file" name="img" id="file"  accept="image/gif, image/jpeg,image/png"/ value="<?php echo $v;?>"> 
                    <?php }elseif($k == 'long_time'){?>
                    <input type="text" name='long_time' value='<?php echo intval(($info['long_time']-time()) / 86400);?>'>
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
        <input type="hidden" value="<?php echo $id;?>" name='id'>
        <input type="hidden" value='edit' name="method">
        </div>
             
    </form>
</div>

