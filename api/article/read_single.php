<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Article.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog article object
$article = new Article($db);

// Get ID
$article->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get article
$article->read_single();

$article_arr = array(
    'id' => $article->id,
    'doctor_id' => $article->doctor_id,
    'title' => $article->title,
    'body' => $article->body,
    'image' => $article->image,
    'link' => $article->link,
    'created_at' => $article->created_at
);

// Make JSON
print_r(json_encode($article_arr));

