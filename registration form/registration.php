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
        $prefix=['Mr','Miss','Ms','Mrs','Dr'];
        $country=['India','China','America'];
        $business=['Under 1 Year','1 - 2 Year','2 -5 Year','5 -10 Year','Over 10 Year'];
        $clients=['1-5','6-10','11-15','15+'];
        $gettouch=['post','chkemail','sms','Phone'];
        $hobbie=['Listing to Music','Travelling','Blogging','Sport','Art'];
        
    ?>
    
    <form method="POST" enctype="multipart/form-data">
    
    <div name="account">
        <fieldset>
       <legend>Account Information</legend><br>
       Name :<select name="account[prefix]">
                <?php foreach($prefix as $value):?>
                <option value="<?php echo $value;?>"<?php echo in_array($value,[getFieldValue('account','prefix')]) ? 'selected="selected"':'';?>> <?php echo $value ?></option>
                <?php endforeach ?>
            </select>
        <input type="text" name="account[firstName]" value="<?php echo getFieldValue('account','firstName')?>" placeholder="First Name" required >

        <input type="text" name="account[lastName]" value="<?php echo getFieldValue('account','lastName')?>" placeholder="Last Name" required><br>
        Date OF Birth : <input type="date" name="account[dob]" value="<?php echo getFieldValue('account','dob')?>" required><br>
        Contact Number : <input type="text" name="account[phoneNumber]" value="<?php echo getFieldValue('account','phoneNumber')?>" placeholder="phoneNumber" minlength="10" maxlength="10" required><br>
        Email Id : <input type="email" name="account[email]" value="<?php echo getFieldValue('account','email')?>" placeholder="Email Id" required><br>
        Password : <input type="password" name="account[password]" placeholder="Password" required><br>
        Confirm Password : <input type="password" name="account[cnfpassword]" placeholder="conferm password" required><br>
    </fieldset>
    </div>
            
    <div name="address">
        <fieldset>
        <legend>Address Information</legend><br>
        Address line 1 : <input type="text" name="address[addressLine1]" value="<?php echo getFieldValue('address','addressLine1')?>" placeholder="Address Line 1" required><br>

        Address Line 2 : <input type="text" name="address[addressLine2]" value="<?php echo getFieldValue('address','addressLine2')?>" placeholder="Address Line 2" required><br>

        Compny : <input type="text" name="address[compny]" value="<?php echo getFieldValue('address','compny')?>" placeholder="Compny" required><br>

        City : <input type="text" name="address[city]" value="<?php echo getFieldValue('address','city')?>" placeholder="city" required><br>

        State : <input type="text" name="address[state]" value="<?php echo getFieldValue('address','state')?>" placeholder="state" required><br>

        Country :<select name="address[country]" >
                    <?php foreach($country as $value):?>
                    <option value="<?php echo $value;?>"<?php echo in_array($value,[getFieldValue('address','country')]) ? 'selected="selected"':'';?>> <?php echo $value ?></option>
                    <?php endforeach ?>
                </select><br>
        Zip Code :<input type="text" name="address[postalCode]" placeholder="Postal code" value="<?php echo getFieldValue('address','postalCode') ?>" minlength="6" maxlength="6" required><br>
    </fieldset>
    </div>
    
    
    <input type="checkbox" name="addtionalInfo" onchange="chkaddtional()"> Check Here for additional information.
    
    
    
    <div id="other">
        <fieldset>
        <legend>Other Information</legend><br>
        Describe Yourself : <textarea name="other[describeSelf]" required><?php echo getFieldValue('other','describeSelf')?></textarea><br>
        Profile Image : <input type="file" name="profilePicture"><br>
        Certificate Upload : <input type="file" name="certificate"><br>
        How Long Have you been in business ? <br>
            <?php foreach($business as $value):?>
            <input type="radio" name="other[businessYear]" value="<?php echo $value;?>"<?php echo in_array($value,[getFieldValue('other','businessYear')]) ? 'checked="checked"':'';?>> <?php echo $value ?>
            <?php endforeach ?>
        <br>
        Number of unique clients you see each week?<br>
        <select name="other[clients]">
            <?php foreach($clients as $value):?>
            <option value="<?php echo $value;?>"<?php echo in_array($value,explode("," ,getFieldValue('other','clients'))) ? 'selected="selected"':'';?>> <?php echo $value ?></option>
            <?php endforeach ?>
         </select><br>
        How do you like us to get in touch with you?<br>
        <?php foreach($gettouch as $value):?>
            <?php $select= in_array($value,explode(',',getFieldValue('other','gettouch',[]))) ? 'checked':'';?> 
            <input type="checkbox" name="other[gettouch][]" value="<?php echo $value; ?>"<?php echo $select ?>> <?php echo $value;?>
        <?php endforeach ?><br>
        
        Hobbies :<select multiple name="other[hobbie][]">
                    <?php foreach($hobbie as $value):?>
                    <option value="<?php echo $value;?>"<?php echo in_array($value,explode(',',getFieldValue('other','hobbie',[]))) ? 'selected="selected"':'';?>> <?php echo $value ?></option>
                    <?php endforeach ?>
                </select><br>
    </fieldset>
    </div>
    <div>
        <input type="submit" name="submit" value="Submit">
        <input type="submit" name="update" value="update">
    </div>
    <?php print_r(getFieldValue('other','gettouch',[])); ?>
</form>
<form method="GET">
    <table border=1>
        <tr>
            <th>firstName</th>
            <th>laastName</th>
            <th>address1</th>
            <th>hobby</th>
            <th>value</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php   
            $data = fetchall();
            
            while($row = $data->fetch_assoc())
            { ?>
                <tr>
                <td><?php echo $row['firstName']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['hobbie']; ?></td>
                <td><?php echo $row['get_in']; ?></td>
                <?php echo "<td><a name='editbtn'href='registration.php?id=".$row['customerId']."'>Edit</a>";?></td>
                <?php echo "<td><a name='deletebtn'href='registration.php?deleteid=".$row['customerId']."'>Delete</a>";?></td>
                </tr>
            <?php }
        ?>
    </table>     
</form>
    <script src=registration.js></script>
</body>
</html>