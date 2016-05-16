<?php
$id = (int) $_GET['id'];

    $file = 'write1.xml';
    $xml = simplexml_load_file($file);  

    $xmlFormat = $xml->asXML();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
          <p class="text-uppercase"><center><h1><?php echo $xml->faculty[$id]->fullname; ?></h1></center></p>
          <!-- nav -->
          
          <div class="row">
          
          <div class="center-block col-md-12"><h3><center><a href="<?php $p=1; echo $_SERVER['PHP_SELF'] . "?id=" . $id . "&p=" . $p; ?>">Home</a> . <a href="<?php $p=2; echo $_SERVER['PHP_SELF'] . "?id=" . $id . "&p=" . $p; ?>">Publications</a> . <a href="<?php $p=3; echo $_SERVER['PHP_SELF'] . "?id=" . $id . "&p=" . $p; ?>">Teaching</a> . <a href="<?php $p=4; echo $_SERVER['PHP_SELF'] . "?id=" . $id . "&p=" . $p; ?>">Curriculum Vitae</a></center></h3></div> 
              
            <div class="col-md-8 ">
              
              <?php if ($_GET['p']==1)  //If on HOME page , display research and custom sections
                {
             
                $researchSection = $xml->faculty[$id]->research->count(); 
                if ($researchSection != 0)
                {
                    $projectCount = $xml->faculty[$id]->research->project->count();
                    if ($projectCount != 0)
                    {
                    ?>
                    <strong><center><h3>Research Interests</h3></center></strong>

                  <ol>
                      <?php 
                        for ($i=0; $i < $projectCount; $i++)
                        {  ?>
                        
                        <li><?php echo $xml->faculty[$id]->research->project[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ol> <?php }
                }
        
                if (($xml->faculty[$id]->customSections->count() !=0))
                {
                 if ($xml->faculty[$id]->customSections->section->count()!=0)
                 {
                     $sectionCount = $xml->faculty[$id]->customSections->section->count();
                    for ($i=0; $i<$sectionCount; $i++) //for each section that exists
                    {
                        if ($xml->faculty[$id]->customSections->section[$i]->items->item->count()!=0)
                        {
                            
                            $itemCount = $xml->faculty[$id]->customSections->section[$i]->items->item->count();
                            
                             ?>
                                <p><h3><center><strong><?php echo $xml->faculty[$id]->customSections->section[$i]->name; ?></strong></center></h3></p>
                                <ul>
                            <?php
                            
                                for ($q=0; $q<$itemCount; $q++)
                                        {
                                    
                                           ?><li><?php echo $xml->faculty[$id]->customSections->section[$i]->items->item[$q]; ?></li><br/><?php                
                                       }
                            ?>
                                </ul>
                            <?php
                        }
       
                    }                
                 }
                    
                    
                }

                } // end of page one - Home Page 
                
              if ($_GET['p']==2)
              {
                  
              $publicationSection = $xml->faculty[$id]->publications->count(); 
                
                
                if (($publicationSection != 0))
                {
                    
                    $articleCount = $xml->faculty[$id]->publications->article->count();
                    if ($articleCount !=0){
                    ?>
                    <strong><center><h3>Publications and Papers</h3></center></strong><br/>

                  <ul>
                      <?php 
                        for ($i=0; $i < $articleCount; $i++)
                        {  ?>
                        
                        <li><?php echo $xml->faculty[$id]->publications->article[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ul> <?php }
                }
              
              
              
              
              
              }


if ($_GET['p']==3)
{

$classesSection = $xml->faculty[$id]->classes->count(); 
                
                
                if (($classesSection != 0))
                {
                    
                    $classCount = $xml->faculty[$id]->classes->class->count();
                    if ($classCount !=0){
                    ?>
                    <p><center><h3><strong>Teaching</strong></h3></center></p>

                  <ul>
                      <?php 
                        for ($i=0; $i < $classCount; $i++)
                        {  ?>
                      
                        <li><?php echo $xml->faculty[$id]->classes->class[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ul> <?php }
                }






}

                  if ($_GET['p']==4)
              {
                      $educationSection = $xml->faculty[$id]->education->count(); 
                
                
                if (($educationSection != 0))
                {
                    
                    $credentialCount = $xml->faculty[$id]->education->credential->count();
                    if ($credentialCount !=0){
                    ?>
                    <strong><h3><center>Education and Professional Associations</center></h3></strong><br/>

                  <ul>
                      <?php 
                        for ($i=0; $i < $credentialCount; $i++)
                        {  ?>
                        
                        <li><?php echo $xml->faculty[$id]->education->credential[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ul> <?php }
                }
    
                  }
              ?>
              
             
              </div>
              
            <div class="col-md-4 ">
              
            <p><img src="<?php echo $xml->faculty[$id]->profilepic; ?>" width="175px" height="175px"></img></p>  
               <h3><?php echo $xml->faculty[$id]->fullname; ?></h3>
              
              <small><?php echo $xml->faculty[$id]->position; echo "<br/>";?><p><em><?php echo $xml->faculty[$id]->university; ?></em></p></small>
            <address>
                <strong>Office Location: </strong><br>
                    <?php echo $xml->faculty[$id]->officeLoc; ?>
                <br/>
                <abbr title="Phone">Phone:</abbr> <?php echo $xml->faculty[$id]->phone; ?>
                <br/>
                <abbr title="Office Hours">Office Hours:</abbr><?php echo $xml->faculty[$id]->officeHrs; ?> 
                <br/>
                <abbr title="Fax">Fax:</abbr><?php echo $xml->faculty[$id]->fax; ?></br/>
            </address>

            <address>
                <strong>Email Me: </strong><br>
                <a href="mailto:<?php echo $xml->faculty[$id]->email; ?>"><?php echo $xml->faculty[$id]->email; ?></a>
            </address>

            <strong>Teaching Assistants</strong>
            <p><?php echo $xml->faculty[$id]->ta; ?></p>
            <p><a href="mailto:<?php echo $xml->faculty[$id]->taEmail; ?>"><?php echo $xml->faculty[$id]->taEmail; ?></a></p>
              
              
              
              
              
              
              
              
              </div>
          
          
          
          
          
          </div>
          
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>