<?php
$FirstName = filter_input(INPUT_POST, 'fname');
$LastName = filter_input(INPUT_POST, 'lname');
$Email = filter_input(INPUT_POST, 'email');
$Age = filter_input(INPUT_POST, 'age');
$Password = filter_input(INPUT_POST, 'password');

if (!empty($FirstName)&&!empty($LastName)){
    if (!empty($Password)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "signupdb";

        $conn = new mysqli ($host , $dbusername , $dbpassword , $dbname);

        if (mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{
            $sql1 = "INSERT INTO `usersinfo` (`FirstName`, `LastName`, `Email`, `Age`, `Password`) VALUES ('$FirstName', '$LastName',' $Age', '$Email', '$Password');";
            $sql2 = "INSERT INTO `userscreds` (`Email`, `Password`) VALUES ('$Email', '$Password');";
            if ($conn->query($sql1) && $conn->query($sql2)){
                echo "New record is inserted sucessfully";
            }else{
                echo "Error:".$sql1."||||||||||||||||".$sql2."<br>".$conn->error;
            }
            $conn->close();
        }
    }
    else{
        echo "Password should not be empty";
        die();
    }
}else{
    echo "Name fields should not be empty";
    die();
}
?>