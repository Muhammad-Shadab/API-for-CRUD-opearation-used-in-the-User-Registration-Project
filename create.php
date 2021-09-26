<?php

    require 'connection.php';
    $username = $_POST['username'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address =  $_POST['address'];


    $available_user = "SELECT * FROM user WHERE email = '$email' ";
    $check_user_query = mysqli_query($con, $available_user);

    if(mysqli_num_rows($check_user_query) > 0)
    {
        $response['error'] = "001";
        $response['message'] = "User Already Available";
    }

 else
    {
    $enter_data_query = "INSERT into user (username, age, phone, email, password, address)
    VALUES ('$username', '$age', '$phone', '$email', '$password', '$address')";

    $check_query = mysqli_query($con, $enter_data_query);

    if($check_query > 0)
    {
        $response['error'] = "000";
        $response['message'] = "Inserted";
    }
    else
    {
        $response['error'] = "001";
        $response['message'] = "Failed";
    }
}

echo json_encode($response);


?>