<?php

function get_makes() {
    global $db;
    $query = 'SELECT Make
              FROM vehicles
              GROUP BY Make';                   
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}
?>
