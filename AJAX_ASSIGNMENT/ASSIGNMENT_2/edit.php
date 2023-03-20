<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updateid= $_POST["user"];
    $updatepost= $_POST["postname"];
    $updatedescription = $_POST["postdescription"];
    $id = $_POST["id"];
    $check = "SELECT `id` FROM Post";
    $result1 = mysqli_query($conn, $check);
    $num = $result1->num_rows;
    for ($i = 0; $i < $num; $i++) {
        $arr = mysqli_fetch_assoc($result1);
        if ($arr['id'] == $id) {
            if ($updatedescription != null && $updatepost != null && $updateid != null) {
                $query = "UPDATE Post SET userid='$updateid' , Description='$updatedescription', Title='$updatepost'  WHERE id='$id'";
                if($conn -> query($query)){
                    $return_arr[] = array("message" => "user id,Post name and Description Updated");
                    echo json_encode($return_arr);
                    exit;
                }
            }
            else if ($updatedescription!= null) {
                $query = "UPDATE Post SET Description='$updatedescription' WHERE id='$id'";
                if($conn -> query($query)){
                    $return_arr[] = array("message" => "Post Description Updated");
                    echo json_encode($return_arr);
                    exit;
                }
            }
           else if ($updateid != null) {
                $query = "UPDATE Post SET userid='$updateid' WHERE id='$id'";
                if($conn -> query($query)){
                    $return_arr[] = array("message" => "user id Updated");
                    echo json_encode($return_arr);
                    exit;
                }
            }
           else if ($updatepost != null) {
                $query = "UPDATE Post SET Title='$updatepost'  WHERE id='$id'";
                if($conn -> query($query)){
                    $return_arr[] = array("message" => "Post name Updated");
                    echo json_encode($return_arr);
                    exit;
                }
            }
        }
    }

}

?>