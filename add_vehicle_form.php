<?php include 'view/headeradmin.php'; ?>
    <main>
        <h1>Add Vehicle</h1>
        <form action="admin.php" method="post" id="add_vehicle_form">
        <input type="hidden" name="action" value="add_vehicle">

            <label>Type:</label>
            <select name="type_code">
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['type_code']; ?>">
                    <?php echo $type['VehicleType']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Class:</label>
            <select name="class_code">
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['class_code']; ?>">
                    <?php echo $class['VehicleClass']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label for="Year">Year:</label>
            <input type="text" name="Year" min="1920" max="2100" maxlenth="4" pattern=[0-9]{1,5}" required><br>

            <label>Make:</label>
            <input type="text" name="Make" maxlength="50" required><br>

            <label>Model:</label>
            <input type="text" name="Model" maxlength="50" required><br>

            <label>Price:</label>
            <input type="text" name="Price" required><br>
                        
            <label id="blanklabel">&nbsp;</label>
            <input type="submit" value="Add Vehicle" class ="button blue"><br>
        </form>
        <?php include 'view/adminlinks.php'; ?>
        <?php include 'view/footer.php'; ?>
    </main>
