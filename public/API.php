<?php
require_once("cards.php");

// function that we call from our JS code that processes the request and calls actions that execute queries
function processRequest(){
  $action = getRequestParameter("action");

    // action that was called
    switch ($action) {
      case "toggleCardLike":
        processToggleCardLike();
        break;

      default:
      echo(json_encode(array(
         "success" => false,
         "reason" => "Unknown action: $action"
      )));
      break;
    }
}

// getRequestParameter("action") -> "deleteCard"
function getRequestParameter($key) {
   // $_REQUEST[$key] -> a map of keys and values from the request
   return isset($_REQUEST[$key]) ? $_REQUEST[$key] : "";
}

// http://pzi.fesb.hr/NovokmetM/vjezba9pocetak/API.php

//API.php?action=toggleCardLike&id=1&liked=1

function processToggleCardLike(){
  $success = false;
  $reason = "";

  $id = getRequestParameter('id');
  $liked = getRequestParameter('liked');

  if(is_numeric($id) && is_numeric($liked)){
   
    toggleCardLike($id, $liked);
    $success = true; //sve dobro proslo
  }

  else{
    $success = false;
    $reason = "Needs id:number; liked:number";
  }

  echo(json_encode(array(
    "success" => $success,
    "reason" => $reason
  )));
}

processRequest();