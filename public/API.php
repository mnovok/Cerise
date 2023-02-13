<?php
require_once("functions.php");

// function that we call from our JS code that processes the request and calls actions that execute queries
function processRequest(){
  $action = getRequestParameter("action");
    // action that was called
    switch ($action) {
      case 'toggleCardLike':
        processToggleCardLike();
        break;
      case 'toggleCardBookmark':
        processToggleCardBookmark();
        break;
      case 'addPost':
        processAddPost();
        break;
      default:
      echo(json_encode(array(
         "success" => false,
         "reason" => "Unknown action: $action"
      )));
      break;
    }
}

function getRequestParameter($key) {
   // $_REQUEST[$key] -> a map of keys and values from the request
   return isset($_REQUEST[$key]) ? $_REQUEST[$key] : "";
}

//API.php?action=toggleCardLike&id=1&liked=1
function processToggleCardLike(){
  $success = false;
  $reason = "";

  $id = getRequestParameter("post_id");
  $liked = getRequestParameter("liked");
  $likes = getRequestParameter("likes");

  if (is_numeric($id) && is_numeric($liked) && is_numeric($likes)) {
    toggleCardLike($id, $liked, $likes);
    $success = true;
  } 
  else {
    $success = false;
    $reason = "Needs id:number; like:number; likes:number";
  }

  echo(json_encode(array(
  "success" => $success,
  "reason" => $reason
  )));
}

//API.php?action=toggleCardBookmark&id=1bookmarked=1
function processToggleCardBookmark(){
  $success = false;
  $reason = "";

  $id = getRequestParameter("post_id");
  $bookmarked = getRequestParameter("bookmarked");

  if (is_numeric($id) && is_numeric($bookmarked)) {
    toggleCardBookmark($id, $bookmarked);
    $success = true;
  } 
  else {
    $success = false;
    $reason = "Needs id:number; bookmark:number";
  }

  echo(json_encode(array(
  "success" => $success,
  "reason" => $reason
  )));
}

//API.php?action=addPost&imageUrl=asdfjgk&description=sth
function processAddPost(){
  $success =false;
  $reason = "";
  $id = 0;

  $title = getRequestParameter('title');
  $imageUrl = getRequestParameter('imageUrl');
  $description = getRequestParameter('description');

  if($title != "" && $imageUrl != "" && $description != ""){
    $id = addPost($title, $imageUrl, $description);
    $success = true;
  }
  else{
    $success = false;
    $reason = "Needs title, description and imageUrl";
  }

  echo(json_encode(array(
    "success" => $success,
    "reason" => $reason,
    "id" => $id
    )));
}


processRequest();

