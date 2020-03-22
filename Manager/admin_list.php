<?php include '../view/header.php'; ?>
<main>


            
<form action="./admin.php" method="get" id="sort_by">
                <select name="vehicle_by_make">
                    <option value="0">Filter By Make</option>
                    <?php foreach ($makes as $make) : ?>
                        <option value="<?php echo $make['Make']; ?>">
                           <?php echo $make['Make']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <select name="vehicle_by_type">
                    <option value="0">Filter By Type</option>
                    <?php foreach ($types as $type) : ?>
                        <option value="<?php echo $type['type_code']; ?>">
                           <?php echo $type['VehicleType']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <select name="vehicle_by_class">
                    <option value="0">Filter By Class</option>
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?php echo $class['class_code']; ?>">
                           <?php echo $class['VehicleClass']; ?></option>
                    <?php endforeach; ?>
                </select>
               <br>
               <label>Sort By:</label>
                <input type="radio" name="sort" value="Price" checked>Price
                <input type="radio" name="sort" value="Year">Year
                
                <input type="submit" value="Submit">           
            </form>    
    </aside>    

<h1>Zippy Inventory</h1>
<div id="tableDiv">
    <table>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Price</th>
                <th>Type</th>
                <th>Class</th>
                <th>&nbsp;</th>
            </tr>
                    
                <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                <td><?php echo $vehicle['Year']; ?></td>
                    <td><?php echo $vehicle['Make']; ?></td>
                    <td><?php echo $vehicle['Model']; ?></td>
                    <td><?php echo $vehicle['Price']; ?></td>
                    <td> <?php echo $vehicle['VehicleType'];?></td>
                    <td> <?php echo $vehicle['VehicleClass'];?></td>
                    <td><form action="../admin.php" method="post">
                    <input type="hidden" name="action"
                           value="delete_vehicle">
                    <input type="hidden" name="VehicleNum"
                           value="<?php echo $vehicle['VehicleNum']; ?>">
                    <input type="submit" value="DELETE" class="red">
                </form></td>
                </tr>
                <?php endforeach; ?>
            
        
        </table>
        </div>
            </br>
        
        <p><a href="?action=show_add_form">Click here to add new vehicle</a></p>
                
        <p><a href="admin.php?action=sort_by_price">View Inventory</a></p>        
        <p><a href="admin.php?action=list_types">View/Edit Vehicle Types</a></p>
        <p><a href="admin.php?action=list_classes">View/Edit Vehicle Classes</a></p>
    </div>
</main>
<?php include '../view/footer.php'; ?>