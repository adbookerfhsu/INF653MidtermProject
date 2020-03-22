<?php
include './view/header.php';
require('./model/database.php');


  



$query = 'SELECT v.Year, v.Make, v.Model, v.Price, t.VehicleType, c.VehicleClass
        FROM vehicles v 
        JOIN type t ON v.type_code = t.type_code
        JOIN class c ON v.class_code = c.class_code
        ORDER BY v.Price DESC';
        $statement = $db->prepare($query);
       
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();


        


?>

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
                    <td><?php echo $vehicle['VehicleType'];?></td>
                    <td> <?php echo $vehicle['VehicleClass'];?></td>
                <?php endforeach; ?>
            
        
        </table>

<?php
include './view/footer.php';
?>
