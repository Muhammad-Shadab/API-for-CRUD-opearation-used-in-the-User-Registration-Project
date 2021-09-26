<?php

    require 'connection.php';

    $fetch_user = "SELECT id, username, age, phone, email, address FROM user ";
    $query_check = mysqli_query($con, $fetch_user);

    if(mysqli_num_rows($query_check) > 0)
    {
       while($row = $query_check->fetch_assoc()) 
       {
           $response[] = $row;
       }
    }
    else
    {
        $response['message'] = "No user found";
    }

    echo json_encode($response);

?>