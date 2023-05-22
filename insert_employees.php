<?php
require_once "conn.php";

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

if($name != "" && $email != "" && $phone != "" && $address !=""){
    $sql = "INSERT INTO employees_info (`name`,`email`,`phone`,`address`) VALUES ('$name','$email','$phone','$address')";
    if(mysqli_query($conn,$sql)){
       if(nameCheck($name) != "" && emailCheck($email) != ""){
        echo "Fail data!";
       }else{
        header("location: show_employees.php");
       }
    }else{
        echo "Data Empty";
    }
}else{
    echo "Must Add data";
}


function nameCheck($name){
    if(strlen($name) >= 6){
        $bol = preg_match('/^[\w]+$/',$name);
        return $bol;
    }else{
        return false;
    }
}
function emailCheck($email){
    if(strlen($email) >= 15){
        $bol = preg_match('/[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,4}+$/',$email);
        return $bol;
    }else{
        return false;
    }
}
// function passwordCheck($password){
//     if(strlen($password) >= 15){
//         $bol = preg_match('/(?=.*[a-z])(?=.*[A-Z](?=.*(_|[^\w]))(?=.*[\d]))/',$password);
//         return $bol;
//     }else{
//         return false;
//     }
// }

?>