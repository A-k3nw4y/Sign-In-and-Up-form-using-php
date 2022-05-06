<?php
$Email = filter_input(INPUT_POST, 'email');
$Password = filter_input(INPUT_POST, 'password');

if (!empty($Email)&&!empty($Password)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "signupdb";

        $conn = new mysqli ($host , $dbusername , $dbpassword , $dbname);

        if (mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }else{
            $sql = "SELECT * FROM userscreds WHERE Email='$Email' AND Password='$Password'";
            if ($conn->query($sql)){
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['Email'] === $Email && $row['Password'] === $Password) {
                        echo "Logged in!";}
                    else{
                        echo "Username OR password is incorrect";
                    }
            }else{
                echo "Username OR password is incorrect";
            }
            $conn->close();
        }}
}else{
    echo "Please fill in the form";
    die();
}
?>