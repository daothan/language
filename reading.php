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
			<div class="welcome" >STUDYING ENGLISH</div>
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

	<?php 
		$reading = "SELECT parent_id FROM reading";
		$query = mysqli_query($conn,$reading);

		if(mysqli_num_rows($query) > 0){
			while ($id_reading = mysqli_fetch_array($query)){
				$parent_id = $id_reading['parent_id'];
			}
		}
	 ?>

	<div class="container">
		<form method="post" action="search.php?id=<?php echo $parent_id; ?>">
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



	<!-- Show content Reading -->
	<?php 
		$reading= "SELECT id, parent_id, tittle, image, name_pic, credit_pic, content, origin_url FROM reading";
		$query = mysqli_query($conn,$reading);

		$id=$_GET['id'];

		if(mysqli_num_rows($query)>0){
			while($result_reading=mysqli_fetch_array($query)){
				if($result_reading['id']==$id){?>

					<div class="container-fluid inline text-center">    
					    <div class="row content">

						    <div class="col-sm-2 sidenav">
						    </div>

						    <div class="col-sm-8 text-left"> 

						      	<div class="col-sm-8 col-xs-6">
						      		<div class="headline">
						      			<h1 class="page-header"><?php echo $result_reading['tittle']; ?></h1>
						      		</div>
					    	
					      			<div class="photo_image info">	
					      				<img class="img-responsive center-block img-rounded" src="<?php echo $result_reading['image']; ?>">
					      			</div>
				       				
				        			<div class="photo_caption table">
				        				<?php 
				        					$photo_caption=$result_reading['name_pic'];
				        					$myfile = fopen("$photo_caption", "r") or die("Unable to open file!");
											echo fread($myfile,filesize("$photo_caption"));
											fclose($myfile);
				        				?>
				        			</div>

				       				<div class="photo_credit table">
				       				 	<em>
				       				 		<?php 
				       				 			$photo_credit=$result_reading['credit_pic'];
				       				 			$myfile = fopen("$photo_credit", "r") or die("Unable to open file!");
												echo fread($myfile,filesize("$photo_credit"));
												fclose($myfile);
				       				 		?>
				       				 	</em>

				       				</div>

				       				<hr>

								    <text>
								    <?php 
								    	$content=$result_reading['content'];
								      	echo readfile("$content");
								    ?>
								    </text>

								    <br/><hr/><br/><br/>

								    <a href="<?php echo $result_reading['origin_url'];?>" class="btn-link btn-success pull-right" target="_blank"> View Source</a><br/><br/>
									
									<div class="vr"> &nbsp; </div>


								</div>
			<?php 
				}
			
			}
		}
	 ?>
			

	<!-- End show content Reading -->


	<!-- Show more article -->

							<div class="col-sm-4">
								<div class="headline1">
									<h2>MORE ARTICLE</h2>
								</div>

							<?php  
								$sql= "SELECT id, parent_id, tittle, image, name_pic, credit_pic, content, origin_url FROM reading";
								$query = mysqli_query($conn,$sql);
								$a=0;

									if(mysqli_num_rows($query)>0){ 
										while($result_reading=mysqli_fetch_array($query)){
											if($result_reading['id']!=$id){
												if($a<5){
													$a++;?>	
														
													<div class="more-article">												
														<a href="reading.php?id=<?php echo $result_reading['id']; ?>">
															<img class="related-image" src="<?php echo $result_reading['image']; ?>"  >
															<?php echo $result_reading['tittle']; ?>
														</a>
													</div>
								<?php			}	
								  			}
										}
									}
								?>
							</div>
   	 					</div>
					</div>
				</div>
				
	<!-- End show more article -->		




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