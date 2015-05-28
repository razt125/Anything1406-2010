
<div style="
    margin-left: 40%;
    color: #fff;
">
    <form action="musicians.php" method="post" style="text-align:center;width: 100%;" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                   Title: 
                </td>
                <td>
                    <input type="text"  name="title" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                   Content: 
                </td>
                <td>
                    <input type="text"  name="content" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                   Image: 
                </td>
                <td>
                    <input type="file" name="img" id="file"  accept="image/gif, image/jpeg,image/png"/> 
                </td>
            </tr>
            <tr>
                <td>
                   facebook: 
                </td>
                <td>
                    <select name='facebook'>
                        <option value='Type 1'>Type 1</option>
                        <option value='Type 2'>Type 2</option>
                        <option value='Type 3'>Type 3</option>
                    </select>
                </td>
            </tr>
            <tr>
            <td>
            Type:
            </td>
                
                <td>
                 <select name='type'>
                 <?php foreach ($list as $v){?>
                        <option value='<?php echo $v['title'];?>'><?php echo $v['title'];?></option>
                          
                          
                <?php }?>
                    </select>
                  
                </td>
            </tr>
            <tr>
                <td>
                   Email: 
                </td>
                <td>
                    <input type="text"  name="email" value=""/>
                </td>
            </tr>
            
            <tr>
                <td>
                   Members: 
                </td>
                <td>
                    <input type="text"  name="remake" value=""/>
                </td>
            </tr>
                    <input type="hidden"  name="status" value="1"/>
               
        </table>
        <div style="
    text-align: left;
    margin: 20px 0px 0 120px;
        ">
        <input type="submit" value="submit" >
        <input type="hidden" value='add' name='method'>
        </div>
             
    </form>
</div>

