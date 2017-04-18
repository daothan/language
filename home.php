<!DOCTYPE html>
<html>
<head>
	<title>STUDY ENGLISH</title>

	<!-- Insert CSS and JS-->
	 <link rel="stylesheet" type="text/css" href="css/languagecss.css">
	 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  
</head>
<body>

<!-- Category -->

	<div class="container">
			<!-- Panel -->
			<div class="panel-heading">
				<p class="text-danger">
					<span class="glyphicon glyphicon-user">
						STUDYING ENGLISH
						<span class="glyphicon glyphicon-pencil">
						</span>
					</span>
				</p>
			</div>
			<!-- End Panel -->
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">

			<!-- //Connect DB -->
			 <?php 
				$servername="localhost";
				$username = "root";
				$password = "";
				$dbname = "LANGUAGE";

				//Create connection
				$conn= mysqli_connect($servername, $username, $password, $dbname);
				//Check connection
				if (!$conn){
					die ("Connection failed").mysql_connect_error();
				}

				$sql = "SELECT id, catename from category";
				$query = mysqli_query($conn,$sql);

				if (mysqli_num_rows($query) > 0) {

					//Ouput data for each row
					while ($result = mysqli_fetch_array($query)){ 
						if($result['id']!=6){?>

						<li divider-vertical>
							<a href="detail.php?id=<?php echo $result['id'];?>">
								<h3>
									<?php 
										echo $result['catename'];
									 ?>
								</h3>
							</a>
						</li>
						<?php 
						}
					}
				}
			?>
		</div>
	</div>

	<!-- End category -->

	<!-- PANEL -->
	<div class="container">
		<marquee onmouseover="this.stop()" onmouseleave="this.start()">
			<div class="welcome"> STUDYING ENGLISH</div>
		</marquee>
	</div>
	<!-- END PANEL -->

	<!--Search-->

	<?php 

	$search_key = $nameerr = $name="";

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$search_key = $_POST['search'];

		if(empty($search_key)){
			$nameerr = "Please enter something";
		}
	} 
	?>

	<div class="container">
		<form method="post" action="search.php?id=1">
			  <input type="text" name="search" placeholder="Search.." >
			  <input type="submit" name="search1" value="Search">
			  	<span class="error">   <?php echo $nameerr; ?></span>
		</form>			
	</div>
	<!-- End search -->


	<!-- IMAGE PANEL -->
	<div class="container">
		<div class="jumbotron text-center jumbohome" style="">
			<?php 
				$panel = "SELECT  catename from category where id=6";
				$query = mysqli_query($conn,$panel);

				if (mysqli_num_rows($query) > 0) {
					while ($result_panel = mysqli_fetch_array($query)){?>
				
						<div class="content_detail">		
							<a >
								<img class="container img" src="./<?php echo $result_panel['catename'] ?>" >
							</a>				
					 	</div>
			<?php 								
					}
				}
		    ?>

		</div>
	</div>
	<!-- END PANEL IMAGE -->

	<!-- Search Keywords -->
	<?php 

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$search_key = $_POST['search'];

		if(!empty($search_key)){
			$name = $search_key;?>
			<span class="keyword">
				<?php echo "Results of key '$name' are: "; ?>				
			</span>
		<?php	}
		
		}
	 ?>
	<!-- End search keywords -->
	
	<!-- CONTENT -->

	<div class="container">

		<!-- Lastest Release Listening -->
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2>Lastest Release Listening</h2>
			</div>

			
			<div class="panel-body">
				<div class="container-fluid inline ">
					<!-- Select data from database name listening -->
				<?php 
					$listening = "SELECT id, parent_id, url, tittle , origin_url from listening";
					$query = mysqli_query($conn,$listening);
					$a=0;	

					if (mysqli_num_rows($query) > 0) {
						while ($result_listening = mysqli_fetch_array($query)){
							$parent_id=$result_listening['parent_id'];
							if($a<6){ /*Limmited number of rows show in home.php just six laster update database */

							$a++;?>
							<!-- Show video -->
							<div class="content_detail">
							
								<div class="embed-responsive embed-responsive-16by9">	
									<video height="234" controls>
										<source src="<?php echo $result_listening['url']; ?>" type="video/mp4" allowfullscreen>
									</video>
								</div>

								<p style="width:300px;">
									<a href="listening.php?id=<?php echo $result_listening['id']; ?>">
										<?php echo $result_listening['tittle']; ?>
									</a>
								</p>	
												
		 					</div>
							<!-- End Show Video -->
				<?php   							
							}
						}								
					}
				?>
				 	
				</div>
				<a href="detail.php?id=<?php echo $parent_id; ?>" class="btn btn-lg btn-success pull-right">Click here to view more Listening </a>
			</div>

		</div>
		<!-- End Lastest Release Listening -->

		<!-- Lastest Release Reading -->
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2>Lastest Release Reading</h2>
			</div>

			
			<div class="panel-body">
				<div class="container-fluid inline">

					<!-- Select data from database name detail -->
					<?php 
						
						$reading= "SELECT id, parent_id, tittle, image, name_pic, credit_pic, content, origin_url FROM reading";
						$query = mysqli_query($conn,$reading);
						$a=0;		

						if (mysqli_num_rows($query) > 0) {
							//Ouput data for each row
							while ($result_reading = mysqli_fetch_array($query)){
								$parent_id=$result_reading['parent_id'];

								if($a<6){?><!-- Limmited number of rows show in home.php just six laster update database-->
					 		<!-- End select data -->
								<?php 
									
									$a++;?>
									<div class="content_detail">	
										<a href="reading.php?id=<?php echo $result_reading['id'];?>">
											<!-- View Imagine -->
											<img src="<?php echo $img=$result_reading['image']; ?>" style="height:234px; width:300px;" >
											<p style="width:300px;">
												<a href="reading.php?id=<?php echo $result_reading['id'];?>">
													<?php echo $result_reading['tittle']; ?>
												</a>
											</p>	
											<!-- End Show Imagine -->
										</a>				
					 				</div>
							 <?php }
								
															
							}
						}

						?>
					 	
				</div>
				<a href="detail.php?id=<?php echo $parent_id; ?>" class="btn btn-lg btn-success pull-right">Click here to view more Reading </a>
			</div>
		</div>
		<!-- End Lastest Release Reading -->

		<!-- EXAM -->
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2>Exam</h2>
			</div>

			
			<div class="panel-body">
				<div class="container-fluid inline">

					<!-- Select data from database name detail -->
					<?php 
						
						$exam= "SELECT id, parent_id, tittle, content FROM exam";
						$query = mysqli_query($conn,$exam);
						$a=0;		

						if (mysqli_num_rows($query) > 0) {
							//Ouput data for each row
							while ($result_exam = mysqli_fetch_array($query)){
								$parent_id = $result_exam['parent_id'];
								if($a<6){?><!-- Limmited number of rows show in home.php just six laster update database-->
					 		<!-- End select data -->
								<?php 
									$a++;?>
									<div class="content_detail">	
										<p class="bg-info">
											<h2 class="text-danger">Updating.... </h2>
										</p>			
					 				</div>
						<?php 	}							
							}
						}
						?>
					 	
				</div>
				<a href="detail.php?id=<?php echo $parent_id; ?>" class="btn btn-lg btn-success pull-right">Click here to view more Exam </a>
			</div>
		</div>
		<!-- End EXAM -->

		<!-- Ielts Bandscore -->

		<div class="panel panel-primary">
			
			<div class="panel-heading">
				<h2>Ielts Bandscore</h2>
			</div>

			
			<div class="panel-body">
				<div class="container-fluid inline">
					<div class="row">
					    <div class="col-sm-8 col-xs-6">
					    	<!-- Select data from database name detail -->
							<?php 
								$bandscore = "SELECT id, parent_id, tittle, content from bandscore";
								$query1 = mysqli_query($conn,$bandscore);

								if (mysqli_num_rows($query1) > 0) {

									//Ouput data for each row
									while ($result_bandscore = mysqli_fetch_array($query1)){ 
									$parent_id =$result_bandscore['parent_id'];
							 ?>
							 <!-- End select data -->

						 		<?php 
						 			if($result_bandscore['id']==1){?>
							 		
								 		<h4 class="text-warning">
							 				<?php  echo $result_bandscore['tittle']; ?>
								 		</h4>

								 		<p>
									 		<?php echo $result_bandscore['content']; ?>
							 			</p>

							 			<p class="text-danger">
									 		<a href="detail.php?id=5">Click to continue reading................</a>
							 			</p>

							 			<?php } ?> <!-- end if -->

							 <?php 								
									}
								}
								 ?>	
					  
						</div>
					</div>
				 	<a href="detail.php?id=<?php echo $parent_id; ?>" class="btn btn-lg btn-success pull-right">Click here to view more informations</a>
				</div>
			</div>
		<!-- End Ielts Bandscore -->
		</div>
				
	</div>

	<!-- Footer -->
	<div class="container">
		<div class="panel-footer">
				<p>
					@ Studying Language
				</p>
		</div>		
	</div>
	<!-- End Footer -->

</body>
</html>