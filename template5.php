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
        background-color: #DDDDDD; 
        
    }
      
    .orangeNav 
    {
            padding:10px;

            border-right: 1px solid #657383;
    }
    .white 
    {
      color: #FFFFFF;    
    }
    
    .red 
    {
        color: #AD1951;
        
    }
      
    .noborder
    {
        border-right:none;
    }
    
    #header
    {
        background-color: #FFFFFF;   
        margin-bottom:0px;
        padding-bottom:0px;
        padding: 30px;
        
    }
    
    #navigation 
    {
        background-color: #AD1A1A;
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
      
    h4, h3
    {
     color: #325B74;
    }
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

		<p class="text-center red" style="margin-left: 20px;"><?php echo $xml->faculty[$id]->position; ?><br/><?php echo $xml->faculty[$id]->university; ?></p>
	</div>
    
	<div id="navigation">
		<ul class="list-inline">
            <li class="orangeNav noborder">  </li>
			<li class="orangeNav"><a class="white"href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=1"?>">Home</a></li>
                        <li class="orangeNav"><a class="white" href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=2"?>">Projects</a></li>
                        <li class="orangeNav"><a class="white"href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=3"?>">Publications</a></li>
                        <li class="orangeNav"><a class="white"href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=4"?>">Teaching</a></li>
                        <li class="orangeNav"><a class="white"href="<?php echo $_SERVER['PHP_SELF'] . "?id=".$id ."&p=5"?>">Background</a></li>
        
            <li class="dropdown">
                    <a class="dropdown-toggle white" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      Other Links <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        
        <?php   
        $sections = $xml->faculty[$id]->customSections->section->count();
        for ($i=0; $i<$sections; $i++)
    {
        $s=$i;
        ?>
         <li class="orangeNav"><a class="white" href="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id . "&p=6&s=" . $s; ?>"><?php echo $xml->faculty[$id]->customSections->section[$i]->name; ?></a></li>


        <?php
    }
      
        ?>            
    </ul></li>
                        
            
            
            
        

            
            

            
        </ul>   	
	</div>
                         
</div> 
        <!-- end row -->   
        

</div>  <!-- end jumbotron -->
    
<div class="row">
    <?php if ($_GET['p']==1) { ?>
    <div class="col-xs-12"> 
    <div class="col-xs-3"><img src="<?php echo $xml->faculty[$id]->profilepic; ?>" width="150px" height="150px"></img></div>
    <div class="col-xs-9"> <h3><?php echo $xml->faculty[$id]->fullname; ?></h3><?php echo $xml->faculty[$id]->welcome; ?><br/><br/>
                
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
    </div>
    <div class="col-xs-12"><h4>About </h4>
 <?php echo $xml->faculty[$id]->bio; ?>

            </div>
    
  
      
    <?php } //end of page 1 
      
      
       if ($_GET['p']==2) { ?>
      
      <div class="col-xs-12">
          
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
      
      <div class="col-xs-12">
          
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
      
      <div class="col-xs-12">
          
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
      
      <div class="col-xs-12">
          
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
      
      
 

if ($_GET['p']==6)
{
    
    $s = (int) $_GET['s'];
    ?>
    <div class="col-xs-12 ">
        <h3><?php echo $xml->faculty[$id]->customSections->section[$s]->name; ?> </h3>
        <?php
    $items = $xml->faculty[$id]->customSections->section[$s]->items->item->count();
    ?>
        <strong><h4><?php $xml->faculty[$id]->customSections->section[$s] ?></h4></strong>

                  <ul>
        
        
        <?php
    for ($i=0; $i<$items; $i++)
         
         {
             ?> 
            <li><?php echo $xml->faculty[$id]->customSections->section[$s]->items->item[$i]; ?></li>     
            <?php
             
         }




?>
</ul>

</div> <?php
}


      ?>  
      
      
      
</div> <!-- end row -->
</div>  <!-- end container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap.min.js"></script>
  </body>
</html>