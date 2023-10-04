<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "beauty_db");

// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}

// REGISTER
function register(){
  global $conn;

  $name = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $prenom=$_POST["prenom"];
  $email=$_POST["email"];
  $tele=$_POST["tele"];
  $adrs=$_POST["adrs"];

  if(empty($name) || empty($username) || empty($password)|| empty($prenom)|| empty($email)|| empty($tele) || empty($adrs) ){
    echo "Please Fill Out The Form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM personne WHERE username = '$username'");
  if(mysqli_num_rows($user) > 0){
    echo "Username Has Already Taken";
    exit;
  }

  $query = "INSERT INTO personne VALUES('', '$name','$prenom', '$email','$tele','$password','$username','$adrs')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
 
}

// LOGIN
function login(){
  global $conn;

  $username = $_POST["username"];
  $password = $_POST["password"];

  $user = mysqli_query($conn, "SELECT * FROM personne WHERE username = '$username'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if($password == $row['password']){
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["ID_Pesonne"];
      $_SESSION["username"] = $row["username"];

    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>
