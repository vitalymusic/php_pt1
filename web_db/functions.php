<?php
include "db.php";



// Get un post vaicājumi

if(isset($_GET["action"])){
    if($_GET["action"]=="getComments" && isset($_GET["postId"])){
            getCommentsByPostId($_GET["postId"]);
    }


    if($_GET["action"]=="saveComment" && isset($_POST)){
            saveComment($_POST);
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

header('Content-Type: application/json; charset=utf-8');

try {
    // Ieslēdzam exception režīmu MySQLi
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Sagatavojam SQL vaicājumu
    $stmt = $conn->prepare(
        "INSERT INTO comments (comment_name, comment_content, post_id)
         VALUES (?, ?, ?)"
    );

    // Piesaistām parametrus
    $stmt->bind_param(
        "ssi",
        $data["comment_name"],
        $data["comment_content"],
        $data["post_id"]
    );

    // Izpildām vaicājumu
    $stmt->execute();

    echo json_encode(
        ["success" => true],
        JSON_UNESCAPED_UNICODE
    );
    exit();

} catch (mysqli_sql_exception $e) {

    http_response_code(500);
    echo json_encode(
        ["error" => $e->getMessage()],
        JSON_UNESCAPED_UNICODE
    );
}

}




?>