<?php

require 'database_conn.php';
require 'CRUD.php';

$database = new Database();
$db = $database->getConnection();

// Exemple d'utilisation pour la table 'players'
$crud = new CRUD($db, 'players');

// Create
$newPlayer = [
    'name' => 'John Doe',
    'age' => 25,
    'team' => 'Team A'
];
if ($crud->create($newPlayer)) {
    echo "Player created successfully.<br>";
} else {
    echo "Failed to create player.<br>";
}

$newPlayrs2=[
    'name' => 'jaafar',
    'age' => 25,
    'team' => 'teamB'
];
 if($crud->create($newPlayrs2)){
    echo 'done';
 }else{
   echo 'not';
 }

// Read
$players = $crud->read();
echo "Players:<br>";
foreach ($players as $player) {
    echo "ID: " . $player['id'] . ", Name: " . $player['name'] . ", Age: " . $player['age'] . ", Team: " . $player['team'] . "<br>";
}

// Update
$updateData = ['name' => 'Jane Doe', 'age' => 28];
$conditions = ['id' => 1];
if ($crud->update($updateData, $conditions)) { 
    echo "Player updated successfully.<br>";
} else {
    echo "Failed to update player.<br>";
}

// Delete
$deleteConditions = ['id' => 1];
if ($crud->delete($deleteConditions)) {
    echo "Player deleted successfully.<br>";
} else {
    echo "Failed to delete player.<br>";
}