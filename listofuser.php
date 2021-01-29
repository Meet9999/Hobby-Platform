<?php 
    include("connection.php");
    ?>


<!DOCTYPE html>
<html>
<title>HOBBIES PLATFORM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 400px) {#main {margin-left: 0}}

/* Style the container with a rounded border, grey background and some padding and margin */
.container {
  border: 2px solid #ccc;
  background-color: #000000;
  border-radius: 5px;
  padding: 16px;
  margin: 16px 0;
}

/* Clear floats after containers */
.container::after {
  content: "";
  clear: both;
  display: table;
}

/* Float images inside the container to the left. Add a right margin, and style the image as a circle */
.container img {
  float: left;
  margin-right: 20px;
  border-radius: 50%;
}

/* Increase the font-size of a span element */
.container span {
  font-size: 20px;
  margin-right: 15px;
}

/* Add media queries for responsiveness. This will center both the text and the image inside the container */
@media (max-width: 500px) {
  .container {
    text-align: center;
  }

  .container img {
    margin: auto;
    float: none;
    display: block;
  }
}

</style>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="logo.jpg" style="width:100%">
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="index.php#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ABOUT</p>
  </a>
  <?php
  if(!empty($_SESSION["user_id"])){
  ?>
  <a href="profile.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>PROFILE</p>
  </a>
  <?php
    }
  ?>
  <a href="index.php#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>PHOTOS</p>
  </a>
  <a href="signup.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user-plus w3-xxlarge"></i>
    <p>SIGNUP</p>
  </a>
  <a href="listofuser.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-list w3-xxlarge"></i>
    <p>User</p>
  </a>
  <?php
  if(!empty($_SESSION["user_id"])){
  ?>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-user w3-xxlarge"></i>
        <p>logout</p>
    </a>  
  <?php
    }
  ?>

</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="index.php" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
  </div>
</div>



<!-- Page Content -->
<div class="w3-padding-large" id="main">
  
<!--Signup content-->
   
   <br>
  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Users</h2>
    <hr style="width:200px" class="w3-opacity">

    <table border="1">
    <tr>
        <th>Full Name</th>
        <th>Contact Number</th>
        <th>Gender</th>
        <th>Date of birth</th>
        <th>Hobby</th>
        <th>Article</th>
        <th>Hobby Time</th>
        <th>Inspiration</th>
        <th>Showcase</th>
        <th>Image</th>
    </tr>
    <?php
        $query = "select * from my_profile";
        $result = mysqli_query($conn, $query);    
        while($row = mysqli_fetch_assoc($result)) 
        {
    ?>
    <tr>
        <td><?= $row["Fullname"] ?></td>
        <td><?= $row["ContactNumber"] ?></td>
        <td><?= $row["gender"] ?></td>
        <td>
            <?php 
                $birthdate = date_create($row["DateofBirth"]);
                echo date_format($birthdate,"d/m/Y");
            ?>
        </td>
        <td><?= $row["Hobby"] ?></td>
        <td><?= $row["Article"] ?></td>
        <td>
            <?php 
                $birthdate = date_create($row["hobbytime"]);
                echo date_format($birthdate,"d/m/Y");
            ?>
        </td>
        <td><?= $row["Inspiration"] ?></td>
        <td><?php if($row["Showcase"]=="1"){ echo "Yes"; }else{ echo "no"; } ?></td>
        <td>
            <?php if(!empty($row["file"])){ ?>
                <img src="uploads/<?=$row["file"]?>" style="width:100px; height:100px ">
            <?php } ?>
        </td>
    </tr>
    <?php 
    }
    ?>
</table>

   
  </div>
  


<!-- END PAGE CONTENT -->
</div>

</body>
</html>
