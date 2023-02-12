<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'PUT'){

    include_once '../config/database.php';
    include_once '../models/Tags.php';

    $database = new Database();
    $db = $database->getConnection();

    $tag = new Tags($db);

    $data = json_decode(file_get_contents("php://input"));
    //print_r($data);  
    echo json_encode(["data" =>  $data]);
    
    if(!empty($data->id)){
        //echo json_encode(["data checked" =>  $data]);
        $tag->id = $data->id;
        $tag->name = $data->name;
        $tag->details = $data->details;

        echo json_encode(["Update tag #".$tag->id =>  $tag]);
        
        if($tag->update()){
            
            http_response_code(200);
            echo json_encode(["message" => "La modification a été effectuée"]);


        }else{

            http_response_code(503);
            echo json_encode(["message" => "La modification n'a pas été effectuée"]);
            
        }

    }
 
}else{

    http_response_code(405);
    echo json_encode(["message" => "Method Not Allowed"]);

}


?>
