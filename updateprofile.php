<?php 
    include("connection.php");
    if(empty($_SESSION["user_id"])){
        header("Location: login.php");
    }
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $birthdate = date_create($_POST['birthdate']);
        $birthdate = date_format($birthdate,"Y/m/d");
        $hobby = $_POST['hobby'];
        $mobile=$_POST['mobile'];
		$article = $_POST['article'];
		$date = $_POST['date'];
        $inspiration = $_POST['inspiration'];
        
        if(!empty($_FILES["file"]["name"]))
        {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $file =$_FILES["file"]["name"];
        }
        else
        {
            $file= $_POST['oldfile'];
        }
		if($_POST['Showcase']=="on"){ $Showcase = '1';}else{$Showcase = '0';}
        $date = date_create($_POST['date']);
		$date = date_format($date,"Y/m/d");;
        $Profile_ID = $_SESSION["user_id"];
        if(!empty($fullname) && !empty($gender) 
        && !empty($birthdate) && !empty($hobby)
        && !empty($article) && !empty($date)
        && !empty($inspiration) && !empty($date)
        && !empty($file)
        )
		{
            if(!empty($_FILES["file"]["name"]))
            {               
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);    
            }

            $query = "UPDATE `my_profile` SET `Fullname`='$fullname',`gender`='$gender',
            `DateofBirth`='$birthdate',`ContactNumber`='$mobile',`Hobby`='$hobby',
            `Article`='$article',`hobbytime`='$date',
            `Inspiration`='$inspiration',`Showcase`='$Showcase',`file`='$file'
            WHERE `Profile_ID`='$Profile_ID'";
            //echo $query; exit;
            if(mysqli_query($conn, $query))
            {
                header("Location: profile.php");
            }else{
                header("Location: updateprofile.php");
            }
        }
        else
		{
			echo "Please enter some valid information!";
		}
	}

    $Profile_ID = $_SESSION["user_id"];
    $query = "select * from my_profile where Profile_ID='$Profile_ID'";
    $row = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($row);

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
  <a href="profile.php" class="w3-bar-item w3-button w3-padding-large w3-black">
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
    <h2 class="w3-text-light-grey">Edit Profile</h2>
    <hr style="width:200px" class="w3-opacity">
    
    <TABLE BORDER="0">
<form method="post"  enctype="multipart/form-data">
<tr>
<td> <li>Full Name:- </li></td>
<td>
<input type="text"  name="fullname" value="<?= $row["Fullname"] ?>">
</td>
</tr>
<tr>
<td> <li>Contact Number:- </li></td>
<td>
<input type="number"  name="mobile" value="<?= $row["ContactNumber"] ?>">
</td>
</tr>
<tr>
<td><li> Gender:- </li></td>
<td>
<input type="radio"  name="gender" value="Male" <?php if($row["gender"]=="Male"){ echo "checked"; }  ?> >Male
<input type="radio"  name="gender" value="Female" <?php if($row["gender"]=="Female"){ echo "checked"; }  ?> >Female
</td>
</tr>
<tr>
<td><li> Date of birth:- </li></td>
<td>
<?php 
    $birthdate = date_create($row["DateofBirth"]);
?>
<input type="date" name="birthdate" value="<?= date_format($birthdate,"d/m/Y")?>">
</td>
</tr>
<tr>
<td><li> Hobby:- </li></td>
<td>
<textarea name="hobby" rows="3" cols="50" ><?= $row["Hobby"] ?></textarea>
</td>
</tr>

<tr>
<td><li> Article:- </li></td>
<td>
<textarea Name="article" rows="3" cols="50" ><?= $row["Article"] ?></textarea>
</td>
</tr>

<tr>
<td><li> Since when you developed the hobby:- </li></td>
<td>
<?php 
    $birthdate = date_create($row["hobbytime"]);
?>

<input type="date" id="birthday" name="date" value="<?= date_format($birthdate,"d/m/Y") ?>">
</td>
</tr>


<tr>
<td><li> Their Inspiration:- </li></td>
<td>
<input type="text"  name="inspiration" value="<?= $row["Inspiration"] ?>">
</td>
</tr>


<tr>
    <td><li> Showcase:- </li></td>
    <td>
    <input type="checkbox"  name="Showcase" <?php if($row["Showcase"]=="1"){ echo "checked"; } ?> >
    </td>
</tr>
<tr>
    <td><li> Image </li></td>
    <td>
        <input type="file"  name="file" >
        <input type="hidden"  name="oldfile" value="<?= $row["file"] ?>" >
    </td>
</tr>


<td>
<center><input type="submit" value="Submit" class="right"></center>
</td>

</form>


   
  </div>
  


<!-- END PAGE CONTENT -->
</div>

</body>
</html>
