<?php



function add_type($VehicleType) {
    global $db;
    $query = 'INSERT INTO type (VehicleType)
              VALUES (:VehicleType)';
    $statement = $db->prepare($query);
    $statement->bindValue(':VehicleType', $VehicleType);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_type($type_code) {
    global $db;
    $query = 'DELETE FROM type
              WHERE type_code = :type_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_code', $type_code);
    $statement->execute();
    $statement->closeCursor();
}
?>