
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
                    <input type="text"  name="title" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                   Long Time (day): 
                </td>
                <td>
                    <input type="text"  name="long_time" value=""/>
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
                   Content: 
                </td>
                <td>
                    <textarea rows="" cols="" name='content'></textarea>
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

