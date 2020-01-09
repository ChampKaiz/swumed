<?php require($_SERVER['DOCUMENT_ROOT'].'/one-page/inc/db/db_webdev.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>ข้อมูลการสมัครชมรมสมาธิ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/assets/library/css/bootstrap.min.css">
    </head>
    <body>
        <h1>ข้อมูลการสมัครชมรมสมาธิ</h1>
        <div class="col-sm-12 table-responsive-sm">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-warning">
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ชื่อเล่น</th>
                        <th>ศาสนา</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql ="
                            SELECT
                                tb_member.member_ID,
                                tb_member.name,
                                tb_member.surname,
                                tb_member.nickname,
                                tb_member.day_ID,
                                tb_month.month_thailand,
                                tb_member.year_ID,
                                tb_religion.religion_name,
                                tb_faculty.faculty_name,
                                tb_member.student_ID,
                                tb_member.dorm,
                                tb_member.mobile_number,
                                tb_mobile_net.mobile_net_name,
                                tb_member.facebook,
                                tb_member.Line,
                                tb_member.email,
                                tb_act.act_name
                            FROM 
                                tb_member
                            INNER JOIN 
                                tb_religion ON tb_member.religion_ID=tb_religion.religion_ID
                            INNER JOIN
                                tb_month ON tb_member.month_ID=tb_month.month_ID
                            INNER JOIN
                                tb_faculty ON tb_member.faculty_ID=tb_faculty.faculty_ID
                            INNER JOIN
                                tb_mobile_net ON tb_member.mobile_net_ID=tb_mobile_net.mobile_net_ID
                            INNER JOIN
                                tb_act ON tb_member.act_ID=tb_act.act_ID
                        ";
                        $data = $db->select($sql);
                        $num=0;
                        foreach($data as $value){
                            $num++;
                            echo "
                                <tr>
                                    <td>{$num}</td>
                                    <td>{$value['name']}</td>
                                    <td>{$value['surname']}</td>
                                    <td>{$value['nickname']}</td>
                                    <td>{$value['religion_name']}</td>
                                    <td><a href = 'form_newmember.php?member_ID={$value['member_ID']}&action=edit' class='btn btn-warning'>แก้ไข</a></td>
                                    <td><a href = 'report_newmember.php?member_ID={$value['member_ID']}&action=delete' class='btn btn-danger'>ลบ</a></td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
       

    </body>
  </html>