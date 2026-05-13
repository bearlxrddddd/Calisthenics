<?php
require "./config/config.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];
$params = explode('/', $_GET['q']);
$type = $params[0];

if (isset($params[1])) {
    $id = $params[1];
}

switch ($method) {
    case 'GET':
        if ($type === 'workouts') {
            if (isset($id)) {
                getWorkout($pdo, $id);
            } else {
                getWorkouts($pdo);
            }
        }
        if ($type === 'users') {
            if (isset($id)) {
                getUser($pdo, $id);
            } else {
                getUsers($pdo);
            }
        }
        if ($type === 'exercises') {
            getExercises($pdo);
        }
        if ($type === 'sets') {
            if (isset($id)) {
                getSets($pdo, $id);
            }
        }
        break;

    case 'POST':
        if ($type === 'workouts') {
            addWorkout($pdo, $_POST);
        }
        if ($type === 'users') {
            addUser($pdo, $_POST);
        }
        if ($type === 'sets') {
            $data = json_decode(file_get_contents('php://input'), true);
            addSet($pdo, $data);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        if ($type === 'workouts') {
            if (isset($id)){
            updateWorkout($pdo, $id, $data);
        }}
        if ($type === 'users') {
            if (isset($id)){
            updateUser($pdo, $id, $data);
        }}
        break;

    case 'DELETE':
        if ($type === 'workouts'){ 
        if (isset($id)) {
            deleteWorkout($pdo, $id);
        }}
        if ($type === 'users'){       
        if (isset($id)) {
            deleteUser($pdo, $id);
        }}
        if ($type === 'sets'){      
        if (isset($id)) {
            deleteSet($pdo, $id);
        }}
        break;
}