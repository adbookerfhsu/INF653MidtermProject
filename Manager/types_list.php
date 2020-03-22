<?php include './view/header.php'; ?>
<main>

    <h1>Vehicle Types</h1>
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
                    <input type="hidden" name="action" value="delete_type" />
                    <input type="hidden" name="type_code"
                           value="<?php echo $type['type_code']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Type</h2>
    <form id="add_type_form"
          action="admin.php" method="post">
        <input type="hidden" name="action" value="add_type" />

        <label>Name:</label>
        <input type="text" name="VehicleType" />
        <input type="submit" value="Add"/>
    </form>

    <p><a href="admin.php?action=sort_by_price">List Vehicles</a></p>

</main>
<?php include './view/footer.php'; ?>