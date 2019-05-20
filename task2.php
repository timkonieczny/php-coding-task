<?php

const $SAMPLE_RESPONSE_HTML = "<p>success</p>";
const $SAMPLE_RESPONSE_JSON = json_encode(array('response' => "success"));

const $HEADER_CONTENT_TYPE = "Content/Type";
const $CONTENT_TYPE_HTML = "text/html";
const $CONTENT_TYPE_JSON = "application/json";
const $STATUS_REASON_400 = "Bad Request";
const $STATUS_REASON_200 = "OK";

function execute($request, $response){
    switch($request->get_method()){
        case "PUT":
        case "POST":
            if(areAttributesValid($request))
                handleRequest($request, $response)
            else
                $response->withStatus(400, $STATUS_REASON_400);
            break;
        case "GET":
            handleRequest($request, $response)
            break;
        // other request types can be added as needed
        default:
            $response->withStatus(400, $STATUS_REASON_400);
    }
    return $response;
}

// Takes requests and generates responses. 
function handleRequest($request, &$response){ 
    switch($request->getHeader($HEADER_CONTENT_TYPE)){
        case $CONTENT_TYPE_JSON:
            if(json_decode($request)!=null){    // basic JSON validation
                $response->getBody()->write($SAMPLE_RESPONSE_JSON);
                $response->withHeader($HEADER_CONTENT_TYPE, $CONTENT_TYPE_JSON);
                $response->withStatus(200, $STATUS_REASON_200);
            }else
                $response->withStatus(400, $STATUS_REASON_400);
            break;
        case $CONTENT_TYPE_HTML:
            $response->getBody()->write($SAMPLE_RESPONSE_HTML);
            $response->withHeader($HEADER_CONTENT_TYPE, $CONTENT_TYPE_HTML);
            $response->withStatus(200, $STATUS_REASON_200);
            break;
        // other content types can be added as needed
        default:
            $response->withStatus(400, $STATUS_REASON_400);
    }
}

// checks if all values are numeric (exemplary validation).
function areAttributesValid($request) : bool{
    foreach($request->getAttributes() as $key => $value)
        if(!is_numeric($value)) return false;
    return true;
}