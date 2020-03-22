<?php include 'view/header.php'; ?>
<main>

 <!-- display a list of categories -->
 <aside>
     <br>

            
            <form action="." method="get" id="sort_by">
                <select name="vehicle_by_make">
                    <option value="0">Filter By Make</option>
                    <?php foreach ($makes as $make) : ?>
                        <option value="<?php echo $make['Make']; ?>"><?php echo $make['Make']; ?>
                           </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <select name="vehicle_by_type" value="type_code">
                    <option value="0">Filter By Type</option>
                    <?php foreach ($types as $type) : ?>
                        <option value="<?php echo $type['type_code']; ?>">
                           <?php echo $type['VehicleType']; ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <select name="vehicle_by_class" value="class_code">
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
                <!--<select name="action">
                    <option value="sort_by_price">Price (Default)</option>
                    <option value="sort_by_year">Year</option>
                </select>
                <!-->
                <input type="submit" value="submit">           
            </form>    
    </aside>    

    
    <h1 id="heading">Zippy Inventory</h1>
    <div id="tableDiv">
    <table>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Price</th>
                <th>Type</th>
                <th>Class</th>
            </tr>
                    
                <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td><?php echo $vehicle['Year']; ?></td>
                    <td><?php echo $vehicle['Make']; ?></td>
                    <td><?php echo $vehicle['Model']; ?></td>
                    <td><?php echo $vehicle['Price']; ?></td>
                    <td> <?php echo $vehicle['VehicleType'];?></td>
                    <td> <?php echo $vehicle['VehicleClass'];?></td>
                <?php endforeach; ?>
            
        
        </table>
            </br>
        
        
        
    </div>
</main>
<?php include 'view/footer.php'; ?>