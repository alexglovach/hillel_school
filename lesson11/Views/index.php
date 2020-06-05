<?php echo $error?>

<html>
    <body>
        <form name="create" method="post" action="index.php">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="type" placeholder="type">
            <input type="text" name="damage" placeholder="damage">
            <input type="text" name="reload_time" placeholder="recharge">
            <select name="status">
                <option value="1" selected>Active</option>
                <option value="0">Deactive</option>
            </select>
            <input type="submit" name="create" value="Create new weapon">
         </form>
        <hr><br>
        <table border="1">
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Type
                </th>
                <th>
                    Damage
                </th>
                <th>
                    Recharge
                </th>
                <th>
                    status
                </th>
                <th colspan="2">
                    Actions
                </th>
            </tr>
            <? foreach ($objects as $weapon){?>
                <tr>
                    <form action="index.php" method="POST">
                    <td>
                        <input size="10" type="text" name="name" value="<?=$weapon['name']?>">
                    </td>
                    <td>
                        <input size="10" type="text" name="type" value="<?=$weapon['type']?>">
                    </td>
                    <td>
                        <input size="2" type="text" name="damage" value="<?=$weapon['damage']?>">
                    </td>
                    <td>
                        <input size="2" type="text" name="reload_time" value="<?=$weapon['reload_time']?>">
                    </td>
                    <td>
                        <select name="status">
                            <option value="1" <?php echo ($weapon['status'] == 1?"selected":"")?>>Active</option>
                            <option value="0" <?php echo ($weapon['status'] == 0?"selected":"")?>>Deactive</option>
                        </select>
                    </td>
                    <td>
                        <input type="hidden" name="id" value="<?=$weapon['id'] ?>">
                        <input type="submit" name="update" value="Edit">
                    </td>
                    <td>
                        <input type="submit" name="delete" value="Delete">
                    </td>
                    </form>
                </tr>
            <?}?>
        </table>
    </body>
</html>
