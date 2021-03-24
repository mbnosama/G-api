<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Article.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog article object
$article = new Article($db);

// Get raw posted data
$data=json_decode(file_get_contents("php://input"));

$article->id = $data->id;
$article->doctor_id =$data->doctor_id;
$article->title = $data->title;
$article->body = $data->body;
$article->image = $data->image;
$article->link = $data->link;

// Update post
if($article->update()) {
    echo json_encode(
        array('message' => 'Article Updated')
    );
} else {
    echo json_encode(
        array('message' => 'Article Not Updated')
    );
}