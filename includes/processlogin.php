<?php
if(isset($_POST['p_username']) && isset($_POST['p_password'])){
    
include_once "db_conn.php";
include_once "functions.php";
    $username = htmlentities($_POST['p_username']);
    $password = htmlentities($_POST['p_password']);
                                    
    if(chkuserstatus($conn,$username,$password) !== false){
           $user_data = chkuserstatus($conn,$username,$password);
        
        
        session_start();
        
                switch( $user_data['usertype']){
                    case 'W':
                        $_SESSION['usertype']='W';
                        $_SESSION['userid']= $user_data['user_id'];
                            header("location: ../waiter.php");
                              break;
                    case 'C': 
                        $_SESSION['usertype']='C';
                        $_SESSION['userid']= $user_data['user_id'];
                        header("location: ../accountant.php");
                              break;
                    case 'A': 
                        $_SESSION['usertype']='A';
                        $_SESSION['userid']= $user_data['user_id'];
                        header("location: ../admin.php");
                              break;
                }
    } else{
        header("location: ../index.php?error=loginfailed");
    }
    
}