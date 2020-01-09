<?php require($_SERVER['DOCUMENT_ROOT'].'/one-page/inc/db/db_webdev.php');?>
<?php
    $member_ID =  $_REQUEST['member_ID'];
    $action =  $_REQUEST['action'];
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname']; 
    $nickname = $_REQUEST['nickname']; 
    $sex_ID = $_REQUEST['sex_ID']; 
    $day_ID = $_REQUEST['day_ID']; 
    $month_ID = $_REQUEST['month_ID']; 
    $year_ID = $_REQUEST['year_ID']; 
    $religion_ID = $_REQUEST['religion_ID']; 
    $faculty_ID = $_REQUEST['faculty_ID']; 
    $major_ID = $_REQUEST['major_ID']; 
    $student_ID = $_REQUEST['student_ID']; 
    $dorm = $_REQUEST['dorm']; 
    $mobile_number = $_REQUEST['mobile_number']; 
    $mobile_net_ID = $_REQUEST['mobile_net_ID']; 
    $facebook = $_REQUEST['facebook']; 
    $Line = $_REQUEST['Line']; 
    $email = $_REQUEST['email']; 
    $act_ID1 = $_REQUEST['act_ID1']; 
    $act_ID2 = $_REQUEST['act_ID2']; 
    $act_ID3 = $_REQUEST['act_ID3']; 
    $act_ID4 = $_REQUEST['act_ID4']; 
    $act_ID5 = $_REQUEST['act_ID5']; 
    $interesting = $_REQUEST['interesting'];
    $interest_ID = $_REQUEST['interest_ID'];
    $med_ever_ID = $_REQUEST['med_ever_ID'];
    $med_time = $_REQUEST['med_time'];
    $social_ID = $_REQUEST['social_ID'];

    if($action=="edit" && $member_ID){
        $sql = "
            UPDATE tb_member SET
                tb_member.name = '{$name}',
                tb_member.surname = '{$surname}',
                tb_member.nickname = '{$nickname}',
                tb_member.sex_ID = '{$sex_ID}',
                tb_member.day_ID = '{$day_ID}',
                tb_member.month_ID = '{$month_ID}',
                tb_member.year_ID = '{$year_ID}',
                tb_member.religion_ID = '{$religion_ID}',
                tb_member.faculty_ID = '{$faculty_ID}',
                tb_member.major_ID = '{$major_ID}',
                tb_member.student_ID = '{$student_ID}',
                tb_member.dorm = '{$dorm}',
                tb_member.mobile_number = '{$mobile_number}',
                tb_member.mobile_net_ID = '{$mobile_net_ID}',
                tb_member.facebook = '{$facebook}',
                tb_member.Line = '{$Line}',
                tb_member.email = '{$email}',
                tb_member.act_ID1 = '{$act_ID1}'
                tb_member.interesting = '{$interesting}'
                tb_member.interest_ID = '{$interest_ID}'
                tb_member.med_ever_ID = '{$med_ever_ID}'
                tb_member.med_time = '{$med_time}'
                tb_member.social_ID = '{$social_ID}'
            WHERE 
                tb_member.member_ID =  '{$member_ID}'
                ";
                $db->query($sql);
    }else if($action=="delete" && $member_ID){
        $sql = "
            DELETE FROM tb_member
            WHERE 
            tb_member.member_ID = '{$member_ID}'
        ";
        $db->query($sql);

    }else if($name && $surname && $nickname){
    
        $sql = "INSERT INTO tb_member(
            tb_member.name,
            tb_member.surname,
            tb_member.nickname,
            tb_member.sex_ID,
            tb_member.day_ID,
            tb_member.month_ID,
            tb_member.year_ID,
            tb_member.religion_ID,
            tb_member.faculty_ID,
            tb_member.major_ID,
            tb_member.student_ID,
            tb_member.dorm,
            tb_member.mobile_number,
            tb_member.mobile_net_ID,
            tb_member.facebook,
            tb_member.Line,
            tb_member.email,
            tb_member.act_ID1,
            tb_member.act_ID2,
            tb_member.act_ID3,
            tb_member.act_ID4,
            tb_member.act_ID5,
            tb_member.interesting,
            tb_member.interest_ID,
            tb_member.med_ever_ID,
            tb_member.med_time,
            tb_member.social_ID
        ) VALUES (
            '{$name}',
            '{$surname}',
            '{$nickname}',
            '{$sex_ID}',
            '{$day_ID}',
            '{$month_ID}',
            '{$year_ID}',
            '{$religion_ID}',
            '{$faculty_ID}',
            '{$major_ID}',
            '{$student_ID}',
            '{$dorm}',
            '{$mobile_number}',
            '{$mobile_net_ID}',
            '{$facebook}',
            '{$Line}',
            '{$email}',
            '{$act_ID1}',
            '{$act_ID2}',
            '{$act_ID3}',
            '{$act_ID4}',
            '{$act_ID5}',
            '{$interesting}',
            '{$interest_ID}',
            '{$med_ever_ID}',
            '{$med_time}',
            '{$social_ID}'
        )";
        $db->query($sql);

    }else{
        echo "<h1>กรุณากรอกข้อมูลใหม่</h1>";
        echo "<a href='form_newmember.php' class='btn btn-info'>ย้อนกลับไปที่ฟอร์ม</a><br>";
        echo "<a href='report_newmember.php' class='btn btn-info'>ย้อนกลับไปที่รายงาน</a>";
    }
    header("location: confirm_newmember.php?student_ID=$student_ID");
?>