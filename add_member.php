<?php
    ini_set('display_errors', 0);
    include('includes/connect.php');
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $tel = $_POST['phone'];
    $address = $_POST['address'];
    $status = "user";
    $pass = hash('sha512',$pass);
    $sqlu = "SELECT count(m_email) FROM tb_member WHERE m_email='$email'" ;
    $resultu = mysqli_query($conn,$sqlu);
    if( $resultu > 0 ){
        echo "<script>alert('There is already a user with that email!')</script>";
        echo "<script>window.location='register.php'</script>";
    }else{
        $sql = "INSERT INTO tb_member(m_email,m_pass,m_status,m_name,m_surname,m_gender,m_tel,m_address)
                VALUES('$email','$pass','$status','$name','$surname','$gender','$tel','$address')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Register Success')</script>";
            echo "<script>window.location='login.php'</script>";
        }else{
            echo "<script>alert('Register Failed')</script>";
            echo "<script>window.location='register.php'</script>";
        }
    }
    mysqli_close($conn);
?>