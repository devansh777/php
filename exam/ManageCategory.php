<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'connection.php';
    require_once 'operations.php';
   
    if(!isset($_SESSION['uid']))
        {
            header('location:login.php');
        }
   
    ?>
    <br><br>
    <div>
    <form method="post">
            <a href="ManageCategory.php">Manage Category</a>
           
            <input type="submit" name="profile" value="View Profile">
            <a href="addcategory.php">Add Category</a>
    
            <input type="submit" name="logout" value="logout">
    </form>
    </div>
    <br><br>
    <table border=1>
        <tr>
            <th>category_id</th>
            <th>Category Image</th>
            <th>category_name</th>
            <th>create date</th>
            <th>Action</th>
        </tr>
        <?php 
        $result=show_catagory();
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr>
                    <td>".$row['parent_category_id']."</td>
                    <td>######</td>
                    <td>".$row['category_name']."</td>
                    <td>######</td>
                    <td>";?><a href="#">Edit</a> <a href="#">Delete</a> <?php echo"</td>
                </tr>";
        } 
        ?>
    </table>    
</body>
</html>

