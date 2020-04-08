<main>

 <!-- display a list of categories -->
<nav>
     <br>
        <form action="." method="get" id="make_selection">
            <section id="dropdowns">
                <?php if(sizeof($makes) !=0) { ?>
                    <label>Make:</label>
                    <select name="Make">
                        <option value="0">View All Makes</option>
                         <?php foreach ($makes as $make) : ?>
                            <option value="<?php echo $make['Make']; ?>"<?php echo ($VehicleMake ==$make['Make'] ? "selected" : false) ?>>
                                <?php echo $make['Make']; ?>
                           </option>
                        <?php endforeach; ?>
                    </select>
                <?php } ?>
                <br>
                <?php if ( sizeof($types) !=0) { ?>
                    <label>Type:</label>
                    <select name="type_code" >
                        <option value="0">View All Types</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?php echo $type['type_code']; ?>" <?php echo($type_name == $type['VehicleType'] ? "selected" : false)?> >
                                <?php echo $type['VehicleType']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php } ?>    
                <br>
                <?php if (sizeof($classes) !=0) { ?>
                    <label>Class:</label>               
                    <select name="class_code" >
                        <option value="0">View All Classes</option>
                        <?php foreach ($classes as $class) : ?>
                            <option value="<?php echo $class['class_code']; ?>" <?php echo ($class_name == $class['VehicleClass'] ? "selected" : false)?>>
                            <?php echo $class['VehicleClass']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                <?php } ?>    
                </section>
               <br>
               <section id="radioSortby">
                    <span>Sort By:</span>
                    <input type="radio" id="sortByPrice" name="sort" value="Price" <?php echo($sort == "Price" ? "checked" : false)?>>
                    <label for="sortByPrice">Price</label>
                    <input type="radio" id="sortByYear" name="sort" value="Year" <?php echo ($sort == "Year" ? "checked" : false)?>>
                    <label for="sortByYear">Year</label>
                    <input type="submit" value="Submit Sort" class="button blue button-slim">
                    <input id="resetVehicleListForm" type="reset" value="Reset Search" class="button red button-slim" >

                </section>           
            </form>    
    </nav>    

   <section>

    <h1 id="heading">Zippy Inventory</h1>
    <div id="tableDiv">
        <?php if (sizeof($vehicles) !=0) { ?>
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
<script defer src="view/js/main.js" type="text/javascript"></script>