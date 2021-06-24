<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "robot2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo '<span style="color:#fff;text-align:center;">تم الاتصال بقاعدة البيانات بنجاح</span>';


// GET current data
$getSql = "SELECT * FROM `controller` ORDER BY `updated_at`";
$result = $conn->query($getSql);

echo '<br>';
$robot_data = $result->fetch_array(MYSQLI_ASSOC);
$pr_stop = $robot_data['stop'] == 0 ? 1 : 0;
$pr_forward = $robot_data['forward'] == 0 ? 1 : 0;
$pr_backward = $robot_data['backward'] == 0 ? 1 : 0;
$pr_right = $robot_data['right'] == 0 ? 1 : 0;
$pr_left = $robot_data['left'] == 0 ? 1 : 0;

// echo 'pr_stop : ' . $pr _right;
// UPDATE DATA
if (isset($_POST['stop'])) { // only call function when a post request is being processed

    print_r($_POST);
    $datatime = date('Y-m-d H:i:s');
    $sql = "UPDATE controller
    SET stop = $pr_stop, 
    updated_at = '$datatime'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
		echo '<span style="color:#fff;text-align:center;">  تم حفظ التعديلات بنجاح</span>';

    } else {
        
		echo '<span style="color:#fff;text-align:center;">"حدث خطأ عند محاولة تحديث البيانات: " . mysqli_error($conn) " </span>';
    }
}

if (isset($_POST['forward'])) { // only call function when a post request is being processed

    $datatime = date('Y-m-d H:i:s');
    $sql = "UPDATE controller
    SET forward = '$pr_forward',
    updated_at = '$datatime'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "\n  تم حفظ التعديلات بنجاح";

    } else {
        echo "حدث خطأ عند محاولة تحديث البيانات: " . mysqli_error($conn);
    }
}

if (isset($_POST['backward'])) { // only call function when a post request is being processed

    $datatime = date('Y-m-d H:i:s');
    $sql = "UPDATE controller
    SET  backward = '$pr_backward',
    updated_at = '$datatime'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "\n  تم حفظ التعديلات بنجاح";

    } else {
        echo "حدث خطأ عند محاولة تحديث البيانات: " . mysqli_error($conn);
    }
}

if (isset($_POST['right'])) { // only call function when a post request is being processed

    $datatime = date('Y-m-d H:i:s');
    $sql = "UPDATE controller
    SET  `right` = '$pr_right',
    updated_at = '$datatime'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "\n  تم حفظ التعديلات بنجاح";

    } else {
        echo "حدث خطأ عند محاولة تحديث البيانات: " . mysqli_error($conn);
    }
}

if (isset($_POST['left'])) { // only call function when a post request is being processed

    $datatime = date('Y-m-d H:i:s');
    $sql = "UPDATE controller
    SET  `left` = '$pr_left',
    updated_at = '$datatime'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "\n  تم حفظ التعديلات بنجاح";

    } else {
        echo "حدث خطأ عند محاولة تحديث البيانات: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html>
<head>

<style rel ="stylesheet" type="text/css">
    body{
	
        text-align:center;
        background-color: black;
        
    }
    
    h1 {
        color: white;
    }
    
    
    #b1 {
        background-color: red;
         padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 50%;
      
    }
    
    #b2 {
        
        border-radius: 12px;
          font-size: 16px;
         padding: 15px 32px;
          
    }
    
    #b3 {
        
        border-radius: 12px;
      font-size: 16px;
         padding: 15px 32px;
    }
    
    #b4 {
        border-radius: 12px;
          font-size: 16px;
         padding: 15px 32px;
    }
    
    #b5 {
        border-radius: 12px;
          font-size: 16px;
         padding: 15px 32px;
    }

   .rlbuttons {
        width:50%;
        display:inline-block;
        overflow: auto;
        white-space: nowrap;
        margin:0px auto;
        /* border:1px red solid; */

    }
    
</style>

</head>
<body>

<h1>واجهه عرض لقاعدة ذراع الروبوت</h1>
 
<form method="post" action="index.php">
   <!-- <button type="submit" id="b1" value="STOP" >STOP</button> -->
   <input type="submit" id="b1" name="stop" value="STOP" />
   <br>
      <br>
   <br>
      <br>


   <input type="submit" id="b2" value="FORWARD" name="forward"  >
   <br>
      <br>

   <input type="submit" id="b3"name="backward" value="BACKWARD" />
   <br>
      <br>
   <br>
   <br>

   <div class='rlbuttons'>
    <input type="submit" id="b4" name="right" value="RIGHT" />


    <input type="submit" id="b5" name="left" value="LIFT" />
   </div>
  
   

</form>

</body>

</html>
