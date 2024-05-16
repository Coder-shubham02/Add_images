<?php
session_start();
$msg="";

// Function to sanitize input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Handle form submission
if( isset($_POST['sbtn']) ){

    // Validate name field
    if( empty($_POST['name'])) {
        $msg.="Name is required<br>";
    }else{
        $name=test_input($_POST['name']);
        // check if name only contains letters and whitespace
        if(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $msg.="Only letters allowed in Name<br>";
        }
    }

    // Handle image upload
    $image = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $imgsize = $_FILES['image']['size'];
    $arr = explode(".", $image);
    $ext = strtolower(end($arr));
    $allowedExt = array("jpg", "jpeg", "png", "webp");

    // Check if the uploaded file has allowed extension
    if (in_array($ext, $allowedExt)) {
        // Check for upload errors
        if ($error === UPLOAD_ERR_OK) {
            // Check if file size is within limits
            if (($imgsize / 1024 / 1024) < 8) {
                // Define path for saving the file (using original filename)
                $path = 'images/' . $image;
                // Move the uploaded file to the specified path
                if (move_uploaded_file($tmp_name, $path)) {
                    // File uploaded successfully
                } else {
                    $msg.= "Error in uploading file";
                }
            } else {
                $msg.= "File size should be less than 8MB";
            }
        } else {
            $msg.= "File upload error: " . $error;
        }
    } else {
        $msg.= "Invalid file format";
    }

    // If no errors, proceed to database insertion
    if($msg==""){
        $date=date('y-m-d');
        $con=mysqli_connect("localhost","root","","product");
        $sql = "INSERT INTO `products` (`image`, `name`) VALUES ('$image' , '$name')";
        if(mysqli_query($con,$sql)){
            $msg="Successfully";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}

?>



<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <title>Add product</title>
	<style>
		.animated-form {
			border: 2px solid #ccc;
			border-radius: 5px;
			padding: 20px;
			transition: all 0.3s ease;
		}

		.animated-form:hover {
			border-color: #007bff;
			box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
		}
		.animated-button {
			animation: pulse 1s infinite;
		}

		@keyframes pulse {
			0% {
				transform: scale(1);
			}
			50% {
				transform: scale(1.05);
			}
			100% {
				transform: scale(1);
			}
		}
		.animated-heading {
			text-align: center;
			animation: rainbow 2s linear infinite alternate;
		}

		@keyframes rainbow {
			0% {
				color: red;
			}
			25% {
				color: orange;
			}
			50% {
				color: yellow;
			}
			75% {
				color: green;
			}
			100% {
				color: blue;
			}
		}
		.animated-heading {
			text-align: center;
			color: #fff;
			padding: 10px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}
		/* Add this CSS to your main.css file or within <style> tags in your HTML */
		.navbar-nav li.nav-item a.nav-link{
			font-size: 18px;
			margin: 0 10px;

		}
		.navbar-nav.ml-auto li.nav-item a.nav-link {
			padding: 0.5rem 1rem;
			transition: color 0.3s ease;
			border: 1px solid #ffc107;
			border-radius: 10%;
			
		}
		.navbar-nav.ml-auto li.nav-item a.nav-link:hover {
			color: #ffc107; /* Change color on hover */
			 /* Add border on hover */
			background-color: rgba(255, 193, 7, 0.1); /* Add background color on hover */
		}
		
		
	</style>
</head>
<body>
    <!-- nav section -->
    <div class="nav-wrapper">
		<nav class="navbar navbar-expand-lg navbar-dark">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link text-white" href="#">About <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="#">Service</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="#">Status</a>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link text-white" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="logout.php">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="container">
		<div class="row my-5">
			<div class="col-md-6 mx-auto my-5 pb-4">
				<form class="animated-form mb-5" action="" method="post" enctype="multipart/form-data">
					<h2 class="animated-heading mb-5">Add Product</h2>
					<p style="color:green;"><?php echo $msg; ?></p>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
					</div>
					<div class="form-group">
						<label for="image">Select Image</label>
						<input type="file" class="form-control-file" name="image" required>
					</div>
					<input type="submit" name="sbtn" value="Submit" class="btn btn-primary animated-button">
				</form>
			</div>
		</div>
	</div>
	

    <script src="js/jquery.3.7.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
