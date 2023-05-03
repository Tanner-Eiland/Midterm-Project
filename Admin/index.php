<?php 
require('../model/database.php');
require('../model/vehicle_db.php');
require('../model/class_db.php');
require('../model/make_db.php');
require('../model/type_db.php');



$vehicle_ID = filter_input(INPUT_POST, 'vehicle_ID', FILTER_VALIDATE_INT);
if(!$vehicle_ID){
    $vehicle_ID = filter_input(INPUT_GET, 'vehicle_ID', FILTER_VALIDATE_INT);
};

$vehicle_year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
if(!$vehicle_year){
    $vehicle_year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
};
$vehicle_model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
if(!$vehicle_model){
    $vehicle_model = filter_input(INPUT_GET, 'model', FILTER_UNSAFE_RAW);
};
$vehicle_price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
if(!$vehicle_price){
    $vehicle_price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT);
};

$vehicle_type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$vehicle_type_id){
    $vehicle_type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
};

$vehicle_class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$vehicle_class_id){
    $vehicle_class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
};

$vehicle_make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$vehicle_make_id) {
    $vehicle_make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
};


$vehicle_type = filter_input(INPUT_POST, 'vehicle_type', FILTER_UNSAFE_RAW);
if(!$vehicle_type){
    $vehicle_type = filter_input(INPUT_GET, 'vehicle_type', FILTER_UNSAFE_RAW);
}

$vehicle_class = filter_input(INPUT_POST, 'vehicle_class', FILTER_UNSAFE_RAW);
if(!$vehicle_class){
    $vehicle_class = filter_input(INPUT_GET, 'vehicle_class', FILTER_UNSAFE_RAW);
}

$vehicle_make = filter_input(INPUT_POST, 'vehicle_make', FILTER_UNSAFE_RAW);
if(!$vehicle_make){
    $vehicle_make = filter_input(INPUT_GET, 'vehicle_make', FILTER_UNSAFE_RAW);
}


$vehicleSortBy = filter_input(INPUT_POST, 'vehicleSortBy', FILTER_UNSAFE_RAW);
if(!$vehicleSortBy) {
    $vehicleSortBy = filter_input(INPUT_GET, 'vehicleSortBy', FILTER_UNSAFE_RAW);
};


$action = filter_input(INPUT_POST, 'adminAction', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'adminAction', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'admin_page';
    };
};

switch ($action) {
    case "admin_page":
        $vehiclesBy = get_vehicles_by_make_type_class($vehicle_make_id, $vehicle_type_id, $vehicle_class_id, $vehicleSortBy);
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('../view/admin_page.php');
        break;
    case "delete_vehicle":
        delete_vehicle_by_ID($vehicle_ID);
        header("Location: .?adminAction=admin_page");
        break;
    case "view_makes":
        $makes = get_all_makes();
        include('../view/edit_makes.php');
        break;
    case "add_make":
        add_make($vehicle_make);
        header("Location: .?adminAction=view_makes");
        break;
    case "delete_make":
        if (make_id_used($vehicle_make_id)){
            $error = 'The make you attempted to delete is currently being used and cannot be deleted.';
            include('../view/admin_error.php');
        } else {
        delete_make($vehicle_make_id);
        header("Location: .?adminAction=view_makes");
        }
        break;
    case "view_types":
        $types = get_all_types();
        include('../view/edit_types.php');
        break;
    case "add_type":
        add_type($vehicle_type);
        header("Location: .?adminAction=view_types");
        break;
    case "delete_type":
        if (type_id_used($vehicle_type_id)){
            $error = 'The type you attempted to delete is currently being used and cannot be deleted.';
            include('../view/admin_error.php');
        } else {
        delete_type($vehicle_type_id);
        header("Location: .?adminAction=view_types");
        }
        break;
    case "view_classes":
        $classes = get_all_classes();
        include('../view/edit_classes.php');
        break;
    case "add_class":
        add_class($vehicle_class);
        header("Location: .?adminAction=view_classes");
        break;
    case "delete_class":
        if (class_id_used($vehicle_class_id)){
            $error = 'The class you attempted to delete is currently being used and cannot be deleted.';
            include('../view/admin_error.php');
        } else {
        delete_class($vehicle_class_id);
        header("Location: .?adminAction=view_classes");
        }
        break;
    case "vehicle_add":
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('../view/add_vehicle.php');
        break;
    case "add_vehicle":
        add_vehicle($vehicle_year, $vehicle_model, $vehicle_price, $vehicle_make_id, $vehicle_type_id, $vehicle_class_id);
        header("Location: .?adminAction=admin_page");
    default:
        $vehiclesBy = get_vehicles_by_make_type_class($vehicle_make_id, $vehicle_type_id, $vehicle_class_id, $vehicleSortBy);
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('../view/admin_page.php');
}