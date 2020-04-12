<?php 
    //require_once('util/valid_admin.php');
?>
<main>

    <?php include 'view/headeradmin.php'; ?>
    <h1>Vehicle Types</h1>
        <?php if ( sizeof($types) !=0) { ?>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($types as $type) : ?>
            <tr>
                <td><?php echo $type['type_code']; ?></td>
                <td><?php echo $type['VehicleType']; ?></td>
                <td>
                    <form action="admin.php" method="post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="type_code"
                            value="<?php echo $type['type_code']; ?>"/>
                        <input type="submit" value="DELETE"/>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php } else { ?>
            <p>There are no vehicle types in your database.</p>
        <?php } ?>
    <h2>Add Vehicle Type</h2>
    <form action="admin.php" method="post" id="add_type_form">
        <input type="hidden" name="action" value="add_type">

        <label>Name:</label>
        <input type="text" name="type_name" max="20" required>

        <label id="blanklabel">&nbsp;</label>
        <input id="add_type_button" type="submit" value="Add Type" class="button">
    </form>
    <?php include('view/adminlinks.php'); ?>
    <?php include('view/footer.php'); ?>
</main>
