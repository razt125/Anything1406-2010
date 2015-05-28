
<div style="
    margin-left: 40%;
    color: #fff;
">
    <form action="events.php" method="post" style="text-align:center;width: 100%;" enctype="multipart/form-data">
        <table>
        
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <input type="text" name='title'>
                </td>
            </tr>
             <tr>
                <td>
                    Longtime:
                </td>
                <td>
                    <input type="text" name='long_time'>
                </td>
            </tr>
             <tr>
                <td>
                    images:
                </td>
                <td>
                    <input type="file" name="img" id="file"  accept="image/gif, image/jpeg,image/png"/> 
                </td>
            </tr>      
             <tr>
                <td>
                    Link:
                </td>
                <td>
                    <input type="text" name='link'>
                </td>
            </tr>       
        </table>
        <div style="
    text-align: left;
    margin: 20px 0px 0 120px;
        ">
        <input type="submit" value="submit" >
        <input type="hidden" value="<?php echo $_SESSION['id'];?>" name='uid'>
        <input type="hidden" value='add' name="method">
        </div>
             
    </form>
</div>

