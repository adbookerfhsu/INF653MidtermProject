<?php
require('model/database.php');
require('model/vehicle_db.php');
require('model/type_db.php');
require('model/class_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'sort';
    }
}

if ($action == 'sort') {
    $sort = filter_input(INPUT_GET, 'sort');
    $Price = filter_input(INPUT_GET, 'Price');
    $Year = filter_input(INPUT_GET, 'Year');
    $class_code = filter_input(INPUT_GET, 'class_code');
    $type_code = filter_input(INPUT_GET, 'type_code');
    $VehicleMake = filter_input(INPUT_GET, 'Make');
    $makes = get_makes();
    $types = get_types();
    $type_name = get_type_name($type_code);
    $classes = get_classes();
    $class_name = get_class_name($class_code);
    if ($sort == "Year"){
    $vehicles = sort_by_year();
    } else {
        $vehicles = sort_by_price();
    }
    include('vehicle_list.php');
}  else if($action == 'list_makes'){
    $makes == get_makes();
    include('vehicle_list.php');
} else if($action == 'list_types'){
    $types == get_types();
    include('vehicle_list.php');    
} else if($action == 'list_classes'){
    $classes == get_classes();
    include('vehicle_list.php');
} else if($action== 'vehicle_by_type'){
    $type_code = filter_input(INPUT_GET, 'type_code');
    $vehicles = get_vehicle_by_type($type_code);
    include('vehicle_list.php');
} else if($action== 'vehicle_by_class'){
    $class_code = filter_input(INPUT_GET, 'class_code');
    $vehicles = get_vehicle_by_class($class_code);
    include('vehicle_list.php');
} else if ($action == 'vehicle_by_make'){
    $VehicleMake = filter_input(INPUT_GET, 'Make');
    $vehicles = get_vehicle_by_make($VehicleMake);
    include('vehicle_list.php');
}
?>