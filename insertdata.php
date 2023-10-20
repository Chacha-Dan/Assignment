<?php
$name=$_POST['name'];
$title=$_POST['title'];
$author=$_POST['author'];
$publication year=$_POST['publication year'];

if(!empty($name)||!empty($title)||!empty($author)||!empty($publication year)){
    $host="localname";
    $dbusername="root";
    $password="";
    $dbname="data table";
    //create connection
    $conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        $SELECT="SELECT name From library form Where name=?Limit 1";
        $INSERT="INSERT Into data table(name,title,author,publicationyear)values(?,?,?,?)";
        //prepare statement
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("s",$name);
        $stmt->execute();
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($num==0){
            $stmt->Close();

            $stmt=$onn->prepare($INSERT);
            $stmt->bind_param("sssi",$name,$title,$author,$publicationyear);
            $stmt->execute();
            echo"New record inserted successfully";
        }else{
            echo"already data recoreded";
        }
        $stmt->close();
        $conn->close();
    }
}
else{
    echo"All field are required";
    die();
}
?>