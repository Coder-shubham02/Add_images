<!-- index.php  -->
<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "product";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT image, name FROM products"; // Modify this query according to your database schema
// $result = $conn->query($sql);
$result=mysqli_query($conn, $sql);

?>



<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<!-- font-awesome-->
	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
	
	<title>index</title>
	<style>
		.card {
			position: relative;
		}

		.download-icon {
			position: absolute;
			top: 5px;
			right: 5px;
			display: none;
			/* Initially hide the icon */
			/* color: red; */
		}

		.card:hover .download-icon {
			display: block;
			/* Show the icon on hover */
			font-size: 20px;
		}

		.card1 {
			height: 300px;
			width: auto;
			object-fit: cover;
			transition: transform 0.5s ease-in-out;
		}
		.card:hover .card1 {
			transform: scale(1.1); /* Increase the scale to 1.1 when hovered over */
		}

		.fullscreen-img {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			object-fit: contain;
			/* Preserve aspect ratio */
			z-index: 9999;
			background-color: rgba(0, 0, 0, 0.9);
			/* Semi-transparent background */
			cursor: pointer;
		}
		.card {
            position: relative;
            overflow: hidden;
        }
		.pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
        transition: background-color 0.3s;
    }

    .pagination a.active {
        background-color: #007bff;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
        

	</style>
</head>

<body>
	<!-- nav section -->
	<div class="nav-wrapper">
		<nav class="navbar navbar-expand-lg navbar-dark py-4">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link text-dark" href="index.php">Home <span
									class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="#">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="#">Service</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="#">Stauts</a>
						</li>
					</ul>

					<div class="text-center pt-1 mb-3 pb-1 ml-auto">
						<a class="bg-primary py-2 px-2 text-white add-button" href="login.php">
							<i class="fa fa-plus-circle mr-1"></i>Add Button
						</a>
					</div>

				</div>
			</div>
		</nav>
		<!--header section-->
		<div class="header-wrapper py-5">
        <div class="container">
            <div> <h1>Images</h1></div>
            <div class="col-md-12">
                <div class="row">
                    <?php
                    // Pagination parameters
                    $itemsPerPage = 8; // Number of items per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

                    // Calculate the SQL LIMIT starting index
                    $startIndex = ($page - 1) * $itemsPerPage;

                    // Execute the SQL query with LIMIT
                    $sql = "SELECT image, name FROM products LIMIT $startIndex, $itemsPerPage";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-sm-3">
                                <div class="card my-3">
                                    <?php if (isset($row['image'])) { ?>
                                        <img class="card card1" src="<?php echo 'images/' . $row['image'] ?>" alt="Card image cap" onclick="toggleFullScreen(this)">
                                    <?php } else { ?>

                                    <?php } ?>
                                    <div class="card">
                                        <p class="card-name text-center text-danger h4"><?php echo $row["name"] ?></p>
                                    </div>
                                    <a class="download-icon" href="<?php echo 'images/' . $row['image'] ?>" download><i class="fa fa-download"></i></a>
                                </div>
                            </div>
                        <?php }
                    } else {
                        echo '<p>No images found.</p>';
                    }
                    ?>
                </div>
                <?php
               
			   // Pagination links
			   if ($result->num_rows > 0) {
				   $sql = "SELECT COUNT(*) AS total FROM products";
				   $result = $conn->query($sql);
				   $row = $result->fetch_assoc();
				   $totalItems = $row['total'];
				   $totalPages = ceil($totalItems / $itemsPerPage);
			   
				   echo '<div class="pagination">';
				   
				   // Previous button
				   if ($page > 1) {
					   $prevPage = $page - 1;
					   echo "<a href='index.php?page=$prevPage'>&laquo; Previous</a>";
				   } else {
					   echo "<span class='disabled'>&laquo; Previous</span>";
				   }
			   
				   // Page numbers
				   for ($i = 1; $i <= $totalPages; $i++) {
					   if ($i == $page) {
						   echo "<a class='active' href='index.php?page=$i'>$i</a>";
					   } else {
						   echo "<a href='index.php?page=$i'>$i</a>";
					   }
				   }
			   
				   // Next button
				   if ($page < $totalPages) {
					   $nextPage = $page + 1;
					   echo "<a href='index.php?page=$nextPage'>Next &raquo;</a>";
				   } else {
					   echo "<span class='disabled'>Next &raquo;</span>";
				   }
				   echo '</div>';
			  	}
			   
			   
                ?>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

<script src="js/jquery.3.7.min.js" defer></script>
<script src="js/bootstrap.bundle.min.js" defer></script>
<script src="js/main.js" defer></script>

</body>
</html>