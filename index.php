<?php 
require('model/database.php');
require('model/vehicle_db.php');
require('model/class_db.php');
require('model/make_db.php');
require('model/type_db.php');



$vehicle_ID = filter_input(INPUT_POST, 'vehicle_ID', FILTER_VALIDATE_INT);

$vehicle_year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$vehicle_model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$vehicle_price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

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

$vehicle_class = filter_input(INPUT_POST, 'vehicle_class', FILTER_UNSAFE_RAW);

$vehicle_make = filter_input(INPUT_POST, 'vehicle_make', FILTER_UNSAFE_RAW);


$vehicleSortBy = filter_input(INPUT_POST, 'vehicleSortBy', FILTER_UNSAFE_RAW);
if(!$vehicleSortBy) {
    $vehicleSortBy = filter_input(INPUT_GET, 'vehicleSortBy', FILTER_UNSAFE_RAW);
};


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'customer_page';
    };
};

switch ($action) {
    case "customer_page":
        $vehicle_type_id = $vehicle_type_id;
        $vehiclesBy = get_vehicles_by_make_type_class($vehicle_make_id, $vehicle_type_id, $vehicle_class_id, $vehicleSortBy);
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('view/customer_page.php');
        break;
    case "try_this":
        include('view/customer_page.php');
    case "test":
        delete_type("test");
        break;
    default:
        $vehiclesBy = get_vehicles_by_make_type_class($vehicle_make_id, $vehicle_type_id, $vehicle_class_id, $vehicleSortBy);
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('view/customer_page.php');
}