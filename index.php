<?php
require('model/database.php');
require('model/vehicle_db.php');
require('model/type_db.php');
require('model/class_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}
if ($action == 'list_vehicles') {
    $type_code = filter_input(INPUT_GET, 'type_code', FILTER_VALIDATE_INT);
    $class_code = filter_input(INPUT_GET, 'class_code', FILTER_VALIDATE_INT);
    $VehicleMake = filter_input(INPUT_GET, 'Make');
    $sort = filter_input(INPUT_GET, 'sort');
    switch ($sort):
        case "Price":
            break;
        case "Year":
            break;
        default:
            $sort = "Price";
        endswitch;
    if ($type_code !=NULL && $type_code != FALSE) {
        $type_name = get_type_name($type_code);
        $vehicles = get_vehicle_by_type($type_code, $sort);
    }  else if ($class_code != NULL && $class_code != FALSE) {
        $class_name = get_class_name($class_code);
        $vehicles = get_vehicle_by_class($class_code, $sort);
    } else if($VehicleMake !=NULL && $VehicleMake !=FALSE) {
        $vehicles = get_vehicle_by_make($VehicleMake, $sort);
    } else {
        $vehicles = get_vehicles($sort);
    }               
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include('vehicle_list.php');
} else if($action == 'list_types'){
    $types == get_types();
    include('type_list.php');    
} else if($action == 'list_classes'){
    $classes == get_classes();
    include('class_list.php');

}
?>