<?php

function get_classes() {
    global $db;
    $query = 'SELECT *
              FROM class
              ORDER BY class_code';                   
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_class_name($class_code) {
    if ($class_code == NULL && $class_code == FALSE) {
        return NULL;
    } 
    global $db;
    $query = 'SELECT *
              FROM class
              WHERE class_code = :class_code';                   
    $statement = $db->prepare($query);
    $statement->bindValue(':class_code', $class_code);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    $class_name = $class['VehicleClass'];
    return $class_name;
}

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