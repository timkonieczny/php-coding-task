<?php

$SAMPLE_RESPONSE_HTML = "<p>success</p>";
$SAMPLE_RESPONSE_JSON = json_encode(array('response' => "success"));

$HEADER_CONTENT_TYPE = "Content/Type";
$CONTENT_TYPE_HTML = "text/html";
$CONTENT_TYPE_JSON = "application/json";

function execute($request, $response){
    switch($request->get_method()){
        case "PUT":
        case "POST":
            if(areAttributesValid($request)){
                handleRequest($request, $response)
            }else{
                $response->withStatus(400, "Bad Request");
            }
            break;
        case "GET":
            handleRequest($request, $response)
            break;
        // other request types can be added as needed
        default:
            $response->withStatus(400, "Bad Request");
    }
    return $response;
}

function handleRequest($request, &$response){ 
    switch($request->getHeader($HEADER_CONTENT_TYPE)){
        case $CONTENT_TYPE_JSON:
            $response->getBody()->write($SAMPLE_RESPONSE_JSON);
            $response->withHeader($HEADER_CONTENT_TYPE, $CONTENT_TYPE_JSON);
            break;
        case $CONTENT_TYPE_HTML:
            $response->getBody()->write($SAMPLE_RESPONSE_HTML);
            $response->withHeader($HEADER_CONTENT_TYPE, $CONTENT_TYPE_HTML);
            break;
        default:
            echo "This content type cannot be handled";
    }
    $response->withStatus(200, "OK");
}

function areAttributesValid($request) : bool{
    foreach($request->getAttributes() as $key => $value){
        if(!is_numeric($value)) return false;
    }
    return true;
}