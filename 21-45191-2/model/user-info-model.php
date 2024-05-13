<?php

    require_once('database.php');

    $row;

    function login($email, $password){

        global $row;

        $con = dbConnection();
        $sql = $con -> prepare ("select * from UserInfo where email = ? and password = ?");
        $sql -> bind_param("ss", $email, $password);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;
        }
        else return false;

    }

    function signup($fullname, $phone, $email, $username, $password, $securityQuestion, $securityQuestionAnswer, $role){

        $con = dbConnection();
        $sql = $con -> prepare ("insert into UserInfo values('', ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql -> bind_param("ssssssss", $fullname, $phone, $email, $username, $password, $securityQuestion, $securityQuestionAnswer, $role);

        if($sql -> execute()) return true;
        else return false;
        
    }
    
    function uniqueEmail($email){

        $con = dbConnection();
        $sql = $con -> prepare ("select email from userinfo where email = ? ");
        $sql -> bind_param("s", $email);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count > 0) return false;
        else return true; 
        
    }

    function getUserByMail($email){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from UserInfo where Email = ?");
        $sql -> bind_param("s", $email);
        $sql -> execute();
             
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

    function changePassword($id, $newpass){

        $con=dbConnection();
        $sql = $con -> prepare ("update UserInfo set Password = ? where UserID = ?");
        $sql -> bind_param("ss", $newpass, $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }

    function userInfo($id){

        $con=dbConnection();
        $sql="select* from UserInfo where UserID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }

    function updateUserInfo($id, $fullname, $email, $phone, $username){

        $con = dbConnection();
        $sql = $con -> prepare ("update UserInfo set Fullname = ?, Username = ?, Phone = ?, Email = ? where UserID = ?");
        $sql -> bind_param("sssss", $fullname, $username, $phone, $email, $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }


?>