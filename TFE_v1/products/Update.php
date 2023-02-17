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
    //echo json_encode(["data" =>  $data]);
    
    if(!empty($data->id)){
        
        $product->id = $data->id;
        $product->name = $data->name;
        $product->details = $data->details;
        $product->price = $data->price;
        $product->time = $data->time;
        $product->tag_id = $data->tag_id;
        echo json_encode(["product " =>  $product]);
        
        if($product->update()){
            
            http_response_code(200);
            echo json_encode(["message" => "La modification a été effectuée"]);


        }else{

            http_response_code(503);
            echo json_encode(["message" => "La modification n'a pas été effectuée"]);
            
        }

    }else{

        http_response_code(503);
        echo json_encode(["message" => "Requête non valide"]);  
    }
 
}else{

    http_response_code(405);
    echo json_encode(["message" => "Method Not Allowed"]);

}


?>
