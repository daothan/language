<!DOCTYPE html>
<html>
<head>
	<title>LISTENING</title>
</head>
<body>
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
		$listening = "SELECT parent_id FROM listening";
		$query = mysqli_query($conn,$listening);

		if(mysqli_num_rows($query) > 0){
			while($parent_id = mysqli_fetch_array($query)){
				$id_listening = $parent_id['parent_id'];
			}
		}
	 ?>


	<div class="container">
		<form method="post" action="search.php?id=<?php echo $id_listening; ?>">
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

	<!-- Show Video -->

	<?php 
	$id = $_GET['id'];
	$listening = "SELECT id, parent_id, url, tittle, subtitle, origin_url FROM listening";
	$query = mysqli_query($conn, $listening);

	if(mysqli_num_rows($query) > 0){
		while($result_listening = mysqli_fetch_array($query)){
			if($result_listening['id']==$id){?>

				<div class=container>
				   <div class="container-fluid">
						
						<div class="col-sm-2 side nav"></div>
						
						<div class="col-lg-8"> 					
							<div class="headline">
								<h1 class="page-header"> <?php echo $result_listening['tittle']; ?></h1>
							</div>

							<div class="content-detail">
								<div class="embed-responsive embed-responsive-16by9">
									<video height="300" controls>
										<source src="<?php echo $result_listening['url']; ?>" type="video/mp4 " allowfullscreen>
									</video>
								</div>
							</div>

							<br/><hr/><br/><br/>
							<div>
								<a href="<?php echo $result_listening['origin_url'];?>" class="btn-link btn-success pull-right" target="_blank"> <h3>View Source</h3></a>
							</div>
						</div>				
					</div>
				</div>

					
				<div class="container">
					<div class="dictation">
						<form>
						    <div class="form-group">
						      <label for="comment" ><h3>Take dictation bellow:</h3></label>
						      <textarea class="form-control" rows="5" id="comment"></textarea>
						    </div>
						</form>
					</div>
				</div>

	<?php   }
		}
	}	
	?>
	<!-- End Show Video -->

	<!-- Show more video -->

	<div class="container">
		<div class="panel panel-primary">

			<div class="panel-heading">
				<h2>More listening ...</h2>
			</div>

			<div class="panel-body">
				<div class="container-fluid inline">
					<!-- Select data from database name listening -->
				<?php 
					$listening = "SELECT id, parent_id, url, tittle , origin_url from listening";
					$query = mysqli_query($conn,$listening);
					$id=$_GET['id'];	
					$a=0;

					if (mysqli_num_rows($query) > 0) {
						while ($result_listening = mysqli_fetch_array($query)){
							if($result_listening['id']!=$id){
								if($a<3){ /*Limmited number of rows show in home.php just six laster update database */
							$a++;
							?>

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
					}
					?>
				 	
				</div>	
			</div>
		</div>
	</div>

<!-- End show video -->

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