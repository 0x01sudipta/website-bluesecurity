<?php
$insert = FALSE;


if(isset($_POST['name'])){
    
//initializing variables to connect the database
$server = "localhost";
$username = 'root';
$password = 'Sudipta@1';
//coneecting the database
$connection = mysqli_connect($server, $username, $password);
//checking if database is successfully connected or not
if(!$connection){
    die("connection to this db failed due to ".mysqli_connect_error());
}
//echo "Success connecting to the db!";

//create new variable and assign values which is coming from post method so that they can be passed into database
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$comment = $_POST['comment'];
//inserting values into database
$sql = "INSERT INTO `makaut`.`makaut` (`name`, `email`, `phone`, `comment`, `dt`) VALUES ('$name', '$email', '$phone', '$comment', current_timestamp());";

//echo $sql;

if($connection->query($sql) == true){
    //echo "Succesfully inserted";
    $insert = TRUE;
}
else{
    echo "ERROR: $sql <br> $connection->error";
}
//close the connection
$connection->close();

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact @ Blue Security</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>/* all link no underline  */
        a {
            text-decoration: none;
          }
    </style>
</head>

<body>
<nav>
        <div class="logo">
            <a href="index.html"><img src="logo.png" alt="Blue Security Logo" height="40"></a>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h1> 
            <a href="index.html" style="color: aliceblue;">Blue Security</a></h1>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="index.html#service">Services</a></li>
            <li><a href="index.html#about">About</a></li>
            <li><a href="contact.php">Contact&nbsp;&nbsp;</a></li>
        </ul>
    </nav>
    <br><br><br>







    <h2 class="contentt2">Contact Us</h2>
    <hr>
    <p>
        <?php
        if ($insert == TRUE){
            echo "<h1>Email has sent!</h1>";
        }        
        ?>        
        <form action="contact.php" method="post"><br>
            <input type="text" name="name" id="name" placeholder="Full Name"><br><br>
            <input type="email" name="email" id="email" placeholder="Email Address"><br><br>
            <input type="phone" name="phone" id="phone" placeholder="Phone number without +91"><br><br>
            <textarea name="comment" id="comment" cols="30" rows="4" placeholder="Write your message here...">
	    </textarea><br><br>
            <button class="btn">Send</button>
            
        </form>
    </p>




    
    <section>
        <br><br><br><br><br>
    </section>

    <footer>
        <p>&copy; 2023 Blue Security | Developed by <a href="https://hackerrank.com/0x01sudipta" target="_blank">Sudipta</a></p>
    </footer>
</body>

</html>
