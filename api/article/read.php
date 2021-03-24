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

// Blog Article query
$result = $article->read();
// Get row count
$num = $result->rowCount();

// Check if any articles
if($num > 0) {
    // article array
    $articles_arr = array();
    // $articles_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $article_item=array(
            'id'=>$id,
            'doctor_id'=>$doctor_id,
            'title'=>$title,
            'body'=>html_entity_decode($body),
            'image'=>$image,
            'link'=>$link,
            'created_at'=>$created_at,
        );
        // Push to "data"
        array_push($articles_arr, $article_item);
        // array_push($articles_arr['data'], $article_item);
    }

    // Turn to JSON & output
    echo json_encode($articles_arr);

} else {
    // No articles
    echo json_encode(
        array('message' => 'No articles Found')
    );
}
