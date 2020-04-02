<?php include 'view/header.php'; ?>
<main>

 <!-- display a list of categories -->
 <aside>
     <br>
        <form action="." method="get" id="usermenus">
            <section id="dropdowns">
                <?php if($makes !=0) { ?>
                    <label>Make:</label>
                    <select name="Make">
                        <option value="0">Filter By Make</option>
                         <?php foreach ($makes as $make) : ?>
                            <option value="<?php echo $make['Make']; ?>"><?php echo $make['Make']; ?>
                           </option>
                    <?php endforeach; ?>
                </select>
                         <?php } ?>
                <br>
                <?php if ($types !=0) { ?>
                    <label>Type:</label>
                    <select name="type_code" >
                        <option value="0">Filter By Type</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?php echo $type['type_code']; ?>">
                           <?php echo $type['VehicleType']; ?></option>
                        <?php endforeach; ?>
                    </select>
                        <?php } ?>    
                <br>
                <?php if ($classes !=0) { ?>
                    <label>Class:</label>               
                    <select name="class_code" >
                        <option value="0">Filter By Class</option>
                        <?php foreach ($classes as $class) : ?>
                            <option value="<?php echo $class['class_code']; ?>">
                            <?php echo $class['VehicleClass']; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php } ?>    
                </section>
               <br>
               <section id="radioSortby">
                    <span>Sort By:</span>
                    <input type="radio" is="sortPrice" name="sort" value="Price" checked>
                    <label for="sortPrice">Price</label>
                    <input type="radio" is="sortYear" name="sort" value="Year">
                    <label for="sortYear">Year</label>
                    <input type="submit" value="Submit Sort" class="sortbtn">
                </section>           
            </form>    
    </aside>    

    
    <h1 id="heading">Zippy Inventory</h1>
    <div id="tableDiv">
        <?php if ($vehicles !=0) { ?>
    <table>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
            </tr>
                    
                <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td><?php echo $vehicle['Year']; ?></td>
                    <td><?php echo $vehicle['Make']; ?></td>
                    <td><?php echo $vehicle['Model']; ?></td>
                    <?php if ($vehicle['VehicleType'] == NULL || $vehicle['VehicleType'] == FALSE) { ?>
                        <td>None</td>
                    <?php } else { ?>
                        <td><?php echo $vehicle['VehicleType']; ?></td>
                    <?php } ?>    
                    <?php if ($vehicle['VehicleClass'] == NULL || $vehicle['VehicleClass'] == FALSE) { ?>
                        <td>None</td>
                    <?php } else { ?>    
                        <td><?php echo $vehicle['VehicleClass'];?></td>
                    <?php } ?>
                    <td><?php echo "$".number_format($vehicle['Price'],2); ?></td>
                </tr>    
                <?php endforeach; ?>
            
        
        </table>
            </br>
    </div>
                    <?php } else {?>
                    <p> There are no matching vehicles in Zippy Used Auto Inventory.</p>
                    <?php } ?>    
</main>
<?php include 'view/footer.php'; ?>