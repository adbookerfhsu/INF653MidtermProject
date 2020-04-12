<?php

    function get_types() {
        global $db;
        $query = 'SELECT *
                FROM type
                ORDER BY type_code';                   
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    function get_type_name($type_code) {
        if ($type_code == NULL | $type_code == FALSE) {
            return NULL;
        } 
        global $db;
        $query = 'SELECT *
                FROM type
                WHERE type_code = :type_code';                   
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['VehicleType'];
        return $type_name;
    }

    function add_type($type_name) {
        global $db;
        $query = 'INSERT INTO type (VehicleType)
                VALUES (:VehicleType)';
        $statement = $db->prepare($query);
        $statement->bindValue(':VehicleType', $type_name);
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