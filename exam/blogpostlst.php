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
            <input type="submit" name="manageCategory" value="Manage Category">
            <input type="submit" name="profile" value="View Profile">
            <input type="submit" name="AddBlog" value="Add Blog">
            <input type="submit" name="logout" value="logout">
    </form>
    </div>
    <br><br>
    <table border=1>
        <tr>
            <th>PostId</th>
            <th>Category Name</th>
            <th>Title</th>
            <th>Published date</th>
            <th>Action</th>
        </tr>
        <?php 
        $result=show_blogpost();
        
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr>
                    <td>".$row['post_id']."</td>
                    <td>".$row['ctitle']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['published_at']."</td>
                    <td>";?><a href="operations.php?editid=<?php echo $row['post_id'];?>">Edit</a> <a href="operations.php?deletid=<?php echo $row['post_id'];?>">Delete</a> <?php echo"</td>
                </tr>";
        } 
        ?>
    </table>    
</body>
</html>

