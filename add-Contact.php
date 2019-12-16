<?php include_once('config.php');
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($Contactname==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($Contactemail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($Contactphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}else{
		
		$ContactCount	=	$db->getQueryCount('contact','id');
		if($ContactCount[0]['total']<20){
			$data	=	array(
							'Contactname'=>$Contactname,
							'Contactemail'=>$Contactemail,
							'Contactphone'=>$Contactphone,
						);
			$insert	=	$db->insert('Contact',$data);
			if($insert){
				header('location:browse-Contact.php?msg=ras');
				exit;
			}else{
				header('location:browse-Contact.php?msg=rna');
				exit;
			}
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
			exit;
		}
	}
}
?>

<!doctype html>

<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Contacts for Business</title>

	

	<link rel="shortcut icon" href="">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">




</head>



<body>

	

	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			  <header>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow">
      <img src="images/logo.png" alt="Smiley face" height="100" width="100">
  <h5 class="my-0 mr-md-auto font-weight-normal">Contacts for Business</h5>
    
      <a href="index.php?logout='1'"  class="btn btn-outline-primary" >Log out</a>
    </div>
  </header>
		</div> <!--/.container-->
	</div>

	

	

   	<div class="container" >

	

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Contact name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Contact email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Contact phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a Contact and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>

		<div class="card" style="margin-top:50px;">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add Contact</strong> <a href="browse-Contact.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Contact</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post">

						<div class="form-group">

							<label>Contact Name <span class="text-danger">*</span></label>

							<input type="text" name="Contactname" id="Contactname" class="form-control" placeholder="Enter Contact name" required>

						</div>

						<div class="form-group">

							<label>Contact Email <span class="text-danger">*</span></label>

							<input type="email" name="Contactemail" id="Contactemail" class="form-control" placeholder="Enter Contact email" required>

						</div>

						<div class="form-group">

							<label>Contact Phone <span class="text-danger">*</span></label>

							<input type="tel" class="tel form-control" name="Contactphone" id="Contactphone" x-autocompletetype="tel" placeholder="Enter Contact phone" required>

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add Contact</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

    


	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	

    

</body>

</html>