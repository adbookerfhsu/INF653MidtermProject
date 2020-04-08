<?php
function get_vehicles($sort) {
        global $db;
        if ($sort == 'Year'){
                $orderby = 'v.Year';
            } else {
                $orderby = 'v.Price';
            }
                $query = 'SELECT v.VehicleNum, v.Year, v.Make, v.Model, v.Price, t.VehicleType, c.VehicleClass
                FROM vehicles v 
                LEFT JOIN type t ON v.type_code = t.type_code
                LEFT JOIN class c ON v.class_code = c.class_code
                ORDER BY ' .$orderby . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
}

function get_vehicle($vehicle_num) {
        global $db;
        $query = 'SELECT *
                FROM vehicles
                WHERE VehicleNum = :vehicle_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_num', $vehicle_num);
        $statement->execute();
        $vehicle = $statement->fetch();
        $statement->closeCursor();
        return $vehicle;
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