<?php
require_once('database.php');
$db= $conn; // Enter your connection variable
$tableName='posts'; // Enter your Table Name
$limit=10;
$fetchDefaultData=fetch_default_data($limit,$tableName);
$displayDefaultData= display_data($fetchDefaultData);
if(isset($_GET['last_id']) && !empty($_GET['last_id']) ){
  $lastId= validate($_GET['last_id']);
  $fetchMoreData=fetch_more_data($lastId,$limit,$tableName);
  echo display_data($fetchMoreData);
}
// validate last id
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
function fetch_more_data($lastId,$limit,$tableName){
   global $db;
   $limit= trim($limit);
   $tableName=trim($tableName);
   if(empty($limit)){
     return "Limit must be required";
   }elseif (empty($tableName)) {
     return "Database must be required";
   }else{
     $query = $db->prepare("SELECT * FROM ".$tableName." WHERE id< ? ORDER BY ID DESC LIMIT ?");
     if($query){
    $query->bind_param('ii',$lastId,$limit);  
        $query->execute();
        $result=$query->get_result();
    if($result){
     if($result->num_rows>0){
           $row= $result->fetch_all(MYSQLI_ASSOC);
           return $row; 
         }
        }else{
         return "Error: " . $query . "<br>" . $db->error;
        }
    }else{
  return "Error: " . $query . "<br>" . $db->error;
    }
  }
}
function display_data($displayData){
    if(is_array($displayData)){
      $text='';
      $text='<div class="display-content" id="load-content">';
    foreach($displayData as $data){
     $text.= "<div class='record'>";
     $text.= "<p>".$data['description']."</p>";
     $text.= "</div>";
  }
    $text.="<div class='loader-symbol'><div class='loader' id='".$data['ID']."' style='display: none;'></div></div>";
    $text.="</div>";
    return $text;
 }else{
     return $displayData;
 }
}
// fetching padination data
function fetch_default_data($limit,$tableName){
   global $db;
   $limit= trim($limit);
   $tableName=trim($tableName);
   if(empty($limit)){
     return "Limit must be required";
   }elseif (empty($tableName)) {
    return "Database must be required";
   }else{
   $query = $db->prepare("SELECT * FROM ".$tableName." ORDER BY ID DESC LIMIT ?");
  
  if($query){
    $query->bind_param('i',$limit); 
    $query->execute();
    $result=$query->get_result();
    if($result){
      if($result->num_rows>0){
        $row= $result->fetch_all(MYSQLI_ASSOC);
        return $row; 
      } else{
  return "No Records Found";
      }     
  }else{ 
    return "Error: " . $query . "<br>" . $db->error;
  }
 }else{
   return "Error: " . $query . "<br>" . $db->error;
 }}}
?>