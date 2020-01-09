<?php require($_SERVER['DOCUMENT_ROOT'].'/one-page/inc/db/db_webdev.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>หลักฐานการสมัครชมรมสมาธิ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/one-page/assets/library/css/bootstrap.min.css">
    </head>
    <body>
        <div class="col-sm-12 table-responsive-sm">
            <?php
            $member_ID =  $_REQUEST['member_ID'];

            $sql ="
            SELECT
                tb_member.member_ID,
                tb_member.name,
                tb_member.surname,
                tb_member.nickname
            FROM 
                tb_member
            WHERE
                tb_member.member_ID = '{$member_ID}'  
        ";
        $data = $db->select($sql);
        $member_ID = $data[0]['member_ID'];
        $name = $data[0]['name'];
        $surname = $data[0]['surname'];
        $nickname = $data[0]['nickname'];
            ?>
                    
                            <div class="card bg-light mt-3 mb-3 col-md-6 text-center">
                                <div class="card-header bg-warning h1">
                                หลักฐานการสมัครของคุณ
                                </div>
                                <div class="card-body">
                                <p class="card-text text-center text-danger">กรุณาแคปหน้าจอไว้เป็นหลักฐานในการสมัคร</p>
                                    
                                        <?php 
                            echo "
                            <p class='card-text'>
                                    ขณะนี้ คุณ $name $surname
                                      ($nickname)<br>
                                    ได้ทำการลงทะเบียนเสร็จสมบูรณ์แล้ว<br>
                                    ยินดีต้อนรับเข้าสู่ชมรมสมาธิครับ
                                    </p>
                                    ";
                    ?>
                                    
                                    <a href="index.html" class="btn btn-primary d-flex justify-content-around">ไปที่เว็บชมรมสมาธิเพื่อชีวิต</a>
                                </div>
                                <div class="card-footer text-muted text-center">
                                    กรุณาแคปหน้าจอไว้เป็นหลักฐานในการสมัคร
                                </div>
                                </div>
        </div>
    </body>
  </html>