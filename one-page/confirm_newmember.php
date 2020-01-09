<?php require($_SERVER['DOCUMENT_ROOT'].'/one-page/inc/db/db_webdev.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>ข้อมูลการสมัครชมรมสมาธิ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/one-page/assets/library/css/bootstrap.min.css">
    </head>
    <body>
        <div class="col-sm-12 table-responsive-sm d-flex justify-content-around">
            <?php
            $student_ID =  $_REQUEST['student_ID'];

            $sql ="
            SELECT
                tb_member.member_ID,
                tb_member.name,
                tb_member.surname,
                tb_member.nickname,
                tb_sex.sex_name,
                tb_member.day_ID,
                tb_month.month_thailand,
                tb_member.year_ID,
                tb_religion.religion_name,
                tb_faculty.faculty_name,
                tb_major.major_name,
                tb_member.student_ID,
                tb_member.dorm,
                tb_member.mobile_number,
                tb_mobile_net.mobile_net_name,
                tb_member.facebook,
                tb_member.Line,
                tb_member.email,
                tb_member.interesting,
                tb_interest.interest_name,
                tb_med_ever.med_ever_name,
                tb_member.med_time,
                tb_social.social_name
            FROM 
                tb_member
            LEFT JOIN 
                tb_sex ON tb_member.sex_ID=tb_sex.sex_ID
            LEFT JOIN 
                tb_religion ON tb_member.religion_ID=tb_religion.religion_ID
            LEFT JOIN
                tb_month ON tb_member.month_ID=tb_month.month_ID
            LEFT JOIN
                tb_faculty ON tb_member.faculty_ID=tb_faculty.faculty_ID
            LEFT JOIN
                tb_major ON tb_member.major_ID=tb_major.major_ID
            LEFT JOIN
                tb_mobile_net ON tb_member.mobile_net_ID=tb_mobile_net.mobile_net_ID
            LEFT JOIN
                tb_med_ever ON tb_member.med_ever_ID=tb_med_ever.med_ever_ID
            LEFT JOIN
                tb_interest ON tb_member.interest_ID=tb_interest.interest_ID
            LEFT JOIN
                tb_social ON tb_member.social_ID=tb_social.social_ID
            WHERE
                tb_member.student_ID = '{$student_ID}'  
        ";
        $data = $db->select($sql);
        $member_ID = $data[0]['member_ID'];
        $name = $data[0]['name'];
        $surname = $data[0]['surname'];
        $nickname = $data[0]['nickname'];
        $sex_name = $data[0]['sex_name'];
        $day_ID = $data[0]['day_ID'];
        $month_thailand = $data[0]['month_thailand'];
        $year_ID = $data[0]['year_ID'];
        $religion_name = $data[0]['religion_name'];
        $faculty_name = $data[0]['faculty_name'];
        $major_name = $data[0]['major_name'];
        $student_ID = $data[0]['student_ID'];
        $dorm = $data[0]['dorm'];
        $mobile_number = $data[0]['mobile_number'];
        $mobile_net_name = $data[0]['mobile_net_name'];
        $facebook = $data[0]['facebook'];
        $Line = $data[0]['Line'];
        $email = $data[0]['email'];
        $interesting = $data[0]['interesting'];
        $interest_name = $data[0]['interest_name'];
        $med_ever_name = $data[0]['med_ever_name'];
        $med_time = $data[0]['med_time'];
        $social_name = $data[0]['social_name'];
        $date_create = $data[0]['date_create'];
            ?>
                    
                            <div class="card bg-light mt-3 mb-3 col-md-6 ">
                                <div class="card-header bg-warning h4 text-center text-light">ข้อมูลการสมัครของคุณ</div>
                                 <div class="card-body">
                                    <p class="card-text text-center text-danger">กรุณาตรวจสอบข้อมูลของท่าน</p>
                        

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-primary">ชื่อ</label>
                                        <input type="text" name="name" disabled class="form-control" value="<?php echo $name; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-primary">นามสกุล</label>
                                        <input type="text" name="surname" disabled class="form-control" value="<?php echo $surname; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-primary">ชื่อเล่น</label>
                                        <input type="text" name="nickname" disabled class="form-control" value="<?php echo $nickname; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-primary">เพศ</label>
                                        <input type="text" name="sex_name" disabled class="form-control" value="<?php echo $sex_name; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="text-primary">คณะ</label>
                                        <input type="text" name="faculty_name" disabled class="form-control" value="<?php echo $faculty_name; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="text-primary">เอก</label>
                                        <input type="text" name="major_name" disabled class="form-control" value="<?php echo $major_name; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label class="text-primary">รหัสนิสิต</label>
                                        <input type="text" name="student_ID" disabled class="form-control" value="<?php echo $student_ID; ?>">
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="text-primary">เบอร์โทร</label>
                                        <input type="text" name="mobile_number" disabled class="form-control" value="<?php echo $mobile_number; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-primary">Facebook</label>
                                        <input type="text" name="facebook" disabled class="form-control" value="<?php echo $facebook; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-primary">Line ID</label>
                                        <input type="text" name="Line" disabled class="form-control" value="<?php echo $Line; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                     <?php echo "
                                    <a href = 'form_newmember.php?member_ID=$member_ID&action=edit' class='btn btn-warning'>แก้ไข</a>
                                    <a href='finished_newmember.php?member_ID=$member_ID' class='btn btn-primary d-flex justify-content-around'>ยืนยันการสมัคร</a>
                                    ";
                                    ?>
                                    </div>
                                </div>
                                <div class="card-footer text-muted text-center">
                                    กรุณาตรวจสอบข้อมูลของท่าน
                                </div>
                            </div>
        </div>
    </body>
  </html>