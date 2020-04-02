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

function get_vehicle_by_make($VehicleMake, $sort) {
        global $db;
        if ($sort == 'Year'){
                $orderby = 'v.Year';
            } else {
                $orderby = 'v.Price';
            }
        if ($VehicleMake == NULL || $VehicleMake == FALSE) {
                $query = 'SELECT v.Year, v.Make, v.Model, v.Price, t.VehicleType, c.VehicleClass
                        FROM vehicles v 
                        LEFT JOIN type t ON v.type_code = t.type_code
                        JOIN class c ON v.class_code = c.class_code
                        ORDER BY ' . $orderby . ' DESC';
        }else {
                $query = 'SELECT v.Year, v.Make, v.Model, v.Price, t.VehicleType, c.VehicleClass
                        FROM vehicles v 
                        LEFT JOIN type t ON v.type_code = t.type_code
                         JOIN class c ON v.class_code = c.class_code
                        WHERE v.Make = :VehicleMake
                        ORDER BY ' . $orderby . ' DESC';
        }            
        $statement = $db->prepare($query);
        $statement->bindValue(':VehicleMake', $VehicleMake);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
}

function get_vehicle_by_type($type_code, $sort) {
        global $db;
        if ($sort == 'Year'){
                $orderby = 'v.Year';
            } else {
                $orderby = 'v.Price';
            }
        if ($type_code == NULL || $type_code == FALSE) {
                $query = 'SELECT v.Year, v.Make, v.Model, v.Price, v.type_code, t.VehicleType, c.VehicleClass
                        FROM vehicles v 
                        LEFT JOIN type t ON v.type_code = t.type_code
                        LEFT JOIN class c ON v.class_code = c.class_code
                        ORDER by ' . $orderby . ' DESC';
        } else {    
        $query = 'SELECT v.Year, v.Make, v.Model, v.Price, v.type_code, t.VehicleType, c.VehicleClass
                        FROM vehicles v 
                        LEFT JOIN type t ON v.type_code = t.type_code
                        LEFT JOIN class c ON v.class_code = c.class_code
                        WHERE t.type_code = :type_code
                        ORDER BY '. $orderby .' DESC';
        }              
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
        
}
function get_vehicle_by_class($class_code, $sort) {
        global $db;
        if ($sort == 'Year'){
                $orderby = 'v.Year';
            } else {
                $orderby = 'v.Price';
            }
            if ($class_code == NULL || $class_code == FALSE) {
                $query = 'SELECT v.Year, v.Make, v.Model, v.Price, v.type_code, t.VehicleType, c.VehicleClass
                        FROM vehicles v 
                        LEFT JOIN type t ON v.type_code = t.type_code
                        LEFT JOIN class c ON v.class_code = c.class_code
                        ORDER by ' . $orderby . ' DESC';
            } else {
                $query = 'SELECT v.Year, v.Make, v.Model, v.Price, v.type_code, t.VehicleType, c.VehicleClass
                FROM vehicles v 
                LEFT JOIN type t ON v.type_code = t.type_code
                LEFT JOIN class c ON v.class_code = c.class_code
                WHERE v.class_code = :class_code 
                ORDER BY ' . $orderby . ' DESC';
            }
            $statement = $db->prepare($query);
            $statement->bindValue(':class_code', $class_code);
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $vehicles;
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