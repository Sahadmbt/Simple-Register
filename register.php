<?php

include 'connect.php';

if(isset($_POST['signup'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $chechEmail="SELECT * from users where email='$email'";
    $result=$conn->query($checkEMmail);
    if($result->num_rows>0){
        echo "EMAIL ADDRESS ALREDY EXISTS !";
    }
    else{
        $insertQuery="INSERT INTO users(firstName,lastName,email,password)
                        VALUES ('$firstName','$lastName','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location:index.php");
            }
            else{
                echo"ERROR :"$conn->error;
            }
    }


}

if(isset($_POST['signin'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM users WHERE email='$email' and password='$password'  ";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location: homepage.php");
        exit();

    }
    else{
        echo"NOT FOUND, INCORRECT EMAIL OR PASSWORD";
    }


}

?>