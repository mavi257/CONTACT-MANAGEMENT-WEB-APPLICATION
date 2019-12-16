<?php include_once('config.php');?>
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
	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['Contactname']) and $_REQUEST['Contactname']!=""){
		$condition	.=	' AND Contactname LIKE "%'.$_REQUEST['Contactname'].'%" ';
	}
	if(isset($_REQUEST['Contactemail']) and $_REQUEST['Contactemail']!=""){
		$condition	.=	' AND Contactemail LIKE "%'.$_REQUEST['Contactemail'].'%" ';
	}
	if(isset($_REQUEST['Contactphone']) and $_REQUEST['Contactphone']!=""){
		$condition	.=	' AND Contactphone LIKE "%'.$_REQUEST['Contactphone'].'%" ';
	}
	$ContactData	=	$db->getAllRecords('Contact','*',$condition,'ORDER BY id DESC');
	?>
   	<div class="container">
		
		<div class="card" style="margin-top:50px;">
			<div class="card-header bg-warning"><i class="fa fa-fw fa-globe"></i> <strong>Browse Contact</strong> <a href="add-Contact.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Contact</a></div>
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Contact</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Contact Name</label>
									<input type="text" name="Contactname" id="Contactname" class="form-control" value="<?php echo isset($_REQUEST['Contactname'])?$_REQUEST['Contactname']:''?>" placeholder="Name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Contact Email</label>
									<input type="email" name="Contactemail" id="Contactemail" class="form-control" value="<?php echo isset($_REQUEST['Contactemail'])?$_REQUEST['Contactemail']:''?>" placeholder="Email">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Contact Phone</label>
									<input type="tel" name="Contactphone" id="Contactphone" class="form-control" value="<?php echo isset($_REQUEST['Contactphone'])?$_REQUEST['Contactphone']:''?>" placeholder="Phone">
								</div>
							</div>
							<div class="col-sm-5">
								<div class="form-group" >
									<label>&nbsp;</label>
									<div >
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>
						<th>Contact Name</th>
						<th>Contact Email</th>
						<th>Contact Phone</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$s	=	'';
					foreach($ContactData as $val){
						$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $val['Contactname'];?></td>
						<td><?php echo $val['Contactemail'];?></td>
						<td><?php echo $val['Contactphone'];?></td>
						<td align="center">
							<a href="edit-Contact.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this Contact?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>
