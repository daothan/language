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

	<!--Search form-->

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
		<form method="post" action="search.php?id=<?php echo $_GET['id']; ?>">
			  <input type="text" name="search" placeholder="Search.." >
			  <input type="submit" name="search1" value="Search">
			  	<span class="error"> <?php echo  "&nbsp &nbsp &nbsp".$nameerr;?> </span>
		</form>			
	</div>

	<!-- End search form -->


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
		$search_value =$non_result = "";
		$count_search =1;

		if($_GET['id']==1){ /*Search with listening and reading show on home*/

			if($_SERVER["REQUEST_METHOD"]=="POST"){

				$search_value=$_POST['search'];

				if(!empty($search_value)){

			        $sql="SELECT * FROM listening WHERE tittle like '%$search_value%'";

			        $listening=mysqli_query($conn,$sql);

			        $count_result=mysqli_num_rows($listening);?> 

		            	<h2 class="headline result_search">
							Results of key "<span><?php echo $search_value; ?></span>" are: 
						</h2>

					<?php	
			        while($result=mysqli_fetch_array($listening)){

			        	if(!empty($result)){ ?>

				            <div class="result_search">
								<?php 
									echo $count_search."."; 
									$count_search++;
								?>

								<div class="content_detail">
									<a href="listening.php?id=<?php echo $result['id']; ?>">
										<?php echo $result['tittle']; ?>
									</a>					
			 					</div>	

			 					<?php 
									echo "  (from listening)";
								?>

							</div>
		<?php    
			        	 }
			       	}

			       	$sql="SELECT * FROM reading WHERE tittle like '%$search_value%'";

			        $reading=mysqli_query($conn,$sql);

			        $count_result=mysqli_num_rows($reading);
	       
	       	        if(empty($count_result)){  	
		            	$non_result="There is no result";
		            } 
			        while($result=mysqli_fetch_array($reading)){

			        	if(!empty($result)){ ?>

				            <div class="result_search">
								<?php 
									echo $count_search."."; 
									$count_search++;
								?>

								<div class="content_detail">
									<a href="reading.php?id=<?php echo $result['id']; ?>">
										<?php echo $result['tittle']; ?>
									</a>					
			 					</div>	

			 					<?php 
									echo "  (from reading)";
								?>

							</div>
		<?php    
			        	 }
			       	}

				}
			}
		 }     
		

		if($_GET['id']==2){ /*Search with listening */

			if($_SERVER["REQUEST_METHOD"]=="POST"){

				$search_value=$_POST['search'];

				if(!empty($search_value)){

			        $sql="SELECT * FROM listening WHERE tittle like '%$search_value%'";

			        $listening=mysqli_query($conn,$sql);

			        $count_result=mysqli_num_rows($listening);
	       
	       	        if(empty($count_result)){  	
		            	$non_result="There is no result";
		            } ?> 
		            	<h2 class="headline result_search">
							Results of key "<span><?php echo $search_value; ?></span>" from listening are: 
						</h2>

					<?php	
			        while($result=mysqli_fetch_array($listening)){

			        	if(!empty($result)){ ?>

				            <div class="result_search">
								<?php 
									echo $count_search."."; 
									$count_search++;
								?>

								<div class="content_detail">
									<a href="listening.php?id=<?php echo $result['id']; ?>">
										<?php echo $result['tittle']; ?>
									</a>					
			 					</div>	
			 					<?php 
									echo "  (from listening)";
								?>

							</div>
		<?php    
			        	 }
			       	}

			    }
			}
		 } 

		if($_GET['id']==3){ /*Search with reading*/

			if($_SERVER["REQUEST_METHOD"]=="POST"){

				$search_value=$_POST['search'];

				if(!empty($search_value)){

			        $sql="SELECT * FROM reading WHERE tittle like '%$search_value%'";

			        $reading=mysqli_query($conn,$sql);

			        $count_result=mysqli_num_rows($reading);
	       
	       	        if(empty($count_result)){  	
		            	$non_result="There is no result";?>

		            	<h2 class="headline result_search">
							Results of key "<span class="text-danger"><?php echo $search_value; ?></span>" from reading are: 
						</h2>
		      <?php } 
			        while($result=mysqli_fetch_array($reading)){

			        	if(!empty($result)){ ?>

				            <div class="result_search">
								<?php 
									echo $count_search."."; 
									$count_search++;
								?>

								<div class="content_detail">
									<a href="reading.php?id=<?php echo $result['id']; ?>">
										<?php echo $result['tittle']; ?>
									</a>					
			 					</div>	

			 					<?php 
									echo "  (from reading)";
								?>

							</div>
		<?php    
			        	 }
			       	}

				}
			}
		}	

		if($_GET['id']==4){ /*Search with exam*/

			if($_SERVER["REQUEST_METHOD"]=="POST"){

				$search_value=$_POST['search'];

				if(!empty($search_value)){

			        $sql="SELECT * FROM exam WHERE tittle like '%$search_value%'";

			        $exam=mysqli_query($conn,$sql);

			        $count_result=mysqli_num_rows($exam);
	       
	       	        if(empty($count_result)){  	
		            	$non_result="There is no result";?>

		            	<h2 class="headline result_search">
							Results of key "<span class="text-danger"><?php echo $search_value; ?></span>" from exam are: 
						</h2>
		      <?php } 
			        while($result=mysqli_fetch_array($exam)){

			        	if(!empty($result)){ ?>

				            <div class="result_search">
								<?php 
									echo $count_search."."; 
									$count_search++;
								?>

								<div class="content_detail">
									<a href="reading.php?id=<?php echo $result['id']; ?>">
										<?php echo $result['tittle']; ?>
									</a>					
			 					</div>	

			 					<?php 
									echo "  (from exam)";
								?>

							</div>
		<?php    
			        	 }
			       	}

				}
			}
		}	



		if($_GET['id']==5){?>

			<script type="text/javascript">
				window.location.href = "detail.php?id=5"
			</script>
			
		<?php 
		}	
		?>	

			<div class="result_search">
				<h3 class="count_search">
					<?php 
						$count_search--;
						echo "There are $count_search results found"; 
					?>
				</h3>
			</div>

	<!-- End search keywords -->

	<!-- CONTENT -->


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