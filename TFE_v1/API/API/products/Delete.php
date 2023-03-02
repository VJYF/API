<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

    include_once 'c:/xampp/htdocs/API/config/param.php';
    include_once PARAMS['domain'] . PARAMS['db_path'];
    include_once PARAMS['domain'] . PARAMS['product_path'];

    $database = new Database();
    $db = $database->getConnection();
    
    $product = new Products($db);
    
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->id)){
        $product->id = $data->id;

        if($product->delete()){

            http_response_code(200);
            echo json_encode(["message" => "La suppression a été effectué"]);

        }else{

            http_response_code(503);
            echo json_encode(["message" => "La suppression n'a pas été effectué"]);

        }
    }

}else{

        http_response_code(405);
        echo json_encode(["message" =>  "Method Not Allowed"]);

}
