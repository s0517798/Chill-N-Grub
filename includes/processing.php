<?php

if(isset($_GET['prod_id'])){
    include "db_conn.php";
    $tbnum = $_SESSION['tbl_id'];
    $prod_id = htmlentities($_GET['prod_id']);
    $prod_qty = htmlentities($_GET['prod_qty']);
    $status='P';
    
    $sql_ins = "INSERT INTO 'cart'
    ('prod_id', 'tbl_id', 'prod_qty')
    VALUES (?,?,?);";
    $stmt_ins = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)){
     header("location: ../menu.php?error=7");
        exit();
    }
    mysqli_stmt_bind_param($stmt_ins,"sss", $prod_id, $tbnum, $prod_qty);
    mysqli_stmt_execute($stmt_ins);
    header("location: ../menu.php?success=1");
}
?>