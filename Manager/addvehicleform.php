<?php include ('./view/header.php'); ?>
    <main>
        <h1>Add Vehicle</h1>
        <form action="admin.php" method="post" id="add_vehicle_form">
        <input type="hidden" name="action" value="add_vehicle">

            <label>Year:</label>
            <input type="text" name="Year" /><br>

            <label>Make:</label>
            <input type="text" name="Make" /><br>

            <label>Model:</label>
            <input type="text" name="Model" /><br>

            <label>Price:</label>
            <input type="text" name="Price" /><br>
                        
            <label>Type:</label>
                <select name="type_code">
                <?php foreach ( $types as $type ) : ?>
                    <option value="<?php echo $type['type_code']; ?>">
                        <?php echo $type['VehicleType']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br>

                <label>Class:</label>
                <select name="class_code">
                <?php foreach ( $classes as $class ) : ?>
                    <option value="<?php echo $class['class_code']; ?>">
                        <?php echo $class['VehicleClass']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Vehicle" /><br>
        </form>
        <p><a href="admin.php?action=sort">View Inventory</a></p>
    </main>
<?php include './view/footer.php'; ?>