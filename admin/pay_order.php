<?php
    include 'includes/connect.php';
    $id = $_GET['id'];
    $sql ="UPDATE tb_order 
           SET o_status = '1' 
           WHERE o_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>window.location='order_report_new.php'</script>";
    }else{
        echo "<script>alert('Can't change status')</script>";
    }
mysqli_close($conn);
?>