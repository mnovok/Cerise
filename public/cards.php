<?php
require_once("DatabaseAccess.php");


function getCardsFromDb(){
    // execute query and get cards data from the Cards table in the database
     
	return getDbAccess()->executeQuery("SELECT * FROM posts");
}

// generate html code for cards using data from the database
function generateCardsHtml(){
    $html = "";

    $cards = getCardsFromDb();

    foreach($cards as $card){
        // get values of the columns in the table in order 
        $id = $card[0];
        $username = $card[1];
        $imageUrl = $card[2];
        $description = $card[7]; //broj stupca
        $liked = $card[3];

        $heartClass = $liked == '1' ? "fa-heart" : "fa-heart-o";
        
        // html template filled with data
        $html .= "<article class='card' data-card-id='$id'>
                    <i class='fa fa-times delete-button clickable-icon'></i>
                    <img src='$imageUrl'>
                    <i class='fa $heartClass heart-icon clickable-icon'></i>
                    <p>$description</p>
                    <i class='fa fa-plus add-paragraph-icon clickable-icon'></i>
                  </article>";
    }

    return $html;
}

function toggleCardLike($id, $liked){
    getDbAccess()->executeQuery("UPDATE posts SET liked='$liked' WHERE ID='$id'");
}