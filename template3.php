<?php
$id = (int) $_GET['id'];

    $file = 'write1.xml';
    $xml = simplexml_load_file($file);  

    $xmlFormat = $xml->asXML();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400|Oswald:400,700' rel='stylesheet' type='text/css'>
      
      <link rel="stylesheet" type="text/css" href="temp3.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $xml->faculty[$id]->fullname; ?></title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

      <style type="text/css">
      .imgpad { padding: 10px; margin: 10px; }
      .bg-red { background-color: #7D0612; }
       .whitetext { color: #FFFFFF;}
      
      a {
          color: #7D0612;
      }
      
      
      </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container-fluid bg-red"><p class="whitetext"><h1 class="whitetext"><?php echo $xml->faculty[$id]->fullname; echo " . " . $xml->faculty[$id]->university; ?></h1></p> </div>
      <div class="container">
          <div class="row">
        <div class="col-md-8">

        <br/><div class="imgpad pull-left"><img src="<?php echo $xml->faculty[$id]->profilepic; ?>" width="260px" height="220px"/></div><div class="">
              <p class="lead"><?php echo $xml->faculty[$id]->welcome; ?></p></div>
            
        <div class="col-xs-12">
            <?php echo $xml->faculty[$id]->bio; ?>
            
        </div>
            <br/>
            
            <?php 
            if ($_GET['p']==1)
              {
                  
                $researchSection = $xml->faculty[$id]->research->count(); 
                
                
                if (($researchSection != 0))
                {
                    
                    $projectCount = $xml->faculty[$id]->research->project->count();
                    if ($projectCount !=0){
                    ?>
                    
                    <div class="col-xs-12" style="margin-top: 15px;"><strong><center><h3>Current Research</h3></center></strong><br/><div class='row paper-row'><div class='col-xs-12'>
                      <?php 
                        for ($i=0; $i < $projectCount; $i++)
                        {  ?>
                        
                        <li><?php echo $xml->faculty[$id]->research->project[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                         </div>            
           </div> </div><?php }
                }
                
                
              $publicationSection = $xml->faculty[$id]->publications->count(); 
                
                
                if (($publicationSection != 0))
                {
                    
                    $articleCount = $xml->faculty[$id]->publications->article->count();
                    if ($articleCount !=0){
                    ?>
                    
                    <div class="col-xs-12" style="margin-top: 15px;"><strong><center><h3>Publications and Papers</h3></center></strong><br/><div class='row paper-row'><div class='col-xs-12'>
                      <?php 
                        for ($i=0; $i < $articleCount; $i++)
                        {  ?>
                        
                        <li><?php echo $xml->faculty[$id]->publications->article[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                         </div>            
           </div> </div><?php }
                }

              }

        if ($_GET['p']==2)
        {

             $educationSection = $xml->faculty[$id]->education->count(); 
                
                
                if (($educationSection != 0))
                {
                    
                    $credentialCount = $xml->faculty[$id]->education->credential->count();
                    if ($credentialCount !=0){
                    ?>
                   <div class="col-xs-12" style="margin-top: 15px;"><strong><center><h3>Curriculum Vitae</h3></center></strong><br/><div class='row paper-row'><div class='col-xs-12'>
                      <?php 
                        for ($i=0; $i < $credentialCount; $i++)
                        {  ?>
                        
                        <li><?php echo $xml->faculty[$id]->education->credential[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?> </div></div></div>
               <?php }
                }



        }
?>
        </div> <!-- end main area -->
              
              
              
              
              
        <div class="col-md-4">
            <br/>
            <br/>
            <div class="vital-info" style="margin-top: 0;">
                        <div><?php echo $xml->faculty[$id]->position; ?></div>
                        <div><?php echo $xml->faculty[$id]->university; ?></div>
                        <div><a href="http://www.stanford.edu/">Stanford University</a></div>
                    </div>
                    

		    <hr>

                    <div class="vital-info">
                        <div><a href="mailto:<?php echo $xml->faculty[$id]->email; ?>"><?php echo $xml->faculty[$id]->email; ?></a></div>


                    <div class="vital-info">
                        <div><?php echo $xml->faculty[$id]->officeLoc;?><div/>
                            
                        <div>TAs: <a href="mailto:<?php echo $xml->faculty[$id]->taEmail; ?>"><?php echo $xml->faculty[$id]->ta; ?></a></div>
                        <div>Phone: <?php echo $xml->faculty[$id]->phone; ?></div>
                    </div>

		    <div class="vital-info">
                <br/>
                        <div>Office hours: <?php echo $xml->faculty[$id]->officeHrs; ?></div>
		    </div>		    

		    <hr>
                  </div>
                        
                <div class="vital-info">
                        <div>
                            
                            <?php 
                            if ($_GET['p']==1){ ?>
                            <a href='<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=2"?>'>Curriculum vitae</a><?php }
                            if ($_GET['p']==2){ ?>
                            <a href='<?php echo $_SERVER['PHP_SELF'] . "?id=".$id."&p=1"?>'>Research and Publications</a><?php }
                    ?>
                    
                    
                    
                    </div>
               
                    </div>
            
                        
                        <?php 
                        
                        $classesSection = $xml->faculty[$id]->classes->count(); 
                
                
                if (($classesSection != 0))
                {     
                    $classCount = $xml->faculty[$id]->classes->class->count();  
                    if ($classCount !=0)
                        {
                    ?>
                            <div id="classes" class="vital-info">
                                <h5>Current Courses</h5>
                                    <div class="row">
                                        
                
                      <?php 
                        for ($i=0; $i < $classCount; $i++)
                            {  
                    ?>
                      
                                <div class="block col-md-9"><?php echo $xml->faculty[$id]->classes->class[$i]; ?></div>
                                <br/>
                    <?php 
                            }

                      ?>
                      
                            </div></div>
                  <?php }

                }
  
                        ?>
    
              
              
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>