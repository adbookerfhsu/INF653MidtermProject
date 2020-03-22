<?php



function add_class($VehicleClass) {
    global $db;
    $query = 'INSERT INTO class (VehicleClass)
              VALUES (:VehicleClass)';
    $statement = $db->prepare($query);
    $statement->bindValue(':VehicleClass', $VehicleClass);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_class($class_code) {
    global $db;
    $query = 'DELETE FROM class
              WHERE class_code = :class_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_code', $class_code);
    $statement->execute();
    $statement->closeCursor();
}
?>