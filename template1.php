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
          <div class="row">
              <div class="col-md-12">
          <div class="col-md-3 ">
              <h3><?php echo $xml->faculty[$id]->fullname; ?></h3>
              <img src="<?php echo $xml->faculty[$id]->profilepic; ?>" width="200px" height="200px"></img>
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
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <div class="col-md-6 "><br/><br/> <p class="lead"><?php echo $xml->faculty[$id]->welcome; ?></p>

<p><?php echo $xml->faculty[$id]->bio; ?></p>
                  
                <br/><br/>
                      
                      
                <?php 
                $researchSection = $xml->faculty[$id]->research->count(); 
                if ($researchSection != 0)
                {
                    $projectCount = $xml->faculty[$id]->research->project->count();
                    if ($projectCount != 0)
                    {
                    ?>
                    <strong>Research Projects</strong>

                  <dl class="dl-horizontal">
                      <?php 
                        for ($i=0; $i < $projectCount; $i++)
                        {  ?>
                        <dt></dt>
                        <dd><?php echo $xml->faculty[$id]->research->project[$i]; ?></dd>
                        <br/>
                        <?php 
                        } ?>
                 </dl> <?php }
                }?>

                <?php 
                $publicationSection = $xml->faculty[$id]->publications->count(); 
                
                
                if (($publicationSection != 0))
                {
                    
                    $articleCount = $xml->faculty[$id]->publications->article->count();
                    if ($articleCount !=0){
                    ?>
                    <strong>Publications and Papers</strong>

                  <dl class="dl-horizontal">
                      <?php 
                        for ($i=0; $i < $articleCount; $i++)
                        {  ?>
                        <dt></dt>
                        <dd><?php echo $xml->faculty[$id]->publications->article[$i]; ?></dd>
                        <br/>
                        <?php 
                        } ?>
                 </dl> <?php }
                }?>
                      
                
                <?php 
                $educationSection = $xml->faculty[$id]->education->count(); 
                
                
                if (($educationSection != 0))
                {
                    
                    $credentialCount = $xml->faculty[$id]->education->credential->count();
                    if ($credentialCount !=0){
                    ?>
                    <strong>Education and Professional Associations</strong>

                  <dl class="dl-horizontal">
                      <?php 
                        for ($i=0; $i < $credentialCount; $i++)
                        {  ?>
                        <dt></dt>
                        <dd><?php echo $xml->faculty[$id]->education->credential[$i]; ?></dd>
                        <br/>
                        <?php 
                        } ?>
                 </dl> <?php }
                }?>
                      
                      
                
                

                </div><div class="col-md-3 ">
              <br/><br/>
              
                              <?php 
                $classesSection = $xml->faculty[$id]->classes->count(); 
                
                
                if (($classesSection != 0))
                {
                    
                    $classCount = $xml->faculty[$id]->classes->class->count();
                    if ($classCount !=0){
                    ?>
                    <p><strong>Current Classes</strong></p>

                  <ul>
                      <?php 
                        for ($i=0; $i < $classCount; $i++)
                        {  ?>
                      
                        <li><?php echo $xml->faculty[$id]->classes->class[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ul> <?php }
                }?>
              
              <?php
                

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
                                <p><strong><?php echo $xml->faculty[$id]->customSections->section[$i]->name; ?></strong></p>
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




              ?>
              
              
              
              </div>
            </div>
          </div>
          </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>