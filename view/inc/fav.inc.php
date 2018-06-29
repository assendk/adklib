<?php
?>
<h2>Account list</h2>

    <?php

    include "../controller/g.php";
    foreach ($result_accounts as $row) {
        ?>
        <tr class="">
            <td><?php echo $row['account_name']; ?></td>
            <td class="text-right"><?php echo $row['ammount']; ?>&euro;</td>
            <td><?php echo $row['account_desc']; ?></td>
            <td><a href="#" class="btn btn-danger btn-xs" onclick="delete_account(<?php echo $row['account_id']; ?>)">Delete</a></td>
            <td><a data-toggle="modal" data-target="#modal-default" href="#" class="btn btn-success btn-xs" onclick="ajaxRow('modala', '<?= $row['account_id']; ?>')">Modify</a></td>
        </tr>
        <?php
    }
    ?>