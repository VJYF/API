<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'PUT'){

    include_once '../config/database.php';
    include_once '../models/Product.php';

    $database = new Database();
    $db = $database->getConnection();

    $product = new Products($db);

    $data = json_decode(file_get_contents("php://input"));
    print_r($product);  
    
    if(!empty($data->id) && !empty($data->name) && !empty($data->details) && !empty($data->price) && !empty($data->tag_id)){
        
        $product->name = $data->name;
        $product->price = $data->price;
        $product->details = $data->details;
        $product->tag_id = $data->tag_id;
        $product->id = $data->id;
        
        if($product->update()){
            
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
