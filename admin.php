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
    $sort = ($sort == 'Year') ? "Year" : "Price";


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
        include('admin_list.php');
    }   else if($action = 'list_types') {
        $types = get_types();
        include('types_list.php');
    }   else if ($action = 'list_classes') {
        $classes = get_classes();
        include('classes_list.php');
    }   else if ($action == 'delete_vehicle') {
        $vehicle_num = filter_input(INPUT_POST, 'VehicleNum', 
                FILTER_VALIDATE_INT);
        if ($vehicle_num == NULL || $vehicle_num == FALSE) {
            $error = "Missing or incorrect vehicle number.";
            include('errors/error.php');
        } else {    
        delete_vehicle($vehicle_num);
        header("Location: admin.php");
        }
    } else if ($action = 'delete_type') {
        $type_code = filter_input(INPUT_POST, 'type_code', FILTER_VALIDATE_INT);
        if ($type_code == NULL || $type_code == FALSE) {
            $error = "Missing or incorrect type code.";
            include('errors/error.php');
        } else {
            delete_type($type_code);
            header("Location: admin.php?action=list_types");
        }
    } else if ($action == 'delete_class') {
        $class_code = filter_input(INPUT_POST, 'class_code', 
                FILTER_VALIDATE_INT);
        if ($class_code == NULL || $class_code == FALSE) {
            $error = "Missing or incorrect class code.";
            include('errors/error.php');
        } else {
        delete_class($class_code);
        header('Location: admin.php?action=list_classes');      
        }   
    } else if ($action == 'show_add_form') {
        $classes = get_classes();
        $types = get_types();
        include('add_vehicle_form.php');
    } else if ($action == 'add_vehicle') {
        $type_code = filter_input(INPUT_POST, 'type_code');
        $class_code = filter_input(INPUT_POST, 'class_code');
        $Year = filter_input(INPUT_POST, 'Year');
        $Make = filter_input(INPUT_POST, 'Make');
        $Model = filter_input(INPUT_POST, 'Model');
        $Price = filter_input(INPUT_POST, 'Price');
        if ($type_code == NULL || $type_code == FALSE || $class_code == NULL || $class_code == FALSE || $Year == NULL || $Make == NULL || $Model == NULL || $Price == NULL) {
            $error = "Invalid vehicle data. Check all fields and try again.";
            include('errors/error.php');
        } else {
            add_vehicle($Year, $Make, $Model, $Price, $type_code, $class_code);
            header("Location: admin.php");
        }
    } else if ($action == 'add_type') {
        $VehicleType = filter_input(INPUT_POST, 'VehicleType');
        // Validate inputs
        if ($VehicleType == NULL) {
            $error = "Invalid type name. Check name and try again.";
            include('errors/error.php');
        } else {
            add_type($VehicleType);
            header('Location: admin.php?action=list_types');  
        }
    } else if ($action == 'add_class') {
        $VehicleClass = filter_input(INPUT_POST, 'VehicleClass');
        // Validate inputs
        if ($VehicleClass == NULL) {
            $error = "Invalid class name. Check name and try again.";
            include('errors/error.php');
        } else {
            add_class($VehicleClass);
            header('Location: admin.php?action=list_classes');  
        }
    }  
?>