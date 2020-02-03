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
    echo "blogpostlst.php";
    
    if(!isset($_SESSION['uid']))
        {
            echo "devansh";
            header('location:login.php');
        } 
    
    ?>
     <br><br>
    <div>
        <form method="post">
            <a href="ManageCategory.php">Manage Category</a>
           
            <input type="submit" name="profile" value="View Profile">
           
            <a href="addBlog.php">Add blog</a>
    
            <input type="submit" name="logout" value="logout">
    </form>
    </div>
    <br><br>
    <table>
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
                    <td>".$row['category_id']."</td>
                    <td>".$row['category_name']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['published_at']."</td>
                    <td>";?><a href="#">Edit</a> <a href="#">Delete</a> <?php echo"</td>
                </tr>";
        } 
        ?>
    </table>    
</body>
</html>

