<?php
session_start();

if (isset($_SESSION['loggedin_user_id'])) {
  $users = $db->prepare("SELECT * FROM `users` WHERE id = :id");
  $users->bindParam("id", $_SESSION['loggedin_user_id']);
  $users->execute();
  $user = $users->fetch(PDO::FETCH_ASSOC);
  
  $userRole = $user["role"];
  $userName = $user["name"];
  $userEmail = $user["email"];
}
?>