<?php
include "db.php";



// Get un post vaicājumi

if(isset($_GET["action"])){
    if($_GET["action"]=="getComments" && isset($_GET["postId"])){
            getCommentsByPostId($_GET["postId"]);
    }









}







// Funckijas 
function getNavigation(){
    global $conn;

    $sql = "SELECT * FROM `menu` WHERE `menu_enabled`='1'";

    $result = $conn->query($sql);
    $data = [];
    if($result->num_rows>0){
        while($row = $result->fetch_assoc())  {
            $data[] = $row;
        }  

    }
    return $data;

}


function getPageById(int $id){
    global $conn;

    $sql = "SELECT * FROM `pages` WHERE `id`={$id}";

    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    // if($result->num_rows>0){
    //     while($row = $result->fetch_assoc())  {
    //         $data[] = $row;
    //     }  

    // }
    return $data;

}



function getPosts(){
        global $conn;
        $sql = "SELECT * FROM `posts`";
        $result = $conn->query($sql);
        $data = [];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc())  {
                $data[] = $row;
            }  
    }
    return $data;


}

function getCommentsByPostId($id){

global $conn;
        $sql = "SELECT * FROM `comments` WHERE `post_id`=$id";
        $result = $conn->query($sql);
        $data = [];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc())  {
                $data[] = $row;
            }  
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
    exit();


}


function saveComment($data){

    global $conn;
     $sql = "INSERT INTO `comments`( `comment_name`, `comment_content`, `post_id`) VALUES ('{$data["comment_name"]}','{$data["comment_content"]}','{$data["post_id"]}')";

     
     $result = $conn->query($sql);
      if($result){
         header('Content-Type: application/json; charset=utf-8');
         echo json_encode(["success"=>true],JSON_UNESCAPED_UNICODE);
         exit();
      } else{
         header('Content-Type: application/json; charset=utf-8');
         echo json_encode(["error"=>$conn->error],JSON_UNESCAPED_UNICODE);
      } 


}




?>