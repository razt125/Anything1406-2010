
<div style="
    margin-left: 40%;
    color: #fff;
">
    <form action="bulletin.php" method="post" style="text-align:center;width: 100%;" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                   Title: 
                </td>
                <td>
                    <input type="text"  name="title" value="<?php echo $info['title']?>"/>
                </td>
            </tr>
            <tr>
                <td>
                   Long Time (day): 
                </td>
                <td>
                    <input type="text"  name="long_time" value="<?php echo intval(($info['long_time']-time()) / 86400);?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Image:
                </td>
                <td>
                    <input type="file" name="img" id="file"   accept="image/gif, image/jpeg,image/png" value="<?php echo $info['img'];?>"/> 
                </td>
            </tr>
            <tr>
                <td>
                   Status: 
                </td>
                <td>
                    Disable:<input type="radio" name="status" value="0" <?php echo $info['status'] == 0 ?'checked':'';?>/>
                    Normal:<input type="radio" name="status" value="1" <?php echo $info['status'] == 1 ?'checked':'';?>/>
                </td>
            </tr>
            <tr>
                <td>
                   Content: 
                </td>
                <td>
                    <textarea rows="" cols="" name="content" ><?php echo $info['content']?></textarea>
                </td>
            </tr>
        </table>
        <div style="
    text-align: left;
    margin: 20px 0px 0 120px;
        ">
        <input type="submit" value="submit" >
        <input type="hidden" value="edit" name="method">
        <input type="hidden" value='<?php echo $_SESSION['id'];?>' name='uid'>
        <input type="hidden" value="<?php echo $info['id'];?>" name='id'>
        </div>
             
    </form>
</div>

