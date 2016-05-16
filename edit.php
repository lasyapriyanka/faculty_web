<?php // EDIT page - only accessible through successful login page.  This page displays all of your current information stored in the xml file so you can edit and save it. 
if (isset($_POST['SaveEdits']))
{
    //once the form is submitted - save the edits and then display the form again so the user can continue to edit their profile.  
    $file = 'write1.xml';
    $xml = simplexml_load_file($file);  
    $id = (int) $_POST['id'];
 
    //  SAVE ALL THE BASIC INFORMATION INCLUDED WITH EVERY PROFILE
    $xmlFormat = $xml->asXML();
    $xml->faculty[$id]->fullname = $_POST['fullname'];
    $xml->faculty[$id]->email = $_POST['email'];
    $xml->faculty[$id]->username= $_POST['username'];
    $xml->faculty[$id]->password= $_POST['password'];
    $xml->faculty[$id]->profilepic= $_POST['profilepic'];
    $xml->faculty[$id]->position= $_POST['position'];
    $xml->faculty[$id]->university= $_POST['university'];
    $xml->faculty[$id]->phone = $_POST['phone'];
    $xml->faculty[$id]->fax = $_POST['fax'];
    $xml->faculty[$id]->ta= $_POST['ta'];
    $xml->faculty[$id]->taEmail= $_POST['taEmail'];
    $xml->faculty[$id]->officeLoc= $_POST['officeloc'];
    $xml->faculty[$id]->officeHrs= $_POST['officehrs'];
    $xml->faculty[$id]->bio= $_POST['bio'];
    $xml->faculty[$id]->welcome= $_POST['welcome'];
    
    if (!$_POST['template']) {
        $Template = 1;}
    else {
        $Template = $_POST['template'];
    }
    $xml->faculty[$id]->template=$Template;
    
    
    //SAVE EDITS to existing ITEMS.  
    $projectCount = $articleCount = $credentialCount = $classCount = 0;  
    $researchCount = $xml->faculty[$id]->research->count();
        if ($researchCount !=0){
        $projectCount = $xml->faculty[$id]->research->project->count();}
    $publicationCount = $xml->faculty[$id]->publications->count();
         if ($publicationCount !=0) {$articleCount = $xml->faculty[$id]->publications->article->count();}
    $educationCount = $xml->faculty[$id]->education->count();
        if ($educationCount !=0) {$credentialCount = $xml->faculty[$id]->education->credential->count();}
    $classesCount = $xml->faculty[$id]->classes->count();
        if ($classesCount!=0){$classCount = $xml->faculty[$id]->classes->class->count();}
    $customSecCount = $xml->faculty[$id]->customSections->count();
    
    if ($researchCount==0)   //If there are no research entries yet then ask if the user would like to add some
   {
            $researchNum = (int) $_POST['researchNum'];
                    for ($q = 1; $q < (($researchNum)+1); $q += 1) 
                        {
                            $xml->faculty[$id]->research->project[$q-1] = "";
                        }        
   }
    elseif (($researchCount!=0) && ($projectCount!=0))  //If there are research entries then display them for the user to edit, delete, or add to.
    {
            $projectsCurrentItems = $xml->faculty[$id]->research->project->count();    
        
            for ($i=0; $i<$projectsCurrentItems; $i++) //go through items and save edits to them 
            {
                $xml->faculty[$id]->research->project[$i] = $_POST['rNum'.$i];
                
            }
        

            $researchAdd = (int) $_POST['researchAdd'];
            $newTotal = $projectsCurrentItems + $researchAdd;
            for ($k = $projectsCurrentItems; $k < $newTotal; $k++)  // Add new Items if necessary
            {
                $xml->faculty[$id]->research->project[$k] = "";            
            }  
        
            for ($i=0; $i<$projectsCurrentItems; $i++)  //go through items to see if they need to be deleted
            {

                if (isset($_POST['DelResearch'.$i]) && $_POST['DelResearch'.$i]=='Yes')
                {
                    unset($xml->faculty[$id]->research->project[$i]); //delete entry 
                }
              
            }
            
    }
      
        if (($publicationCount==0))
   {
            $pubNum = (int) $_POST['pubNum'];


            for ($q = 1; $q < (($pubNum)+1); $q += 1) 
            {
                $xml->faculty[$id]->publications->article[$q-1] = "";
            }
   }
    elseif (($publicationCount!=0)&& ($articleCount!=0))
        
    {

            $articlesCurrentItems = $xml->faculty[$id]->publications->article->count();
        
            for ($i=0; $i<$articlesCurrentItems; $i++) //go through items and save edits to them 
            {
                $xml->faculty[$id]->publications->article[$i] = $_POST['pNum'.$i];
                
            }
        
            $pubAdd = (int) $_POST['pubAdd'];
            $newTotal = $articlesCurrentItems + $pubAdd;
            for ($k = $articlesCurrentItems; $k < $newTotal; $k++)  // Add new items if necessary 
            {
                $xml->faculty[$id]->publications->article[$k] = "";
                
            }
        
            for ($i=0; $i<$articlesCurrentItems; $i++)  //go through items to see if they need to be deleted
            {

                if (isset($_POST['DelPub'.$i]) && $_POST['DelPub'.$i]=='Yes')
                {
                    unset($xml->faculty[$id]->publications->article[$i]); //delete entry 
                }
              
            }
    }
    
        if ($educationCount==0)
   {
            $credNum = (int) $_POST['credNum'];
            
            for ($q = 1; $q < (($credNum)+1); $q += 1) 
            {
                $xml->faculty[$id]->education->credential[$q-1] = "";
            }
   }
    elseif (($educationCount!=0) && ($credentialCount!=0))
    {
            $credsCurrentItems = $xml->faculty[$id]->education->credential->count();    
        
            for ($i=0; $i<$credsCurrentItems; $i++) //go through items and save edits to them 
            {
                $xml->faculty[$id]->education->credential[$i] = $_POST['crNum'.$i];
                
            }
        
            $crAdd = (int) $_POST['crAdd'];
            $newTotal = $credsCurrentItems + $crAdd;
            for ($k = $credsCurrentItems; $k < $newTotal; $k++)  // Adding New items if necessary 
            {
                $xml->faculty[$id]->education->credential[$k] = "";
                
            }
        
            for ($i=0; $i<$credsCurrentItems; $i++)  //go through items to see if they need to be deleted
            {

                if (isset($_POST['DelEdu'.$i]) && $_POST['DelEdu'.$i]=='Yes')
                {
                    unset($xml->faculty[$id]->education->credential[$i]); //delete entry 
                }
              
            }
    }
    
        if ($classesCount==0)
   {
            $classNum = (int) $_POST['classNum'];
            
  
            for ($q = 1; $q < (($classNum)+1); $q += 1) 
            {
                $xml->faculty[$id]->classes->class[$q-1] = "";
            }
   }
    elseif (($classesCount!=0) && ($classCount!=0)) //($classesCount!=0) && ($classCount!=0)
    {
             $classesCurrentItems = $xml->faculty[$id]->classes->class->count();
        
            for ($i=0; $i<$classesCurrentItems; $i++) //go through items and save edits to them 
            {
                $xml->faculty[$id]->classes->class[$i] = $_POST['clNum'.$i];
                
            }
        
            $clAdd = (int) $_POST['clAdd'];  
            $newTotal = $classesCurrentItems + $clAdd;
            for ($k = $classesCurrentItems; $k < $newTotal; $k++) // add new items if necessary
            {
                $xml->faculty[$id]->classes->class[$k] = "";
                
            }
        
            for ($i=0; $i<$classesCurrentItems; $i++)  //go through items to see if they need to be deleted
            {

                if (isset($_POST['DelClass'.$i]) && $_POST['DelClass'.$i]=='Yes')
                {
                    unset($xml->faculty[$id]->classes->class[$i]); //delete entry 
                }
              
            }
    }
    
//Deal with Custom Sections - go through all existing sections, save edits to existing items in them and then add new items to sections where needed.  After that, delete items that were marked for deletion.
    
    if ($xml->faculty[$id]->customSections->count() != 0) 
    {$sections = $xml->faculty[$id]->customSections->section->count();}
    else {$sections=0;}
    
    for ($h=0; $h<$sections; $h++) //go through all the existing sections
    {   
        
        $CustCurrentItems = $xml->faculty[$id]->customSections->section[$h]->items->item->count(); // # of items in this section
        
        //*********************Go through and save edits made to currently existing items
        $xml->faculty[$id]->customSections->section[$h]->name = $_POST['Cust'.$h]; //Save edits to Section Names
        for ($q=0; $q<$CustCurrentItems; $q++)
        {
            $xml->faculty[$id]->customSections->section[$h]->items->item[$q] = $_POST['Cust'.$h.$q];  //save edits to items in each section
        }
        
        
          
        if ($_POST['CustNewItems'.$h] != 0) //If the user wants to add more items to this section...
        {
        $CustAdd = (int) $_POST['CustNewItems'.$h]; //how many items to add  
        $newTotal = $CustAdd + $CustCurrentItems;
         for ($k = $CustCurrentItems; $k<$newTotal; $k++) //add new items 
            {
                $xml->faculty[$id]->customSections->section[$h]->items->item[$k] = ""; //create new items with no value inside
            }
        }
        
        for ($q=0; $q<$CustCurrentItems; $q++) //go through items to see if any need to be deleted
        {
            if(isset($_POST['DelCust'.$h . $q]) &&  $_POST['DelCust' . $h.$q] == 'Yes') //was the checkmark checked?
            {
                unset($xml->faculty[$id]->customSections->section[$h]->items->item[$q]);  //delete selected item 
            }        
        }     
    }
   
    // ADD NEW CUSTOM SECTION AND THEIR INFO TO THE XML FILE
    if (($_POST['CustomNewName'] != "") && ($_POST['CustNewNum'] != 0))  //If Name and number of items for a new section was input, then create a new section 
    {
        if ($customSecCount == 0)  //If there are currently no custom sections, then create the first one.
        {
                $p=0;
                $Items = $_POST['CustNewNum'];
                $SectionName = $_POST['CustomNewName'];
            
                $xml->faculty[$id]->customSections->section[$p]->name=$SectionName;
                for ($q = 1; $q < (($Items)+1); $q += 1) 
                    {
                        $xml->faculty[$id]->customSections->section[$p]->items->item[$q-1] = "";  
                    }
            }             
        if ($customSecCount != 0)  //If there are other custom sections then add a new one to the list.
        {
        $p= $xml->faculty[$id]->customSections->section->count();        
        echo "creating new section named: " . $_POST['CustomNewName'] . "with this many items : " . $_POST['CustNewNum'] . "The sections ID will be: " . $p . ".";                       
                $xml->faculty[$id]->customSections->section[$p]->name=$_POST['CustomNewName'];
                for ($q = 1; $q < (($_POST['CustNewNum'])+1); $q += 1) 
                    {
                        $xml->faculty[$id]->customSections->section[$p]->items->item[$q-1] = "";  
                    }       
        }
    }

    $xml->asXML($file); //save modifications to xml data 
}
/********************************************************************************************************************************/


if (isset($_POST['submit']))  //display form for user to edit their faculty profile. 
    {
        include("header.html");
        $file = 'write1.xml';
        $xml = simplexml_load_file($file);
        $total = $xml->count();
        
        $verified=false;
        $error='<p class="bg-danger danger">You have entered an invalid username, please try again.</p><h6>If you cannot remember your password or username please contact the webmaster for that information.</h6>';
        for ($i=0; $i<$total; $i++)
        {
            if ($_POST['inputUsername'] == $xml->faculty[$i]->username)  //check to see if username is correct.  
                {
                    $id = $i;
                    if($_POST['inputPassword'] == $xml->faculty[$i]->password)
                    {
                        $verified = TRUE;
                         
                    }
                    else
                    {
                        $verified = FALSE;
                        $error = '<p class="bg-danger danger">You have entered the wrong password, please try again.</p><h6>If you cannot remember your password or username please contact the webmaster for that information.</h6>';
                    }
                }
        }
    
        if ($verified)  //If the user entered the correct username and password then display the form for them to edit their items. 
        {

            ?>
                 <!-- HTML form -->  

    <div class="row">
        <FORM action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <div class="form-group col-xs-4">
                <label for="fullname">Full Name: </label>
                <input type="text" class="form-control" name="fullname" value="<?php echo $xml->faculty[$id]->fullname; ?>">
            </div>          
            <div class="form-group col-xs-4">
                <label for="username">Username to access editing of your page: </label>
                <input type="text" class="form-control" name="username" value="<?php echo $xml->faculty[$id]->username; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="password">Password: </label>
                <input type="password" class="form-control" name="password" value="<?php echo $xml->faculty[$id]->password; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="email">Email: </label>
                <input type="email" class="form-control" name="email" value="<?php echo $xml->faculty[$id]->email; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="profilepic">Profile Picture: </label>
                <input type="text" name="profilepic"  value="<?php echo $xml->faculty[$id]->profilepic; ?>"><br/>
                <p class="help-block"><h5>*Write down your username and password - it is the only way to edit your faculty page after creating it.</h5></p>
            </div>         
            <div class="form-group col-xs-4">
                <label for="position">Position or Job Title: </label>
                <input type="text" class="form-control" name="position" value="<?php echo $xml->faculty[$id]->position; ?>">
            </div>           
            <div class="form-group col-xs-4">
                <label for="university">University Name: </label>
                <input type="text" class="form-control" name="university" value="<?php echo $xml->faculty[$id]->university; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="phone">Phone Number: </label>
                <input type="text" class="form-control" name="phone" value="<?php echo $xml->faculty[$id]->phone; ?>">
            </div>       
            <div class="form-group col-xs-4">
                <label for="fax">Fax: </label>
                <input type="text" class="form-control" name="fax" value="<?php echo $xml->faculty[$id]->fax; ?>">
            </div>            
            <div class="form-group col-xs-4">
                <label for="ta">TA: </label>
                <input type="text" class="form-control" name="ta" value="<?php echo $xml->faculty[$id]->ta; ?>">
            </div>         
            <div class="form-group col-xs-4">
                <label for="taEmail">TA Email: </label>
                <input type="text" class="form-control" name="taEmail" value="<?php echo $xml->faculty[$id]->taEmail; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="officeloc">Office location: </label>
                <input type="text" class="form-control" name="officeloc" value="<?php echo $xml->faculty[$id]->officeLoc; ?>">
            </div>       
            <div class="form-group col-xs-4">
                <label for="officehrs">Office Hours: </label>
                <input type="text" class="form-control" name="officehrs" value="<?php echo $xml->faculty[$id]->officeHrs; ?>">
            </div>        
            <div class="form-group col-xs-4">
                <label for="welcome">Welcome Statement for webpage: </label>
                <textarea name="welcome" class="form-control" rows="3" value=""><?php echo $xml->faculty[$id]->welcome; ?></textarea>
            </div>             
            <div class="form-group col-xs-4">
                <label for="bio">Short Biography Paragraph: </label>
                <textarea name="bio" class="form-control" rows="3" value=""><?php echo $xml->faculty[$id]->bio; ?></textarea>
            </div>
            <div class="form-group col-xs-12">
                
            </div>
            
<!-- DISPLAY THE MULTI ITEM CATEGORIES BELOW  - CONTINUATION OF HTML FORM -->  
<?php 
   // How many items are in each section and what sections exist?  
    if ($xml->faculty[$id]->research->count() != 0)
    {
        $researchCount = $xml->faculty[$id]->research->project->count();
    }
        else
        {
            $researchCount = 0;
        }
            
    if ($xml->faculty[$id]->publications->count() != 0)
    {
        $publicationCount = $xml->faculty[$id]->publications->article->count();
    }
        else
        {
            $publicationCount=0;
        }         
            
    if ($xml->faculty[$id]->education->count() != 0)
    {
        $educationCount = $xml->faculty[$id]->education->credential->count();
    }
        else
        {
            $educationCount=0;
        }               
            
    if ($xml->faculty[$id]->classes->count() != 0)
    {
        $classesCount = $xml->faculty[$id]->classes->class->count();
    }
        else
        {
            $classesCount=0;
        }       
    
            
    
    if ($xml->faculty[$id]->customSections->count() != 0)
    {
           $customSecCount = $xml->faculty[$id]->customSections->section->count();
    }
            else
            {
                $customSecCount = 0;
            }
            
            
    // Display a form to add # of entries of there are no entries - and display already entered items if they exist      
            
   if ($researchCount==0)
   {
       ?>
            <div class="form-group"> 
                <div class="col-xs-3">You have no Research projects listed.</div>
                <label class = "col-xs-7"for="researchNum">How many Research projects would you like to add, if any?</label>
                <div class="col-xs-2"><input type="number" name="researchNum" placeholder=""/></div>
            </div>
        
        
        <?php
   }
    elseif ($researchCount!=0)
    {
        ?>
                <div class="form-group col-xs-12">
                <label class="col-xs-12"for="ResearchList">Research Projects</label> 
                <input type="hidden" name="researchNum" value="<?php echo $researchCount; ?>"/>
                </div>     
                <?php 
                    for ($q = 1; $q < (($researchCount)+1); $q += 1) {
                        $value=$xml->faculty[$id]->research->project[($q-1)];
                ?>
                            <div class="col-xs-4"></div>
                            <div class="form-group col-xs-8">   
                                <label class="col-xs-2" >Research <?php  echo $q; ?>:</label>
                                <div class="col-xs-7"> <input type="text" class="form-control" name="<?php echo 'rNum'.($q-1).'';?>" value="<?php echo $value ?>"></input></div><div class=" red col-xs-3">Delete Item?  <input type="checkbox" name="<?php echo 'DelResearch' . ($q-1) . '';?>" value="Yes" /></div>
                            </div>
                <?php       
                            }  
         ?>
            <div class="form-group col-xs-12">
                <div class="col-xs-3"></div>
                <label for="researchNewNum" class="col-xs-7">How many new projects would you like to add, if any?</label>
                <div class="col-xs-2"><input type="number" id="researchNewNum" name="researchAdd" placeholder="" ></input></div>
            </div>
<?php
    }
            
            
            
            
            
    if ($publicationCount==0)
    {
        ?>
            <div class="form-group col-xs-12">
                <div class="col-xs-3">You have no publications listed.</div>
                <label for="pubNum" class="col-xs-7">How many publications would you like to add?</label>
                <div class="col-xs-2"><input type="number" name="pubNum" placeholder=""/></div>
            </div>
        <?php
    }
    elseif ($publicationCount!=0)
    {
        ?>
            <div class="form-group col-xs-12">
                <label class="col-xs-12"for="Publications">Publications and/or Articles</label>
                <input type="hidden" name="pubNum" value="<?php echo $publicationCount; ?>"/>
            </div>             
                <?php 
                    for ($q = 1; $q < (($publicationCount)+1); $q += 1) {
                        $value=$xml->faculty[$id]->publications->article[($q-1)];
                ?>
                            <div class="col-xs-4"></div>
                            <div class="form-group col-xs-8">
                                <label class="col-xs-2" >Publication <?php  echo $q; ?>:</label>
                                <div class="col-xs-7"> <input type="text" class="form-control" name="<?php echo 'pNum'.($q-1).'';?>" value="<?php echo $value; ?>"></input></div><div class=" red col-xs-3">Delete Item?  <input type="checkbox" name="<?php echo 'DelPub' . ($q-1) . '';?>" value="Yes" /></div>
                            </div>
                <?php       
                            }
         ?>
            <div class="form-group col-xs-12">
                <div class="col-xs-3"></div>
                <label for="pubNewNum" class="col-xs-7">How many new articles would you like to add, if any?</label>
                <div class="col-xs-2"><input type="number" name="pubAdd" placeholder=""/></div>
            </div>
<?php

    }
         
            
            
    if ($educationCount==0)
    { 
        ?>
            <div class="form-group col-xs-12">
                <div class="col-xs-3">You have no credentials listed.</div>
                <label for="credNum" class="col-xs-7">How many credentials/professional associations would you like to add?</label>
                <div class="col-xs-2"><input type="number" name="credNum" placeholder=""/></div>
            </div>
        <?php
    }
    elseif ($educationCount!=0)
    {
        ?>
        <div class="form-group col-xs-12">
                <label class="col-xs-12"for="Education">Education and Professional Associations</label>
                <input type="hidden" name="credNum" value="<?php echo $educationCount; ?>"/>
            </div>             
                <?php 
                    for ($q = 1; $q < (($educationCount)+1); $q += 1) {
                        $value=$xml->faculty[$id]->education->credential[($q-1)];
                ?>
                            <div class="col-xs-4"></div>
                            <div class="form-group col-xs-8">
                                <label class="col-xs-2" >Entry <?php  echo $q; ?>:</label>
                                <div class="col-xs-7"> <input type="text" class="form-control" name="<?php echo 'crNum'.($q-1).'';?>" value="<?php echo $value; ?>"></input></div><div class=" red col-xs-3">Delete Item?  <input type="checkbox" name="<?php echo 'DelEdu' . ($q-1) . '';?>" value="Yes" /></div>
                            </div>
                <?php       
                            }
                ?>
            <div class="form-group col-xs-12">
                <div class="col-xs-3"></div>
                <label for="crNewNum" class="col-xs-7">How many new credentials would you like to add, if any?</label>
                <div class="col-xs-2"><input type="number" name="crAdd" placeholder=""/></div>
            </div>
<?php
    }
            
            
            
    if ($classesCount==0)
    {
        ?>
            <div class="form-group col-xs-12">
                <div class="col-xs-3">You have no classes listed.</div>
                <label for="classNum" class="col-xs-7">How many Classes would you like to add?</label>
                <div class="col-xs-2"><input type="number" name="classNum" placeholder=""/></div>
            </div>
        <?php
    }
    elseif ($classesCount!=0)
    {
        ?>
        <div class="form-group col-xs-12">
                <label class="col-xs-12"for="Classes">Classes</label>
                <input type="hidden" name="classNum" value="<?php echo $classesCount; ?>"/>
            </div>             
                <?php 
                    for ($q = 1; $q < (($classesCount)+1); $q += 1) {
                        $value=$xml->faculty[$id]->classes->class[($q-1)];
                ?>
                            <div class="col-xs-4"></div>
                            <div class="form-group col-xs-8">
                                <label class="col-xs-2" >Course <?php  echo $q; ?>:</label>
                                <div class="col-xs-7"> <input type="text" class="form-control" name="<?php echo 'clNum'.($q-1).'';?>" value="<?php echo $value; ?>"></input></div><div class=" red col-xs-3">Delete Item?  <input type="checkbox" name="<?php echo 'DelClass' . ($q-1) . '';?>" value="Yes" /></div>
                            </div>
                <?php       
                            }
        
        
                ?>

            <div class="form-group col-xs-12">
                <div class="col-xs-3"></div>
                <label for="clNewNum" class="col-xs-7">How many new classes would you like to add, if any?</label>
                <div class="col-xs-2"><input type="number" name="clAdd" placeholder=""/></div>
            </div>
<?php
    }

    /***************************************************CUSTOM SECTIONS FORMS BELOW ******************************/
    // GENERATE CUSTOM SECTIONS THE DYNAMICALLY INCLUDED NUMBER OF ITEMS TO FILL OUT - CONTNIUING HTML FORM STILL
    
            
            for ($i=1; $i<$customSecCount+1; $i+=1) 
                {    
                            //count how many items are in the current section.  display that many items. if items is 0 say there are no items and have add option . 
                            //if item count is not zero, display current items and have box to add items under neath. 
                
                $a = $i-1;
                //echo $a;
                $itemsNum = $xml->faculty[$id]->customSections->section[$a]->items->item->count();
                //echo "section number " . $a . " has " . $itemsNum . " many items listed";
                
                ?>
                            
                            <div class="form-group col-xs-12">
                                <label class="col-xs-3"for="Cust <?php echo 'Cust'. $a . ''; ?>">Custom Section Name: </label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" name="Cust<?php echo $a; ?>" value="<?php echo $xml->faculty[$id]->customSections->section[$a]->name; ?>"></input>
                                </div>
                            </div>
              <?php 
                            for ($q = 1; $q < (($itemsNum)+1); $q += 1) {
                ?>
                                <div class="col-xs-4"></div>
                                <div class="form-group col-xs-8">
                                    <label class="col-xs-2" >Item <?php echo $q; ?></label>
                                    <div class="col-xs-7"> <input type="text" class="form-control" name="<?php echo 'Cust' . $a . ($q-1); ?>" value="<?php echo $xml->faculty[$id]->customSections->section[$a]->items->item[$q-1];?>"></input></div><div class=" red col-xs-3">Delete Item?  <input type="checkbox" name="<?php echo 'DelCust' . $a . ($q-1) . '';?>" value="Yes" /></div>
                                </div>
                <?php       
                                }
                ?>
            <div class="form-group col-xs-12">
                <div class="col-xs-3"></div>
                <label for="NewItems" class="col-xs-7">How many new items would you like to add to this section, if any?</label>
                <div class="col-xs-2"><input type="number" name="CustNewItems<?php echo $a; ?>" placeholder=""/></div>
            </div>
                <?php
                }    
                ?>

<!--**create a new section with x items.  **/-->

             <div class="form-group xs-col-12">
                <label for="CustomNew" class="col-xs-3"> Create a New Section </label>
                <div class="col-xs-4"><input type="text" class="form-control" name="CustomNewName" placeholder="Enter New Section name"></div>
                <label for="CustonNewNum" class="col-xs-3">How many entries in this section?</label>
                <div class="col-xs-2"><input type="number" name="CustNewNum" placeholder=""/></div>
            </div> 



<!-- let the user select their template.  If nothing is selected - the template will be template number 1-->
<div class="form-group col-xs-12">
<input type="radio" name="template" value="1" <?php if ($xml->faculty[$id]->template == 1) echo "checked"; ?>/><img src="Template1.png"/>
<input type="radio" name="template" value="2" <?php if ($xml->faculty[$id]->template == 2) echo "checked"; ?>/><img src="Template2.png"/>
<input type="radio" name="template" value="3" <?php if ($xml->faculty[$id]->template == 3) echo "checked"; ?>/><img src="Template3.png"/>
<input type="radio" name="template" value="4" <?php if ($xml->faculty[$id]->template == 4) echo "checked"; ?>/><img src="Template4.png"/>
<input type="radio" name="template" value="5" <?php if ($xml->faculty[$id]->template == 5) echo "checked"; ?>/><img src="Template5.png"/>
</div>


            <input type="hidden" name="inputUsername" value="<?php echo $_POST['inputUsername']; ?>"/>
            <input type="hidden" name="inputPassword" value="<?php echo $_POST['inputPassword']; ?>"/>
            <div class="xs-col-12"><input type="hidden" name="submit" value="" /></div>
            <div class="xs-col-12"><input type="submit" name="SaveEdits" value="Submit and Save" class="btn btn-default col-xs-12 btn-success"></div>    



<!-- </BUTTON> -->
            <div></div>



        </form>
    </div>

<?php
        }  //end IF ($verified) statement condition. 
    /*************************************************************************************/
        elseif (!$verified)
        {
            echo $error;   //Wrong username or password entered, send back to login page.
        }
    
        include("footer.html");
}

else  //REDIRECT TO LOGIN PAGE to login correctly - wrong user name or password submitted, or the user tried to access this page without going through the log in form. 
{
    header("Location: login.php");
die();
}





?>