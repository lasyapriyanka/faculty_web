<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
            <li class="active"><a href="login.php">Login <span class="sr-only">(current)</span></a></li>
            <li><a href="createnew.php">Create New Page</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">

      <!-- Main container area -->
      <div class="jumbotron">
        <h2>Faculty Pages:</h2>
        <p>Here there will be a list of all previously created faculty pages.</p>
        
        <!--form -->  
          
          <?php

           $file = 'write1.xml';

            $xmlstr = simplexml_load_file($file);
            
            $r = $xmlstr->count();
            
            //echo $r;
            
            $x = 0;

           // echo $x;
            for ($x=0; $x < $r; $x++)
            {
                  echo ($x+1) . ".  <a href='Template" . $xmlstr->faculty[$x]->template . ".php?id=".$x."&p=1'>" . $xmlstr->faculty[$x]->fullname . "</a>   ". " <br/>";
            }





            while ($x < $r)
            {
                echo ($x+1) . ".  <a href='Template" . $xmlstr->faculty[$id]->template . "?id=".$id."&p=1'>" . $xmlstr->faculty[$x]->fullname . "</a>   ". " <br/>";
                //echo $x;
                
                $x++;
            }

          ?>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
