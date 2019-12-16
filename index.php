<?php 

  session_start();

  // variable declaration
  $email = "";

  $errors = array(); 
  $_SESSION['success'] = "";

  // connect to database
  $db = mysqli_connect('localhost', 'id11954551_root', 'password', 'id11954551_test');

  // REGISTER Contact
  if (isset($_POST['reg_Contact'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
  
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


    if ($password_1 != $password_2) {
      echo '<script>alert("The two passwords do not match")</script>'; 
  

    }

    // register Contact if there are no errors in the form
   else {
      $password = md5($password_1);//encrypt the password before saving in the database
      $query = "INSERT INTO usr (email, password) 
            VALUES('$email', '$password')";
      mysqli_query($db, $query);

      $_SESSION['email'] = $email;
      $_SESSION['success'] = "You are now logged in";
      header('location: browse-Contact.php');
    }

  }

  // ... 

  // LOGIN Contact
  if (isset($_POST['login_Contact'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
      array_push($errors, "email is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM usr WHERE email='$email' AND password='$password'";
      $results = mysqli_query($db, $query);

      if (mysqli_num_rows($results) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location:browse-Contact.php');
      }else {
        echo '<script>alert("Wrong Email/Password")</script>'; 
  
      }
    }
  }



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
   
    <link rel="icon" href="img/favicons/favicon.ico">

    <title>Contacts for Business</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Custom styles for this template -->
  
    <link href="product.css" rel="stylesheet" type="text/css">
    <style>
  /* Some custom styles to beautify this example */
    .demo-content{
    
        background: #dbdfe5;
        margin-bottom: 15px;

    }

  
.fa {
  padding: 20px;
  font-size: 30px;
  width: 70px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}


.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}



</style>
  </head>

  <body>
     <header>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow">
      <img src="images/logo.jpg" alt="Smiley face" height="100" width="100">
  <h5 class="my-0 mr-md-auto font-weight-normal">Contacts for Business</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        
        <a class="p-2 text-dark" href="#about">About us</a>
        <a class="p-2 text-dark" href="#Contact">Contact us</a>
             </nav>
      <a class="btn btn-outline-primary" id="loginbutton">Login</a>
    </div>
  </header> 




<div id="errorModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modalbar-dark">
                    <h4 class="modal-title">error </h4>
                   
                </div>
                <div class="modal-body modalcon-pale">
                  
                  
                        <div class="form-row">
                      try again
                           
                        </div>
                      
                  
                </div>
            </div>
        </div>
    </div>
  <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modalbar-dark">
                    <h4 class="modal-title">Login </h4>
                    <button type="button" class="close lightgray" id="loginbuttonclose">&times;</button>
                </div>
                <div class="modal-body modalcon-pale">
                  <form method="post" action="#">
                  
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                    <input type="email" name="email" class="form-control form-control-sm mr-1" id="exampleInputEmail3" placeholder="Enter email" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password"  name="password" class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password" required>
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <button type="button" class="btn btn-secondary btn-sm ml-auto" id="loginbuttonclose1">Cancel</button>
                            <button type="submit" name="login_Contact" class="btn btn-primary btn-sm ml-1">Sign in</button>        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div id="reserveModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->   

                                             
     
            <div class="modal-content">
                <div class="modal-header modalbar-dark">
                    <h4 class="modal-title">Register</h4>
                    <button type="button" class="close lightgray" id="reservebuttonclose">&times;</button>
                </div>
                <div class="modal-body modalcon-pale">
                    <form method="post" action="">
                   

                        <div class="form-row">
                            <div class="form-group col-sm-3">
                                    <label class="sr-only" for="exampleInputEmail3" >Email address</label>
                                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-sm mr-1" id="exampleInputEmail3" placeholder="Enter email" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password" name="password_1" class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password" required>
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="sr-only" for="exampleInputPassword3">Confirm Password</label>
                                <input type="password" name="password_2" "class="form-control form-control-sm mr-1" id="exampleInputPassword3" placeholder="Password" required>
                            </div>
                            </div>
                       
                        <div class="form-row">
                            <button type="button" class="btn btn-secondary btn-sm ml-auto" id="loginbuttonclose1">Cancel</button>
                            <button type="submit" name="reg_Contact" class="btn btn-primary btn-sm ml-1">Register</button>        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<section class="jumbotron text-center newimage">
        <div class="container tran">
          <h1 class="jumbotron-heading">Communicating effectively for business</h1>
          <p class="lead text-muted">Effective communication is a vital tool for any business owner. Your success at getting your point across can be the difference between sealing a deal and missing out on a potential opportunity.

You should be able to clearly explain company policies to customers and clients and answer their questions about your products or services. It is crucial to communicate effectively in negotiations to ensure you achieve your goals.</p>
          <p>
            <a id= "reservebutton" class="btn btn-lg btn-warning my-2">
            Register</a>
            
          </p>
        </div>
      </section>
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3" id="about">
      <div class="bg-info mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Networking in business</h2>
          <p class="lead">Networking is about interacting with people and engaging them for mutual benefit.</p>
        </div>
        <div class="bg-light box-shadow mx-auto dateimg" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
      <div class="bg-danger mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Using your networks</h2>
          <p class="lead">Your business networks can help you in a wide range of ways.</p>
        </div>
        <div class="bg-danger box-shadow mx-auto dateimg2" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
    </div>
  

     

      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

      

        <!-- START THE FEATURETTES -->

 
        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Managing business <span class="text-muted">relationships</span></h2>
            <p class="lead">Use negotiation, communication skills, dispute resolution and networking to better manage your business relationships.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="images/datingv.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Meeting new people &&nbsp;<span class="text-muted">introducing yourself</span></h2>
            <p class="lead">Your first impression can be the difference between starting a successful business relationship or finishing with a one-off meeting. It is very easy to make a negative first impression on someone, often without knowing you’ve done so. It’s much harder to make a positive impression, so you must put some effort into your introductions.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="images/datingl.jpg"  data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

      </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

       <div class="container">


     <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide img-fluid" src="images/dating3.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption tran1">
                <h2>Making a good first impression </h2>
                <p>The way you introduce and present yourself provides people with a first impression of you. Most people begin forming an opinion of you within 3 seconds and these judgements can be difficult to modify.</p>
                <p><a class="btn  btn-danger" href="#" role="button">Register with us </a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide img-fluid" src="images/dating2.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption tran1">
                <h2>Cultural differences</h2>
                <p>If an introduction doesn't go according to plan, one reason may be cultural differences. Every culture has its own way of meeting people in business situations for the first time.</p>
                <p><a class="btn btn-danger" href="#" role="button">Know More</a></p>
              </div>
            </div>
          </div>
       
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>
       
    


     <div class="container" id='Contact'>
     
      <footer class="pl-3 pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md-3">
            <a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>

<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
            <small class="d-block mb-3 text-muted">&copy; 2019-2020</small>
          </div>
           <div class="col-4 offset-1 col-sm-2">
                        <h5>Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#mycarousel">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
            <div class="col-7 col-sm-5">
                        <h5>Our Address</h5>
                        <address>
                          121, Clear Water Bay Road<br>
                          Clear Water Bay, Kowloon<br>
                          HONG KONG<br>
                          <i class="fa fa-phone fa-lg"></i>: +852 1234 5678<br>
                          <i class="fa fa-fax fa-lg"></i>: +852 8765 4321<br>
                          <i class="fa fa-envelope fa-lg"></i>: 
                          <a href="mailto:confusion@food.net">ping@Contact.net</a>
                       </address>
                    </div>
        
        </div>
      </footer> 
    </div>

   

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>   <script src=" https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.min.js" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      $("#loginbutton").click(function(){
        $("#loginModal").modal();
      });
    });
    </script>
    <script>
        $(document).ready(function(){
          $("#reservebutton").click(function(){
            $("#reserveModal").modal();
          });
        });
        </script>

<script>
      $(function () {
    $("#reservebuttonclose").on('click', function() {
        $('#reserveModal').modal('hide');
    });
    $("#reservebuttonclose1").on('click', function() {
        $('#reserveModal').modal('hide');
    });
    });
</script>
<script>
        $(function () {
      $("#loginbuttonclose").on('click', function() {
          $('#loginModal').modal('hide');
      });
      $("#loginbuttonclose1").on('click', function() {
          $('#loginModal').modal('hide');
      });
      });
  </script>
  </body>
</html>