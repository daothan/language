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
		$id=$_GET['id'];
	 ?>
	<div class="container">
		<form method="post" action="search.php?id=<?php echo $id; ?>">
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

	<!-- CONTAINER -->
	<div class="container">

		<div class="panel panel-primary">

			<!-- GET NAME DETAIL -->
		
			<div class="panel-heading">
					<?php 
						$id = $_GET['id'];

						if($id==1){?>
							 <meta http-equiv="refresh" content="1; url=home.php">
						        <script type="text/javascript">
						            window.location.href = "home.php"
						        </script>
						<?php  
						}else{
							$detail = "SELECT id,catename from category";
							$query = mysqli_query($conn,$detail);

							if (mysqli_num_rows($query) > 0) {

							//Ouput data for each row
								while ($result_detail = mysqli_fetch_array($query)){?>
									<h2><?php if($result_detail['id']==$id){echo $result_detail['catename'];} ?></h2>
					<?php 
								}
							} 
						}
					?>
			</div>

			<!-- END GET NAME  -->
			
			<div class="panel-body">
				<div class="container-fluid inline">
					
					<!-- Print Listening tittle if parent_id ==2 -->
					<?php 
					if($_GET['id']==2){
						
						$listening = "SELECT id, parent_id, url,tittle , origin_url FROM listening";
						$query = mysqli_query($conn,$listening);

						if(mysqli_num_rows($query) > 0){
							while($result_listening = mysqli_fetch_array($query)){?>

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

					<?php	}
						}
					}
					?>		

				
					<!-- Print Listening tittle if parent_id ==2 -->


					<!-- Print Reading tittle if parent_id==3 -->
					<?php 
					if($_GET['id']==3){

						$reading= "SELECT id, parent_id, tittle, image, name_pic, credit_pic, content, origin_url FROM reading";
						$query = mysqli_query($conn,$reading);		

						if (mysqli_num_rows($query) > 0) {
							while ($result_reading = mysqli_fetch_array($query)){?>

								<div class="content_detail">	

									<a href="reading.php?id=<?php echo $result_reading['id'];?>">
										<!-- View Imagine -->
											<img src="<?php echo $img=$result_reading['image']; ?>" style="height:234px; width:300px;" >
											<p style="width:300px;">
												<a href="reading.php?id=<?php echo $result_reading['id'];?>"><?php echo $result_reading['tittle']; ?>
												</a>
											</p>	
										<!-- End Show Imagine -->
									</a>				
				 				</div>

					<?php 		}
								
							}							
						}	
					?>
					<!-- End print Reading tittle -->

					<!-- Print Exam where parent-id ==4 -->

					<?php 
						if($_GET['id']==4){
							
							$exam="SELECT id, parent_id, tittle, content FROM exam";
							$query=mysqli_query($conn,$exam);

							if(mysqli_num_rows($query) > 0 ){
								while($result_exam = mysqli_fetch_array($query)){?>
									<div class="content_detail">
										<p class="bg-info">
											<a href="home.php">
												<h2>
													<?php echo $result_exam['content']; ?>
												</h2>
											</a>
										</p>
									</div>
								
					<?php		}
							}
						}
					 ?>


					<!-- PRINT Bandscore and respontaneous score parent_id==5-->
					<?php 
					if($_GET['id']==5){	
					 ?>
					 <!-- End select data -->
					<div class="content_detail">		
							<!-- Print content -->
						<div class="row">

						    <div class="col-sm-8 col-xs-6">
								<?php 

								$bandscore = "SELECT id, parent_id, tittle, content from bandscore";
								$query = mysqli_query($conn,$bandscore);

								if (mysqli_num_rows($query) > 0) {

									//Ouput data for each row
									while ($result_bandscore = mysqli_fetch_array($query)){ ?>

								    	<dl class="dl_indent">
											<dt>
												<?php echo $result_bandscore['tittle']; ?>
											</dt>

											<dd>
												<?php echo $result_bandscore['content']; ?>
											</dd>
								   		</dl>	
									
								<?php 								
									}
								}	
								?>	
			 				</div>

			 				<div class="col-sm-4 col-xs-6">		
								<h4 class="text-danger">Band Ielts Score</h4>

									<table class="table">

										<thead>
											<tr>
												<th>Level</th>
												<th>Band</th>
												<th>Listening</th>
												<th>Reading</th>
											</tr>

										</thead>

								<?php

								$score = "SELECT id, parent_id, level, band, score_listening, score_reading from score";
								$query = mysqli_query($conn,$score);

								if (mysqli_num_rows($query) > 0) {
									while ($result_score = mysqli_fetch_array($query)){?>

								    	<tbody>
											<tr class="info">
												<td><?php echo $result_score['level']; ?></td>
												<td><?php echo $result_score['band']; ?></td>
												<td><?php echo $result_score['score_listening']; ?></td>
												<td><?php echo $result_score['score_reading']; ?></td>
											</tr>
										</tbody>
								<?php 								
									}
								}
							 ?>	
									</table>
							</div>
			 			</div>
				 	</div>
				 	
				 <?php 
				 	} 
				 ?>
				<!-- PRINT Bandscore and respontaneous score parent_id==5-->

				</div>
			</div>
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