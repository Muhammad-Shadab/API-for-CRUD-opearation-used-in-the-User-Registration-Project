<?php

    require 'connection.php';
    $id = $_REQUEST['id'];

    $username = $_POST['username'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address =  $_POST['address'];

    $check_user_available = "SELECT * FROM user WHERE id = '$id' ";
    $available_query = mysqli_query($con, $check_user_available);

    if(mysqli_num_rows($available_query) > 0)
    {
        $updateUsername = "UPDATE user set username = '$username' WHERE id = '$id' ";
        $updateAge = "UPDATE user set age = '$age' WHERE id = '$id' ";
        $updatePhone = "UPDATE user set phone = '$phone' WHERE id = '$id' ";
        $updateEmail = "UPDATE user set email = '$email' WHERE id = '$id' ";
        $updatePassword = "UPDATE user set password = '$password' WHERE id = '$id' ";
        $updateAddress = "UPDATE user set address = '$address' WHERE id = '$id' ";

        $update_query1 = mysqli_query($con, $updateUsername);
        $update_query2 = mysqli_query($con, $updateAge);
        $update_query3 = mysqli_query($con, $updatePhone);
        $update_query4 = mysqli_query($con, $updateEmail);
        $update_query5 = mysqli_query($con, $updatePassword);
        $update_query6 = mysqli_query($con, $updateAddress);

        if( ($update_query1 > 0) && ($update_query2 > 0) && ($update_query3 > 0) && ($update_query4 > 0) && ($update_query5 > 0) && ($update_query6 > 0) )
        {
            $response['error'] = "000";
            $response['message'] = "Update Success";
        }
        else
        {
            $response['error'] = "001";
            $response['message'] = "Updatation Failed";
        }
    }
    else
        {
            $response['error'] = "001";
            $response['message'] = "User not Found";
        }

        echo json_encode($response);

?>
