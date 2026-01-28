<?php
include "db.php";



// Get un post vaicājumi








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




?>