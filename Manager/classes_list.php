<?php include './view/header.php'; ?>
<main>

    <h1>Vehicle Class</h1>
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($classes as $class) : ?>
        <tr>
            <td><?php echo $class['class_code']; ?></td>
            <td><?php echo $class['VehicleClass']; ?></td>
            <td>
                <form action="admin.php" method="post">
                    <input type="hidden" name="action" value="delete_class" />
                    <input type="hidden" name="class_code"
                           value="<?php echo $class['class_code']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Class</h2>
    <form id="add_class_form"
          action="admin.php" method="post">
        <input type="hidden" name="action" value="add_class" />

        <label>Class Name:</label>
        <input type="text" name="VehicleClass" />
        <input type="submit" value="Add"/>
    </form>

    <p><a href="admin.php?action=sort_by_price">List Vehicles</a></p>

</main>
<?php include './view/footer.php'; ?>