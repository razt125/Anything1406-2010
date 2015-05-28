
<div style="
    margin-left: 40%;
    color: #fff;
">
    <form action="edit.php" method="get" style="text-align:center;width: 100%;">
        <table>
        <tr>
                <td>
                   Password: 
                </td>
                <td>
                    <input type="password"  name="password" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                   Address: 
                </td>
                <td>
                    <input type="text"  name="address" value="<?php echo $userinfo['address'];?>"/>
                </td>
            </tr>
            
            <tr>
                <td>
                   First Name: 
                </td>
                <td>
                    <input type="text"  name="first" value="<?php echo $userinfo['first'];?>"/>
                </td>
            </tr>
            
            <tr>
                <td>
                   Last Name: 
                </td>
                <td>
                    <input type="text"  name="last" value="<?php echo $userinfo['last'];?>"/>
                </td>
            </tr>
            <tr>
                <td>
                   Home Phone Number: 
                </td>
                <td>
                    <input type="text"  name="homephone" value="<?php echo $userinfo['homephone'];?>"/>
                </td>
            </tr>
            <tr>
                <td>
                   Mobile Phone Number: 
                </td>
                <td>
                    <input type="text"  name="mobilephone" value="<?php echo $userinfo['mobilephone'];?>"/>
                </td>
            </tr>
        </table>
        <div style="
    text-align: left;
    margin: 20px 0px 0 120px;
        ">
        <input type="submit" value="submit" >
        <input type="hidden" value='profile' name="method">
        <input type="hidden" value='<?php echo $_SESSION['id']?>' name="id">
        </div>
             
    </form>
</div>

