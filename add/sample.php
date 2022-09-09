



<?php


require_once("../../globals.php");

// use OpenEMR\Common\Csrf\CsrfUtils;
// use OpenEMR\Common\Logging\EventAuditLogger;
// use OpenEMR\Core\Header;
// use OpenEMR\OeUI\OemrUI;


 if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    // echo $name;

    $sql = "INSERT INTO form_sample(name) VALUES ('$name')";
    // echo $sql;
    $result=sqlStatement($sql);
    if ($result == TRUE) {

        echo "New record created successfully.";
  
      }else{
  
        echo "Error:";
  
      } 

 }
 $sql="select * from form_sample";
 $res=sqlStatement($sql);

 if (isset($_GET['id'])) {
    $id = $_GET['id'];

 $sql="DELETE FROM form_sample WHERE id=$id";
 $result=sqlStatement($sql);
 
 if ($result == TRUE) {
    header('Location:sample.php');
    // echo "Record deleted successfully."; 

}else{
   

    echo "Error:" ;

}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$sql="update from form_sample where id=$id";
$res=sqlStatement($sql);
echo $res;
}
 }
?>



<div class="container">
    <div class="title">
        <title>ADDING</title>
        <form action="" method="POST">
        <label>Name:</label>
        <input type="text" id="name" name="name">
        <button class="submit" name="submit" value="submit" >Submit</button>
        </form>
    </div>

    <table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    </thead>

    <tbody> 

        <?php
 
//  echo $res; 
           
               

                while ($row = sqlFetchArray($res))  {
                   

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['name']; ?></td>
                    <td><a class="btn btn-info" href="sample.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a class="btn btn-danger" href="sample.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>        <?php       }



?>      
   </tbody>

</table>            
            
</div>