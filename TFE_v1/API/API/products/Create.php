<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once 'c:/xampp/htdocs/API/config/param.php';
    include_once PARAMS['domain'] . PARAMS['db_path'];
    include_once PARAMS['domain'] . PARAMS['product_path'];
    
    $database = new Database();
    $db = $database->getConnection();
    
    $product = new Products($db);
    
    $data = json_decode(file_get_contents("php://input"));
    //echo json_encode(["data" =>  $data]);
    //echo json_encode(["message" =>  "IF "]);
    
    if(!empty($data->name) && !empty($data->details) && !empty($data->price) && !empty($data->tag_id) && !empty($data->src)){
        
        $product->name = $data->name;
        $product->details = $data->details;
        $product->price = $data->price;
        $product->src = $data->src;
        $product->tag_id = $data->tag_id;
        echo json_encode(["New product " =>  $product]);

        if($product->create()){
            
            http_response_code(201);
            echo json_encode(["message" => "L'ajout a été effectué"]);

        }else{

            http_response_code(503);
            echo json_encode(["message" => "L'ajout n'a pas été effectué"]);

        }
    }else{

        http_response_code(503);
        echo json_encode(["message" => "Requête non valide"]);  
    }

}else{

    http_response_code(405);
    echo json_encode(["message" =>  "Method Not Allowed"]);

}