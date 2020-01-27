<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="hideotherinfo()">
    <?php
        
        require_once 'validation.php'; 
        $data=$_SESSION['registration'];
       // print_r($data);
        
    ?>
    <form method="POST" enctype="multipart/form-data">
    
    <div name="accountInfo">
        <fieldset>
       <legend>Account Information</legend><br>
       Name :  <select name="prefix">
            <option value="Mr" <?php echo ($data['prefix']=="Mr") ? 'selected="selected"':''?>>Mr.</option>
            <option value="Miss" <?php echo ($data['prefix']=="Miss") ? 'selected="selected"':''?>>Miss.</option>
            <option value="Ms" <?php echo ($data['prefix']=="Ms") ? 'selected="selected"':''?>>Ms.</option>
            <option value="Mrs" <?php echo ($data['prefix']=="Mrs") ? 'selected="selected"':''?>>Mrs.</option>
            <option value="Dr" <?php echo ($data['prefix']=="Dr") ? 'selected="selected"':''?>>Dr.</option>
        </select>
        <input type="text" name="firstName" value="<?php echo $data['firstName']?>" placeholder="First Name" required>
        <input type="text" name="lastName" value="<?php echo $data['lastName']?>" placeholder="Last Name" required><br>
        Date OF Birth : <input type="date" name="dob" value="<?php echo $data['dob'];?>" required><br>
        Contact Number : <input type="text" name="phoneNumber" value="<?php echo $data['phoneNumber'];?>" placeholder="phoneNumber" minlength="10" maxlength="10" required><br>
        Email Id : <input type="email" name="email" value="<?php echo $data['email'];?>" placeholder="Email Id" required><br>
        Password : <input type="password" name="password" placeholder="Password" required><br>
        Confirm Password : <input type="password" name="cnfpassword" placeholder="conferm password" required><br>
    </fieldset>
    </div>
   
   
   
    <div name="addressInfo">
        <fieldset>
        <legend>Address Information</legend><br>
        Address line 1 : <input type="text" name="addressLine1" value="<?php echo $data['addressLine1']?>" placeholder="Address Line 1" required><br>
        Address Line 2 : <input type="text" name="addressLine2" value="<?php echo $data['addressLine2']?>" placeholder="Address Line 2" required><br>
        Compny : <input type="text" name="compny" value="<?php echo $data['compny']?>" placeholder="Compny" required><br>
        City : <input type="text" name="city" value="<?php echo $data['city']?>" placeholder="city" required><br>
        State : <input type="text" name="state" value="<?php echo $data['state']?>" placeholder="state" required><br>
        Country : <select name="country" required>
            
            <option value="India" <?php echo ($data['country']=="India") ? 'selected="selected"':''?> >India</option>
            <option value="China" <?php echo ($data['country']=="China") ? 'selected="selected"':''?> >China</option>
            <option value="America" <?php echo ($data['country']=="America") ? 'selected="selected"':''?> >America</option>
            <option value="Canada" <?php echo ($data['country']=="Canada") ? 'selected="selected"':''?> >Canada</option>
        </select><br>
        Zip Code : <input type="text" name="postalcode" placeholder="Postal code" value="<?php echo $data['postalcode']?>" minlength="6" maxlength="6" required><br>
    </fieldset>
    </div>
    <input type="checkbox" name="addtionalInfo" onchange="chkaddtional()"> Check Here for additional information.
    
    
    
    <div id="otherInfo">
        <fieldset>
        <legend>Other Information</legend><br>
        Describe Yourself : <textarea name="describeSelf" required><?php echo $data['describeSelf']?></textarea><br>
        Profile Image : <input type="file" name="profilePicture"><br>
        Certificate Upload : <input type="file" name="certificate"><br>
        How Long Have you been in business ? <br>
        <input type="radio" name="businessYear" value="Under 1 Year" <?php echo ($data['businessYear']=="Under 1 Year") ? 'checked="checked"':''?> >Under 1 Year
        <input type="radio" name="businessYear" value="1 - 2 Year" <?php echo ($data['businessYear']=="1 - 2 Year") ? 'checked="checked"':''?> >1 - 2 Year
        <input type="radio" name="businessYear" value="2 -5 Year" <?php echo ($data['businessYear']=="2 -5 Year") ? 'checked="checked"':''?> >2 -5 Year    
        <input type="radio" name="businessYear" value="5 -10 Year" <?php echo ($data['businessYear']=="5 -10 Year") ? 'checked="checked"':''?>>5 -10 Year    
        <input type="radio" name="businessYear" value="Over 10 Year" <?php echo ($data['businessYear']=="Over 10 Year") ? 'checked="checked"':''?>>Over 10 Year<br>
        Number of unique clients you see each week?<br>
        <select name="clients">
            <option value="1-5" <?php echo ($data['clients']=="1-5") ? 'selected="selected"':''?> >1 - 5</option>
            <option value="6-10" <?php echo ($data['clients']=="6-10") ? 'selected="selected"':''?> >6 - 10</option>
            <option value="11-15" <?php echo ($data['clients']=="11-15") ? 'selected="selected"':''?>>11 - 15</option>
            <option value="15+" <?php echo ($data['clients']=="15+") ? 'selected="selected"':''?>>15+</option>
        </select><br>
        How do you like us to get in touch with you?<br>
        <input type="checkbox" name="post" value="Post" <?php echo ($data['post']=="Post") ? 'checked="checked"':''?> >Post
        <input type="checkbox" name="chkemail" value="Email" <?php echo ($data['chkemail']=="Email") ? 'checked="checked"':''?> >Email
            <input type="checkbox" name="sms" value="SMS" <?php echo ($data['sms']=="SMS") ? 'checked="checked"':''?> >SMS
        <input type="checkbox" name="phone" value="Phone" <?php echo ($data['phone']=="Phone") ? 'checked="checked"':''?> >Phone<br>
        Hobbies : <select multiple>
            <option>Listing to Music</option>
            <option>Travelling</option>
            <option>Blogging</option>
            <option>Sport</option>
            <option>Art</option>
        </select><br>
    </fieldset>
    </div>
    <div>
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
    <script src=registration.js></script>
</body>
</html>
