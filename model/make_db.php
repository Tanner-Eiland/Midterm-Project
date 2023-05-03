<?php

function get_all_makes(){
    global $db;
    $query = 'SELECT * FROM make ORDER BY make_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function add_make($vehicle_make){
    global $db;
    $query = 'INSERT INTO make (make) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':make', $vehicle_make);
    $statement->execute();
    $statement->closeCursor();
}

function delete_make($vehicle_make){
    global $db;
    $query = 'DELETE FROM make WHERE make_id = :make ';
    $statement = $db->prepare($query);
    $statement->bindvalue(':make', $vehicle_make);
    $statement->execute();
    $statement->closeCursor();
}

function make_id_used($vehicle_make_id){
    global $db;
    $query = 'SELECT * FROM vehicles WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':make_id', $vehicle_make_id);
    $statement->execute();
    $isUsed = $statement->fetchAll();
    $statement->closeCursor();
    return $isUsed;
}