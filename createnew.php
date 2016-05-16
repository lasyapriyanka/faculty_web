<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      
      
    <!--  This form create a new profile for a faculty member that does not have a profile yet.  -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="facicon.ico">

    <title>Faculty Page Generator</title>

      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    

    <!-- Custom styles for this template -->
    <style type="text/css">
        body {
                min-height: 2000px;
            }

        .navbar-static-top {
                margin-bottom: 19px;
            }
    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Faculty Page Generator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
         
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="login.php">Login</a></li>
            <li><a href="createnew.php">Create New Page</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">
      <!-- Main container area -->
      <div class="jumbotron">
        <h2>Create Your Faculty Page</h2>
        <p>Fill in the form below to create your own faculty page.</p>
        
        <!--Fill out this form to start your faculty profile page. -->  
          <FORM action="step2.php" method="post">
                <div class="form-group">
                    <label for="fullname">Full Name: </label>
                    <input type="text" class="form-control" name="fullname" placeholder="Enter your full name">
                </div>
              
              
                <div class="form-group">
                    <label for="username">Username to access editing of your page: </label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" name="password" placeholder="enter a password">
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="profilepic">Profile Picture: </label>
                    <input type="text" class="form-control" name="profilepic" placeholder="URL to your profile picture">
                    <p class="help-block">*Write down your username and password - it is the only way to edit your faculty page after creating it.</p>
                </div>
              
                <div class="form-group">
                    <label for="position">Position or Job Title: </label>
                    <input type="text" class="form-control" name="position" placeholder="position or job title">
                </div>
              
                <div class="form-group">
                    <label for="university">University Name: </label>
                    <input type="text" class="form-control" name="university" placeholder="university name or institution ">
                </div>
              
                <div class="form-group">
                    <label for="phone">Phone Number: </label>
                    <input type="text" class="form-control" name="phone" placeholder="">
                </div>
              
                <div class="form-group">
                    <label for="fax">Fax: </label>
                    <input type="text" class="form-control" name="fax" placeholder="">
                </div>
              
                <div class="form-group">
                    <label for="ta">TA: </label>
                    <input type="text" class="form-control" name="ta" placeholder="Names of your TA(s)">
                </div>
              
              
                <div class="form-group">
                    <label for="taEmail">TA Email: </label>
                    <input type="text" class="form-control" name="taEmail" placeholder="TA(s) emails">
                </div>

                <div class="form-group">
                    <label for="officeloc">Office location: </label>
                    <input type="text" class="form-control" name="officeloc" placeholder="Office location">
                </div>
              
                <div class="form-group">
                    <label for="officehrs">Office Hours: </label>
                    <input type="text" class="form-control" name="officehrs" placeholder="Current office hours">
                </div>
              
              
                <div class="form-group">
                    <label for="welcome">Welcome Statement for webpage: </label>
                    <textarea name="welcome" class="form-control" rows="3" placeholder="Enter welcome statement for your web page"></textarea>
                </div>
              
                <div class="form-group">
                    <label for="bio">Short Biography Paragraph: </label>
                    <textarea name="bio" class="form-control" rows="3" placeholder="Enter short biography"></textarea>
                </div>
              

                <div class="form-group">
                    <label for="researchNum">How many Research projects would you like to list?</label>
                    <input type="number" name="researchNum" placeholder=""/>
                </div>
              
                <div class="form-group">
                    <label for="pubNum">How many Publications would you like to list?</label>
                    <input type="number" name="pubNum" placeholder=""/>
                </div>
              
              
                <div class="form-group">
                    <label for="credNum">How many credentials or professional associations would you like to include?</label>
                    <input type="number" name="credNum" placeholder=""/>
                </div>
                  
              
                <div class="form-group">
                    <label for="classNum">How many Classes are you currently teaching?</label>
                    <input type="number" name="classNum" placeholder=""/>
                </div>
              
              <br/>
              
              
<h4> Label any custom sections you would like to include on your page and how many items you need in each section: </h4>
              <p> For example your Custom Section "Hobbies" could have 4 items if you have 4 hobbies.</p>
              
              
                <div class="form-group">
                    <label for="Cust1"> </label>
                        <input type="text" class="form-control" name="Cust1" placeholder="Enter Custom Section name">
                    <label for="Cust1Num">How many entries in this section?</label>
                        <input type="number" name="Cust1Num" placeholder=""/>
                </div>    
              
                <div class="form-group">
                    <label for="Cust2"> </label>
                        <input type="text" class="form-control" name="Cust2" placeholder="Enter Custom Section name">
                    <label for="Cust2Num">How many entries in this section?</label>
                        <input type="number" name="Cust2Num" placeholder=""/>
                </div> 
              
              
                <div class="form-group">
                    <label for="Cust3"> </label>
                        <input type="text" class="form-control" name="Cust3" placeholder="Enter Custom Section name">
                    <label for="Cust3Num">How many entries in this section?</label>
                        <input type="number" name="Cust3Num" placeholder=""/>
                </div> 
              
              
                <div class="form-group">
                    <label for="Cust4"> </label>
                        <input type="text" class="form-control" name="Cust4" placeholder="Enter Custom Section name">
                    <label for="Cust4Num">How many entries in this section?</label>
                        <input type="number" name="Cust4Num" placeholder=""/>
                </div> 
              
              
                <div class="form-group">
                    <label for="Cust5"> </label>
                        <input type="text" class="form-control" name="Cust5" placeholder="Enter Custom Section name">
                    <label for="Cust5Num">How many entries in this section?</label>
                        <input type="number" name="Cust5Num" placeholder=""/>
                </div> 
              
              
                <div class="form-group">
                    <label for="Cust6"> </label>
                        <input type="text" class="form-control" name="Cust6" placeholder="Enter Custom Section name">
                    <label for="Cust6Num">How many entries in this section?</label>
                        <input type="number" name="Cust6Num" placeholder=""/>
                </div> 
              
              
                <div class="form-group">
                    <label for="Cust7"> </label>
                        <input type="text" class="form-control" name="Cust7" placeholder="Enter Custom Section name">
                    <label for="Cust7Num">How many entries in this section?</label>
                        <input type="number" name="Cust7Num" placeholder=""/>
                </div>               
              

                <input type="submit" name="submitNew" value="Submit" class="btn btn-default"></button>
          </form>
    </div>

    </div> <!-- /container -->
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
