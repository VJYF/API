<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'PUT'){

    include_once 'c:/xampp/htdocs/API/config/param.php';
    include_once PARAMS['domain'] . PARAMS['db_path'];
    include_once PARAMS['domain'] . PARAMS['product_path'];

    $database = new Database();
    $db = $database->getConnection();

    $product = new Products($db);

    $data = json_decode(file_get_contents("php://input"));
    //echo json_encode(["data" =>  $data]);
    
    if(!empty($data->id)){       
        $product->id = $data->id;
        if(!empty($data->name)){
            $product->name = $data->name;
            if(!empty($data->details)){
                $product->details = $data->details;   
                if(!empty($data->price)){
                    $product->price = $data->price;
                    if(!empty($data->tag_id)){
                        $product->tag_id = $data->tag_id;
                        if(!empty($data->src)){
                            $product->src = $data->src;
                        }else{http_response_code(503);echo json_encode(["message" => "SRC missing"]);}
                    }else{http_response_code(503);echo json_encode(["message" => "Tag ID missing"]);}
                }else{http_response_code(503);echo json_encode(["message" => "Price missing"]);}
            }else{http_response_code(503);echo json_encode(["message" => "Details missing"]);}
        }else{http_response_code(503);echo json_encode(["message" => "Name missing"]);}
        
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
