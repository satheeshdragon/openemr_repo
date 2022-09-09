
<?php

require_once("../../globals.php");




move_uploaded_file($image_temp, "./uploads/" . $_FILES["image"]["name"]);
$fname = $_POST['fname'];

$lname = $_POST['lname'];

$speciality = $_POST['speciality'];

$clinic_name = $_POST['clinic_name'];
$date = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['date'])));
$image = $_FILES["image"]["name"];

$sql = "INSERT INTO form_doctor_details (fname,lname,speciality,clinic_name,date,image) VALUES ('$fname','$lname','$speciality', '$clinic_name','$date','$image')";

$result = sqlStatement($sql);
if ($result == TRUE) {

  echo "New record created successfully.";
} else {

  echo "Error:";
}

// }



//   }
?>