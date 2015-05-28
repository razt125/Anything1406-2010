<table style="
    color: #fff;
    margin: auto;

">
<tr><td>Id</td><td>Title</td><td>Content</td></tr>
     <?php
    foreach ($result as $k=>$v)
    {
       echo '<tr>' ;
       echo '<td>' . ($k+1). '</td>';
       echo '<td>'. $result[$k]['title'] . '</td>';
       echo '<td>'. $result[$k]['content'] . '</td>';
       echo '</tr>';
       
    }
    ?>
</table>

