<?php

    require 'connection.php';

    $id = $_POST['id'];

    $check_available_user = "SELECT * FROM user WHERE id = '$id' ";
    $query = mysqli_query($con, $check_available_user);

    if(mysqli_num_rows($query) > 0)
    {
        $delete = "DELETE FROM user WHERE id = '$id' ";
        $check_delete = mysqli_query($con, $delete);
        if($check_delete > 0)
        {
            $response['error'] = "000";
            $response['message'] = "Delete Success";
        }
        else
        {
            $response['error'] = "001";
            $response['message'] = "Deletion Failed";
        }
    }

    else
    {
        $response['error'] = "001";
        $response['message'] = "User not Found";
    }

    echo json_encode($response);

?>