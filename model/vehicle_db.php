<?php
function sort_by_price() {
        global $db;
       
        $query = 'SELECT v.VehicleNum, v.Year, v.Make, v.Model, v.Price, t.VehicleType, c.VehicleClass
                      FROM vehicles v 
                      JOIN type t ON v.type_code = t.type_code
                      JOIN class c ON v.class_code = c.class_code
                      ORDER BY v.Price DESC';
       
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
}
   
function sort_by_year() {
        global $db;
        $query = 'SELECT v.VehicleNum, v.Year, v.Make, v.Model, v.Price, t.VehicleType, c.VehicleClass
                      FROM vehicles v 
                      JOIN type t ON v.type_code = t.type_code
                      JOIN class c ON v.class_code = c.class_code
                      ORDER BY v.Year';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;

}
function get_makes() {
        global $db;
        $query = 'SELECT *
                  FROM vehicles
                  GROUP BY Make';                   
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
}

function get_types() {
        global $db;
        $query = 'SELECT *
                  FROM type';                   
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
}

function get_type_name($type_code) {
        global $db;
        $query = 'SELECT *
                  FROM type
                  WHERE type_code = :type_code';                   
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        return $type;
}

function get_classes() {
        global $db;
        $query = 'SELECT *
                  FROM class';                   
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
}

function get_class_name($VehicleClass) {
        global $db;
        $query = 'SELECT *
                  FROM class
                  WHERE VehicleClass = :VehicleClass';                   
        $statement = $db->prepare($query);
        $statement->bindValue(':VehicleClass', $VehicleClass);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        return $class;
}

function get_vehicle_by_make($VehicleMake) {
        global $db;
        $query = 'SELECT v.Year, v.Make, v.Model, v.Price, t.VehicleType, c.VehicleClass
                      FROM vehicles v 
                      JOIN type t ON v.type_code = t.type_code
                      JOIN class c ON v.class_code = c.class_code
                      WHERE v.Make = :VehicleMake';
                      
        $statement = $db->prepare($query);
        $statement->bindValue(':VehicleMake', $VehicleMake);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        
}

function get_vehicle_by_type($type_code) {
        global $db;
        $query = 'SELECT v.Year, v.Make, v.Model, v.Price, v.type_code, t.VehicleType, c.VehicleClass
                      FROM vehicles v 
                      JOIN type t ON v.type_code = t.type_code
                      JOIN class c ON v.class_code = c.class_code
                      WHERE t.type_code = :type_code';
                      
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $vehicles = $statement->fetch();
        $statement->closeCursor();
        
}
function get_vehicle_by_class($class_code) {
        global $db;
        $query = 'SELECT v.Year, v.Make, v.Model, v.Price, t.VehicleType, c.VehicleClass
                      FROM vehicles v 
                      JOIN type t ON v.type_code = t.type_code
                      JOIN class c ON v.class_code = c.class_code
                      WHERE c.class_code = :class_code';
                      
        $statement = $db->prepare($query);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        
}

function delete_vehicle($vehicle_num) {
        global $db;
        $query = 'DELETE FROM vehicles WHERE VehicleNum = :vehicle_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_num', $vehicle_num);
        $statement->execute();
        $statement->closeCursor();
}       

function add_vehicle($Year, $Make, $Model, $Price, $type_code, $class_code) {
        global $db;
        $query = 'INSERT INTO vehicles
                (Year, Make, Model, Price, type_code, class_code)
                VALUES
                (:Year, :Make, :Model, :Price, :type_code, :class_code)';
        $statement = $db->prepare($query);
        $statement->bindValue(':Year', $Year);
        $statement->bindValue(':Make', $Make);
        $statement->bindValue(':Model', $Model);
        $statement->bindValue(':Price', $Price);
        $statement->bindValue(':type_code', $type_code);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $statement->closeCursor();
}
?>