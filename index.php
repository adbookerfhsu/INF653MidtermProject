<?php
require('model/database.php');
require('model/vehicle_db.php');
require('model/type_db.php');
require('model/class_db.php');
require('model/make_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
} else {
    $action = 'list_vehicles';
}

if ($action == 'list_vehicles') {
    $type_code = filter_input(INPUT_GET, 'type_code', FILTER_VALIDATE_INT);
    $class_code = filter_input(INPUT_GET, 'class_code', FILTER_VALIDATE_INT);
    $VehicleMake = filter_input(INPUT_GET, 'Make');
    $sort = filter_input(INPUT_GET, 'sort');

    // replaced switch statment with ternary
    $sort = ($sort == 'Year')?"Year" : "Price";


    $class_name = get_class_name($class_code);
    $type_name = get_type_name($type_code);
    
    $vehicles = get_vehicles($sort);
    //filter for VehicleMake
    if ($VehicleMake != NULL && $VehicleMake !=FALSE){
        $vehicles= array_filter($vehicles, function($array)use($VehicleMake){return $array["Make"]==$VehicleMake;
        });
    }
    // filter for VehicleType
    if ($type_code !=NULL && $type_code !=FALSE) {
        $vehicles = array_filter($vehicles, function($array) use ($type_name) {
            return $array["VehicleType"]==$type_name;
        });
    }
    //filter for VehicleClass
    if ($class_code != NULL && $class_code !=FALSE){
        $vehicles = array_filter($vehicles, function($array)use($class_name){
            return $array["VehicleClass"] == $class_name;
        });
    }
    $types = get_types();
    $classes = get_classes();
    $makes = get_makes();
    include('view/header.php');
    include('vehicle_list.php');
    include('view/footer.php');
}
?>