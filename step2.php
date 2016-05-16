<?php  //DISPLAY FORM WITH ENTRY AREAS FOR ITEMS IN THE SECTION CATEGORIES.  PRE FILL MAIN AREA OF FORM
if (isset($_POST['submitNew']))
    {
        include("header.html");
?>
      <!-- HTML form -->  

    <div class="row">
        <FORM action="step2.php" method="post">
            <div class="form-group col-xs-4">
                <label for="fullname">Full Name: </label>
                <input type="text" class="form-control" name="fullname" value="<?php echo $_POST['fullname']; ?>">
            </div>          
            <div class="form-group col-xs-4">
                <label for="username">Username to access editing of your page: </label>
                <input type="text" class="form-control" name="username" value="<?php echo $_POST['username']; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="password">Password: </label>
                <input type="password" class="form-control" name="password" value="<?php echo $_POST['password']; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="email">Email: </label>
                <input type="email" class="form-control" name="email" value="<?php echo $_POST['email']; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="profilepic">Profile Picture: </label>
                <input type="text" name="profilepic"  value="<?php echo $_POST['profilepic']; ?>"><br/>
                <p class="help-block">*Write down your username and password - it is the only way to edit your faculty page after creating it.</p>
            </div>         
            <div class="form-group col-xs-4">
                <label for="position">Position or Job Title: </label>
                <input type="text" class="form-control" name="position" value="<?php echo $_POST['position']; ?>">
            </div>           
            <div class="form-group col-xs-4">
                <label for="university">University Name: </label>
                <input type="text" class="form-control" name="university" value="<?php echo $_POST['university']; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="phone">Phone Number: </label>
                <input type="text" class="form-control" name="phone" value="<?php echo $_POST['phone']; ?>">
            </div>       
            <div class="form-group col-xs-4">
                <label for="fax">Fax: </label>
                <input type="text" class="form-control" name="fax" value="<?php echo $_POST['fax']; ?>">
            </div>            
            <div class="form-group col-xs-4">
                <label for="ta">TA: </label>
                <input type="text" class="form-control" name="ta" value="<?php echo $_POST['ta']; ?>">
            </div>         
            <div class="form-group col-xs-4">
                <label for="taEmail">TA Email: </label>
                <input type="text" class="form-control" name="taEmail" value="<?php echo $_POST['taEmail']; ?>">
            </div>
            <div class="form-group col-xs-4">
                <label for="officeloc">Office location: </label>
                <input type="text" class="form-control" name="officeloc" value="<?php echo $_POST['officeloc']; ?>">
            </div>       
            <div class="form-group col-xs-4">
                <label for="officehrs">Office Hours: </label>
                <input type="text" class="form-control" name="officehrs" value="<?php echo $_POST['officehrs']; ?>">
            </div>        
            <div class="form-group col-xs-4">
                <label for="welcome">Welcome Statement for webpage: </label>
                <textarea name="welcome" class="form-control" rows="3" value=""><?php echo $_POST['welcome']; ?></textarea>
            </div>             
            <div class="form-group col-xs-4">
                <label for="bio">Short Biography Paragraph: </label>
                <textarea name="bio" class="form-control" rows="3" value=""><?php echo $_POST['bio']; ?></textarea>
            </div>
            
<!-- DISPLAY THE MULTI ITEM CATEGORIES BELOW ACCORDING TO FIRST FORM - CONTINUATION OF HTML FORM -->        
            <div class="form-group col-xs-12">
                <label class="col-xs-8"for="ResearchList">Research Projects</label> 
                <input type="hidden" name="researchNum" value="<?php echo $_POST['researchNum']; ?>"/>
            </div>     
                <?php 
                    for ($q = 1; $q < (($_POST['researchNum'])+1); $q += 1) {
                ?>
                            <div class="col-xs-4"></div>
                            <div class="form-group col-xs-8">   
                                <label class="col-xs-3" >Research <?php  echo $q; ?>:</label>
                                <div class="col-xs-9"> <input type="text" class="form-control" name="<?php echo 'rNum'.$q.'';?>"></input></div>
                            </div>
                <?php       
                            }
                ?>
        
            <div class="form-group col-xs-12">
                <label class="col-xs-8"for="Publications">Publications/Articles</label>
                <input type="hidden" name="pubNum" value="<?php echo $_POST['pubNum']; ?>"/>
            </div>             
                <?php 
                    for ($q = 1; $q < (($_POST['pubNum'])+1); $q += 1) {
                ?>
                            <div class="col-xs-4"></div>
                            <div class="form-group col-xs-8">
                                <label class="col-xs-3" >Publication <?php  echo $q; ?>:</label>
                                <div class="col-xs-9"> <input type="text" class="form-control" name="<?php echo 'pNum'.$q.'';?>"></input></div>
                            </div>
                <?php       
                            }
                ?>

            <div class="form-group col-xs-12">
                <label class="col-xs-8"for="Education">Education and Professional Associations</label>
                <input type="hidden" name="credNum" value="<?php echo $_POST['credNum']; ?>"/>
            </div>             
                <?php 
                    for ($q = 1; $q < (($_POST['credNum'])+1); $q += 1) {
                ?>
                            <div class="col-xs-4"></div>
                            <div class="form-group col-xs-8">
                                <label class="col-xs-3" >Entry <?php  echo $q; ?>:</label>
                                <div class="col-xs-9"> <input type="text" class="form-control" name="<?php echo 'crNum'.$q.'';?>"></input></div>
                            </div>
                <?php       
                            }
                ?>   

            <div class="form-group col-xs-12">
                <label class="col-xs-8"for="Classes">Classes</label>
                <input type="hidden" name="classNum" value="<?php echo $_POST['classNum']; ?>"/>
            </div>             
                <?php 
                    for ($q = 1; $q < (($_POST['classNum'])+1); $q += 1) {
                ?>
                            <div class="col-xs-4"></div>
                            <div class="form-group col-xs-8">
                                <label class="col-xs-3" >Course <?php  echo $q; ?>:</label>
                                <div class="col-xs-9"> <input type="text" class="form-control" name="<?php echo 'clNum'.$q.'';?>"></input></div>
                            </div>
                <?php       
                            }
    
    
    // GENERATE CUSTOM SECTIONS THE DYNAMICALLY INCLUDED NUMBER OF ITEMS TO FILL OUT - CONTNIUING HTML FORM STILL
    
    
            for ($i = 1; $i < 8; $i += 1) 
                {    
                    if ($_POST['Cust'. $i . ''] != "")
                        {
                ?>
        
                            <div class="form-group col-xs-12">
                                <label class="col-xs-3"for="Cust <?php echo $_POST['Cust'. $i . '']; ?>">Custom Section Name: </label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" name="Cust<?php echo $i; ?>" value="<?php echo $_POST['Cust' . $i .'']; ?>"></input>
                                </div>
                                <input type="hidden" name="<?php echo 'Cust' . $i . 'Num'; ?>" value="<?php echo $_POST['Cust' . $i . 'Num']; ?>"/>
                            </div>
              <?php 
                            for ($q = 1; $q < (($_POST['Cust'.$i.'Num'])+1); $q += 1) {
                ?>
                                <div class="col-xs-4"></div>
                                <div class="form-group col-xs-8">
                                    <label class="col-xs-3" >Item <?php echo $q; ?></label>
                                    <div class="col-xs-9"> <input type="text" class="form-control" name="<?php echo 'Cust' . $i . $q; ?>"></input></div>
                                </div>
                <?php       
                                }
                        }
                    else    
                        {    
                ?>
                            <input type="hidden" name="Cust<?php echo $i; ?>" value=""/> 
                <?php
                        }
                }
                ?>
<div class="form-group col-xs-12">
<input type="radio" name="template" value="1" /><img src="Template1.png"/><br />
<input type="radio" name="template" value="2" /><img src="Template2.png"/><br />
<input type="radio" name="template" value="3" /><img src="Template3.png"/> <br />
<input type="radio" name="template" value="4" /><img src="Template4.png"/><br />
<input type="radio" name="template" value="5" /><img src="Template5.png"/><br/>
</div>


            <input type="submit" name="submitStep2" value="Submit" class="btn btn-default col-xs-12 btn-success">  <!-- </BUTTON> -->
            <div></div>
        </form>
    </div>
<?php
    include("footer.html");
}
/******************************End of Part 2 of Form************************************/


else if (isset($_POST['submitStep2']))  /******************Create New File************************/
    
{
    include("header.html");
    $file = 'write1.xml';
    $xml = simplexml_load_file($file);
    $id = $xml->count();
    
    //  SAVE ALL THE BASIC INFORMATION INCLUDED WITH EVERY PROFILE
    
    $xml->faculty[$id]->fullname = $_POST['fullname'];
    $xml->faculty[$id]->email = $_POST['email'];
    $xml->faculty[$id]->addAttribute('id', $_POST['username']);
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
    
    if (isset($_POST['template'])) {
        $Template = $_POST['template'];
    }
    
    else {
        $Template = 1; 
        
    }
    
    $xml->faculty[$id]->template = $Template; 

    
    // SAVE PRESET CATEGORIES LISTS AND THEIR ITEMS 
    
        for ($q = 1; $q < (($_POST['researchNum'])+1); $q += 1) 
            {
                $xml->faculty[$id]->research->project[$q-1] = $_POST["rNum". $q . ""];
            }
              
         for ($q = 1; $q < (($_POST['pubNum'])+1); $q += 1) 
            {
                $xml->faculty[$id]->publications->article[$q-1] = $_POST["pNum". $q . ""];
            }
    
        for ($q = 1; $q < (($_POST['credNum'])+1); $q += 1) 
            {
                $xml->faculty[$id]->education->credential[$q-1] = $_POST["crNum". $q . ""];
            }
    
        for ($q = 1; $q < (($_POST['classNum'])+1); $q += 1) 
            {
                $xml->faculty[$id]->classes->class[$q-1] = $_POST["clNum". $q . ""];
            }
    
    
    
    // SAVE CUSTOM SECTIONS AND THEIR INFO TO THE XML FILE
    
    $p=0;
    for ($i = 1; $i < 8; $i += 1) {           
        if ($_POST['Cust'. $i . ''] != "")
            {
                $xml->faculty[$id]->customSections->section[$p]->name=$_POST['Cust'.$i.''];
                for ($q = 1; $q < (($_POST['Cust'.$i.'Num'])+1); $q += 1) 
                    {
                        $xml->faculty[$id]->customSections->section[$p]->items->item[$q-1] = $_POST['Cust'.$i.$q.''];  
                    }
                $p+=1;
            }       
    }

    $xml->asXML($file);
    
    echo "<p>Thank you for creating your Faculty Page with us.</p>";
    include("footer.html");  
}
/**********************************End of Creating new Profile*********************************************/

else  //REDIRECT TO FIRST CREATE NEW PROFILE PAGE- FORM NOT SUBMITTED CORRRECTLY OR INCOMPLETE
{
    header("Location: createnew.php");
die();
}
?>