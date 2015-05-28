
<table  style="color: #fff;text-align:center;margin: auto;">
<tr><td>Title</td><td>CreateTime</td><td>LongTime</td><td></td></tr>
<?php 

        echo '<tr>';
        echo '<td>'.$info['title'].'</td>';
        echo '<td>'.date('Y-m-d H:i:s',$info['create_time']).'</td>';
        echo '<td>'.date('Y-m-d H:i:s',intval($info['create_time'] + (86400 * $info['long_time']))).'</td>';
 
        echo '<tr>';
?>
</table>
<div style="margin-left:500px;">
<?php 

    echo '<p style="color:#fff;">'. $info['content'] . '</p>';
?>
</div>