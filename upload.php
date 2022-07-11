<?php
session_start();
error_reporting(0);
// include("martenitymanage.php");
include("dbconnection.php");
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            // $sql = 'select max(id) as id from martenityfiles';
            // $result = mysqli_query($con, $sql);
            // if (count($result) > 0)
            // {
            //     $row = mysqli_fetch_array($result);
            //     $filename = ($row['id']+1) . '-' . $filename;
            // }
            // else
            //     $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'uploads/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO martenityfiles(filename, created) VALUES('$filename', '$created')";
            mysqli_query($con, $sql);
            header("Location: martenitymanage.php?st=success");
        }
        else
        {
            header("Location: martenitymanage.php?st=error");
        }
    }
    else
        header("Location: martenitymanage.php");
}
?>