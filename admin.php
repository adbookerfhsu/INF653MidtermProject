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
    if ($sort == 'Year') {
        $vehicles = sort_by_year();
    } else {
    $vehicles = sort_by_price();
    }
    include('manager/admin_list.php');
}  else if ($action == 'delete_vehicle') {
    $vehicle_num = filter_input(INPUT_POST, 'VehicleNum', 
            FILTER_VALIDATE_INT);
    delete_vehicle($vehicle_num);
    $vehicles = sort_by_price();
    include('manager/admin_list.php');
} else if ($action == 'show_add_form') {
    $types = get_types();
    $classes = get_classes();
    include('manager/addvehicleform.php');    
} else if ($action == 'add_vehicle') {
    $Year = filter_input(INPUT_POST, 'Year');
    $Make = filter_input(INPUT_POST, 'Make');
    $Model = filter_input(INPUT_POST, 'Model');
    $Price = filter_input(INPUT_POST, 'Price');
    $type_code = filter_input(INPUT_POST, 'type_code');
    $class_code = filter_input(INPUT_POST, 'class_code');
    add_vehicle($Year, $Make, $Model, $Price, $type_code, $class_code);
    $vehicles = sort_by_price();
    include('manager/admin_list.php');
    
} else if ($action == 'list_types') {
    $types = get_types();
    include('manager/types_list.php');
} else if ($action == 'add_type') {
    $VehicleType = filter_input(INPUT_POST, 'VehicleType');

    // Validate inputs
    if ($VehicleType == NULL) {
        $error = "Invalid type name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_type($VehicleType);
        header('Location: admin.php?action=list_types');  // display the Vehicle Types page
    }
}  else if ($action == 'delete_type') {
    $type_code = filter_input(INPUT_POST, 'type_code', 
            FILTER_VALIDATE_INT);
    delete_type($type_code);
    header('Location: admin.php?action=list_types');      // display the Vehicle Types page
} else if ($action == 'list_classes') {
    $classes = get_classes();
    include('manager/classes_list.php');
} else if ($action == 'add_class') {
    $VehicleClass = filter_input(INPUT_POST, 'VehicleClass');

    // Validate inputs
    if ($VehicleClass == NULL) {
        $error = "Invalid class name. Check name and try again.";
        include('errors/error.php');
    } else {
        add_class($VehicleClass);
        header('Location: admin.php?action=list_classes');  // display the Vehicle Class page
    }
}  else if ($action == 'delete_class') {
    $class_code = filter_input(INPUT_POST, 'class_code', 
            FILTER_VALIDATE_INT);
    delete_class($class_code);
    header('Location: admin.php?action=list_classes');      // display the Vehicle Class page
}
?>