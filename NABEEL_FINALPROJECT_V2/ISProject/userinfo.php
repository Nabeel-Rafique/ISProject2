
<?php 
require 'connection.php';
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "isproject";
$errors = array();

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

	if ($con) {
		// code...
	echo "Connection Successful";
	}
	else {
		// code...
		echo "Not Successful";
	}

if(isset($_POST['email'])){

    
    $email_check = "SELECT * FROM userinfo2 WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_query($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        
        
        $insert_data = " insert into emailinfo2 (email) values ('$email')";;
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Welcome to The Funding Network";
            $message = "Welcome and Thank you for Joining the Funding Network";
            $sender = "From: nabz.rafique@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Thank You for Joining Us";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
               
                header('location: index.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}


header('location:index.php');


?>

