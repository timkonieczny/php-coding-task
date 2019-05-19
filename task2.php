<?php

function execute($request, $response){

    $SAMPLE_RESPONSE_HTML = "success";
    $SAMPLE_RESPONSE_JSON = json_encode(array('response' => "success"));

    switch($request->get_method()){
        case "PUT":
            handleRequest($request, $response)
            break;
        case "POST":
            handleRequest($request, $response)            
            break;
        default:
            echo "This request cannot be handled";
    }
    return $response;
}

function handleRequest($request, &$response){
    switch($request->getHeader("Content-Type")){
        case "application/json":
            $response->getBody()->write($SAMPLE_RESPONSE_JSON);
            break;
        case "text/html":
            $response->getBody()->write($SAMPLE_RESPONSE_HTML);
            break;
        default:
            echo "This content type cannot be handled";
    }
}