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
<link rel="stylesheet" type="text/css" href="jumbotronnarrow.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<style type="text/css">
      
      body 
    {
        background-color: #8DA0B8; 
        
    }
      
    .orangeNav 
    {
            padding:10px;

            border-right: 1px solid white;
    }
    .orange 
    {
      color: #D99F64;    
    }
      
    .noborder
    {
        border-right:none;
    }
    
    #header
    {
        background-color: #222953;   
        margin-bottom:0px;
        padding-bottom:0px;
        padding: 30px;
        
    }
    
    #navigation 
    {
        background-color: #578BB8;
        margin-top: 0px;
        padding-top:0px;
    }
      
    img 
    {
        
    margin-bottom:20px;   
    }
    .container 
    {
     background-color: #FFFFFF;   
    }
    
    
    .contactbox {  border: 2px solid grey; }
      
      </style>
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
    <div >
<div class="row">
              
       <div id="header">
		<p class="text-left orange"><h2 class="orange"><?php echo $xml->faculty[$id]->fullname; ?></h2></p>
		<p class="text-left orange" style="margin-left: 20px;"><?php echo $xml->faculty[$id]->position; ?><br/><?php echo $xml->faculty[$id]->university; ?></p>
	</div>
    
	<div id="navigation">
		<ul class="list-inline">
            <li class="orangeNav noborder">  </li>
			<li class="orangeNav"><a class="orange"href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=1"?>">Home</a></li>
                        <li class="orangeNav"><a class="orange" href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=2"?>">Research</a></li>
                        <li class="orangeNav"><a class="orange"href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=3"?>">Publications</a></li>
                        
                        <li class="orangeNav"><a class="orange"href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=4"?>">Teaching</a></li>
                        <li class="orangeNav"><a class="orange"href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=5"?>">Background</a></li>
            
       

		</ul>
	</div>
              
              
</div> 
        <!-- end row -->   
        

</div>  <!-- end jumbotron -->
    
<div class="row">
    <?php if ($_GET['p']==1) { ?>
    <div class="col-xs-8"> 
        
    <div class="col-xs-12"> <h4>Welcome</h4><?php echo $xml->faculty[$id]->welcome; ?><br/><br/>
                </div>
        
    <div class="col-xs-6 bg-warning contactbox"> <h4>Contact Information</h4>
        
              
              
            <address>
                <strong>Office Location: </strong><br>
                    <?php echo $xml->faculty[$id]->officeLoc; ?>
                <br/><br/>
                <strong><abbr title="Phone">Phone:</abbr></strong> <?php echo $xml->faculty[$id]->phone; ?>
                <br/>
                <strong><abbr title="Office Hours">Office Hours:</abbr></strong><?php echo $xml->faculty[$id]->officeHrs; ?> 
                <br/>
                <strong><abbr title="Fax">Fax:</abbr></strong><?php echo $xml->faculty[$id]->fax; ?></br/>
            </address>

            <address>
                <strong>Email Me: </strong><br>
                <a href="mailto:<?php echo $xml->faculty[$id]->email; ?>"><?php echo $xml->faculty[$id]->email; ?></a>
            </address>

            <strong>Teaching Assistants</strong>
            <p><?php echo $xml->faculty[$id]->ta; ?></p>
            <p><strong>Assistant E-mail:</strong><a href="mailto:<?php echo $xml->faculty[$id]->taEmail; ?>"><?php echo $xml->faculty[$id]->taEmail; ?></a></p>
            </div>
    
    
    
    
    
    <div class="col-xs-6"> 
        
       <?php 
                $researchSection = $xml->faculty[$id]->research->count(); 
                if ($researchSection != 0)
                {
                    $projectCount = $xml->faculty[$id]->research->project->count();
                    if ($projectCount != 0)
                    {
                    ?>
                    <strong><h4>Research Projects</h4></strong>

                  <ul>
                      <?php 
                        for ($i=0; $i < $projectCount; $i++)
                        {  ?>
                        <li><?php echo $xml->faculty[$id]->research->project[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ul> <?php }
                }?> 
    
        </div>

    </div>
    
    
    
    <div class="col-xs-4"> <img src="<?php echo $xml->faculty[$id]->profilepic; ?>" width="200px" height="200px"></img>
      
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
      
      
    <?php } //end of page 1 
      
      
       if ($_GET['p']==2) { ?>
      
      <div class="col-xs-12 bg-success">
          
         <?php 
                $researchSection = $xml->faculty[$id]->research->count(); 
                if ($researchSection != 0)
                {
                    $projectCount = $xml->faculty[$id]->research->project->count();
                    if ($projectCount != 0)
                    {
                    ?>
                    <strong><h4>Research Projects</h4></strong>

                  <ul>
                      <?php 
                        for ($i=0; $i < $projectCount; $i++)
                        {  ?>
                        <li><?php echo $xml->faculty[$id]->research->project[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ul> <?php }
                }?> 
    </div>
      
    <?php }  //end of page 2 - research 
      

      
             if ($_GET['p']==3) { ?>
      
      <div class="col-xs-12 bg-success">
          
           <?php 
                $publicationSection = $xml->faculty[$id]->publications->count(); 
                
                
                if (($publicationSection != 0))
                {
                    
                    $articleCount = $xml->faculty[$id]->publications->article->count();
                    if ($articleCount !=0){
                    ?>
                    <strong><h4>Publications and Papers</h4></strong>

                  <ul>
                      <?php 
                        for ($i=0; $i < $articleCount; $i++)
                        {  ?>
                        
                        <li><?php echo $xml->faculty[$id]->publications->article[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ul> <?php }
                }?>
    </div>
      
    <?php }  //end of page 3 publications
      
      
      if ($_GET['p']==4) { ?>
      
      <div class="col-xs-12 bg-success">
          
                        <?php 
                $classesSection = $xml->faculty[$id]->classes->count(); 
                
                
                if (($classesSection != 0))
                {
                    
                    $classCount = $xml->faculty[$id]->classes->class->count();
                    if ($classCount !=0){
                    ?>
                    <p><strong><h4>Current Classes</h4></strong></p>

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
    </div>
      
    <?php }  //end of page 4 - classes 
      
         if ($_GET['p']==5) { ?>
      
      <div class="col-xs-12 bg-success">
          
    <?php 
                $educationSection = $xml->faculty[$id]->education->count(); 
                
                
                if (($educationSection != 0))
                {
                    
                    $credentialCount = $xml->faculty[$id]->education->credential->count();
                    if ($credentialCount !=0){
                    ?>
                    <strong><h4>Education and Professional Associations</h4></strong>

                  <ul>
                      <?php 
                        for ($i=0; $i < $credentialCount; $i++)
                        {  ?>
                        
                        <li><?php echo $xml->faculty[$id]->education->credential[$i]; ?></li>
                        <br/>
                        <?php 
                        } ?>
                 </ul> <?php }
                }?>
    </div>
      
    <?php }  //end of page 5 - background/education 
      
      
      
      ?>  
      
      
      
</div> <!-- end row -->
</div>  <!-- end container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>