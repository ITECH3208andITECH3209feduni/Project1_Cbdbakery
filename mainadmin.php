<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'myadmin';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
   <style>
     :root {
  --background-color: #000000;
  --color: #000000;
  --light-theme: #ffffff;
}

body {
  background-color: black;
  background-repeat: no-repeat;
  background-size: auto;
  font-family: "Mulish", sans-serif;
  background-color: var(--background-color);
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 14vh;
  text-decoration: none;

}

.btn {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 340px;
  height: 60px;
  background-color: var(--light-theme);
  cursor: pointer;
  font-size: 24px;
  color: var(--color);
  transition: all 0.3s;
  position: relative;
  text-align: center;
  overflow: hidden;
  border-radius: 5px;
  box-shadow: 0 6px 30px -10px #cccccc;
}
.btn:hover {
  transform: translateX(5px) translateY(-7px);
}

.shop-now {
  position: relative;
}
.shop-now .santa-icon {
  position: absolute;
  width: 40px;
  height: 30px;
  top: -17px;
  right: -20px;
  transform: rotate(14deg);
}
.shop-now .santa-icon img {
  width: 100%;
  height: 100%;
}

.snowflake-grid {
  display: inline-grid;
  grid-template-columns: 1fr 1fr;
  grid-auto-rows: 50px;
  gap: 5px;
  width: 100px;
  transform: scale(0.4);
}
.snowflake-grid div {
  border-radius: 5px;
}
.snowflake-grid .snowflake-item {
  position: relative;
}

.to-left {
  position: absolute;
  top: -4px;
  left: -35px;
  animation: swing 3s infinite;
}
.to-left div {
  animation: flash 3s infinite;
}

.to-right {
  position: absolute;
  top: -25px;
  right: -35px;
  animation: swing 2.5s infinite;
}
.to-right div {
  animation: flash 2.5s infinite;
}

.border-left {
  border-left: 4px solid #e6dada;
}

.border-right {
  border-right: 4px solid #e6dada;
}

.border-bottom {
  border-bottom: 4px solid #e6dada;
}

.border-top {
  border-top: 4px solid #e6dada;
}

.sub-items {
  height: 28px;
  width: 28px;
}

.m-w-15 {
  width: 15px;
}

.m-h-15 {
  height: 15px;
}

.r-270 {
  transform: rotate(270deg);
}

.r-180 {
  transform: rotate(180deg);
}

.r-90 {
  transform: rotate(90deg);
}

.pull-down {
  position: absolute;
  bottom: 10px;
  right: 10px;
}

.pull-down-right {
  position: absolute;
  bottom: 5px;
  left: 5px;
}

.pull-right {
  position: absolute;
  right: 5px;
  top: 5px;
}

.pull-left {
  position: absolute;
  left: 5px;
  top: 5px;
}

.m-3 {
  margin: 3px;
}

@keyframes swing {
  50% {
    transform: rotateZ(10deg) scale(0.4);
  }
}
@keyframes flash {
  50% {
    border-color: #485563;
  }
}

.h1{
  color: #fff;
  margin-left: 450px;
  font-family: Times;
}
     </style>


</head>
<body>
<br><br> <br><br> <br><br> <br><br> <br><br> <br><br>

<h1 style="font-family: playfree Display, serief; color:white; text-align:center;"><b>Welcome to CBD Bakery </b></h1> <br><br> 
<div class="container">

  <div class="content">
  <a href="index.php" style="text-decoration: none;"><div class="container">
 <div class="btn"> 
    
    <div class="shop-now"> Admin Page</div>

    </div>

    
      
      
</div></a>

<a href="productspage.php" class="btn">Go Back</a>
</table>






</body>
</html>
