<?php

    require 'connection.php';
    $id = $_REQUEST['id'];

    $fetch_user = "SELECT id FROM user WHERE id = '$id' ";
    $query_check = mysqli_query($con, $fetch_user);

    if(mysqli_num_rows($query_check) > 0)
    {
        $response['error'] = "000";
        $response['message'] = "User found";
    }
    else
    {
        $response['error'] = "001";
        $response['message'] = "No user found";
    }

    echo json_encode($response);

?>