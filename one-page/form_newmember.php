<?php require($_SERVER['DOCUMENT_ROOT'].'/one-page/inc/db/db_webdev.php');?>
<!DOCTYPE html>
<html>
  <head>
    <title>สมัครสมาชิกชมรมสมาธิเพื่อชีวิต</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/one-page/assets/library/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/one-page/assets/library/js/bootstrap.min.js">
  </head>
  <body>
    <?php
      $member_ID=$_REQUEST['member_ID'];
      $action=$_REQUEST['action'];

      if($action=="edit" && $member_ID){
       
        $sql = "
          SELECT
            tb_member.member_ID,
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
            tb_member.act_ID,
            tb_member.interesting,
            tb_member.interest_ID,
            tb_member.med_ever_ID,
            tb_member.med_time,
            tb_member.social_ID
          FROM 
            tb_member
          WHERE
            tb_member.member_ID = '{$member_ID}'  
        ";
        $data = $db->select($sql);
        $name = $data[0]['name'];
        $surname = $data[0]['surname'];
        $nickname = $data[0]['nickname'];
        $sex_ID = $data[0]['sex_ID'];
        $day_ID = $data[0]['day_ID'];
        $month_ID = $data[0]['month_ID'];
        $year_ID = $data[0]['year_ID'];
        $religion_ID = $data[0]['religion_ID'];
        $faculty_ID = $data[0]['faculty_ID'];
        $major_ID = $data[0]['major_ID'];
        $student_ID = $data[0]['student_ID'];
        $dorm = $data[0]['dorm'];
        $mobile_number = $data[0]['mobile_number'];
        $mobile_net_ID = $data[0]['mobile_net_ID'];
        $facebook = $data[0]['facebook'];
        $Line = $data[0]['Line'];
        $email = $data[0]['email'];
        $act_ID = $data[0]['act_ID'];
        $interesting = $data[0]['interesting'];
        $interest_ID = $data[0]['interest_ID'];
        $med_ever_ID = $data[0]['med_ever_ID'];
        $med_time = $data[0]['med_time'];
        $social_ID = $data[0]['social_ID'];
      }
    ?>
    <div class="container d-flex justify-content-around">
      <div class="card bg-light mt-3 mb-3 col-md-6" >
        <div class="card-header bg-warning h2 text-center text-light">แบบฟอร์มสมัครสมาชิก<br>ชมรมสมาธิเพื่อชีวิต</div>
        <div class="card-body">
          <div class="col-md-12">
            <form action="save_newmember.php" method="GET">
              <input type="hidden" name='member_ID' value="<?php echo $member_ID; ?>">
              <input type="hidden" name='action' value="<?php echo $action; ?>">
              
              <div class="form-group">
                <label class="text-primary">ชื่อ</label>
                <input type="text" name="name" required class="form-control" placeholder="ชื่อ" value="<?php echo $name; ?>">
              </div>
              <div class="form-group">
                <label class="text-primary">นามสกุล</label>
                <input type="text" name="surname" required class="form-control" placeholder="นามสกุล" value="<?php echo $surname; ?>">
              </div>
              <div class="form-group">
                <label class="text-primary">ชื่อเล่น</label>
                <input type="text" name="nickname" required class="form-control" placeholder="ชื่อเล่น" value="<?php echo $nickname; ?>">
              </div>
              <div class="form-group">
              <label class="text-primary">เพศ</label>
              
              <br class="custom-control custom-checkbox row">
                    <?php 
                    $sql = "
                      SELECT
                        tb_sex.sex_ID,
                        tb_sex.sex_name
                      FROM
                      tb_sex
                    ";
                    $data = $db->select($sql);
                    foreach($data as $key=>$value){
                      if($act_ID == $value['sex_ID']){
                        $checked = "checked";
                      }else{
                        $checked = "";
                      }
                      echo "<input type='radio' name='sex_ID' required class='filled-in chk-col-light-blue' value='{$value['sex_ID']}'{$checked}> {$value['sex_name']}  ";
                    }
                    ?>
              </div>

<div class="form-group"> 
                <label class="text-primary">ศาสนา</label>
                <select class= "form-control" name ="religion_ID" required>
                <option value ="">กรุณาเลือก</option>
                  <?php 
                  $sql = "
                    SELECT
                      tb_religion.religion_ID,
                      tb_religion.religion_name
                    FROM
                      tb_religion
                  ";
                  $data = $db->select($sql);
                  foreach($data as $key=>$value){
                    if($religion_ID == $value['religion_ID']){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }
                    echo "<option value='{$value['religion_ID']}'{$selected}>{$value['religion_name']}</option>";
                  }
                  ?>
                </select>
                </div>

              <div class="form-group"> 
                <label class="text-primary">วันเกิด</label><br>
                <div class="row">
                  <div class="col-md-3">
                  <select class= "form-control" name ="day_ID">
                  <option value ="">วัน</option>
                    <?php 
                    $sql = "
                      SELECT
                        tb_day.day_ID,
                        tb_day.day_name
                      FROM
                        tb_day
                    ";
                    $data = $db->select($sql);
                    foreach($data as $key=>$value){
                      if($day_ID == $value['day_ID']){
                        $selected = "selected";
                      }else{
                        $selected = "";
                      }
                      echo "<option value='{$value['day_ID']}'{$selected}>{$value['day_name']}</option>";
                    }
                    ?>
                  </select>
                  </div>

                  <div class="col-md-5">
                  <select class= "form-control" name ="month_ID">
                  <option value ="">เดือน</option>
                    <?php 
                    $sql = "
                      SELECT
                        tb_month.month_ID,
                        tb_month.month_thailand
                      FROM
                        tb_month
                    ";
                    $data = $db->select($sql);
                    foreach($data as $key=>$value){
                      if($month_ID == $value['month_ID']){
                        $selected = "selected";
                      }else{
                        $selected = "";
                      }
                      echo "<option value='{$value['month_ID']}'{$selected}>{$value['month_thailand']}</option>";
                    }
                    ?>
                  </select>
                  </div>
                  <div class="col-md-4">
                  <select class= "form-control" name ="year_ID">
                  <option value ="">ปี</option>
                    <?php 
                    $sql = "
                      SELECT
                        tb_year.year_ID,
                        tb_year.year_BE
                      FROM
                      tb_year
                    ";
                    $data = $db->select($sql);
                    foreach($data as $item){
                      if($year_ID == $item['year_ID']){
                        $selected = "selected";
                      }else{
                        $selected = "";
                      }
                      echo "<option value='{$item['year_ID']}'{$selected}>{$item['year_BE']}</option>";
                    }
                    ?>
                  </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="text-primary">คณะ</label>
                <select class= "form-control" name ="faculty_ID" id="faculty_major_ID" required>
                  <option value ="">เลือกคณะ</option>
                    <?php 
                    $sql = "
                          SELECT
                            tb_faculty.faculty_ID,
                            tb_faculty.faculty_name
                          FROM
                            tb_faculty
                        ";
                    $data = $db->select($sql);
                    foreach($data as $key=>$value){
                      if($faculty_ID == $value['faculty_ID']){
                        $selected = "selected";
                      }else{
                        $selected = "";
                      }
                      echo "<option value='{$value['faculty_ID']}'{$selected}>{$value['faculty_name']}</option>";
                    }
                    ?>
                  </select>
                  </div>



                  <div class="form-group">
                                      <label class="text-primary">เอก</label>
                                      <select name="major_ID" class="form-control" id="major_nID" required>
                                      <option value=''>เลือกเอก</option>
                                      </select>
                                  
                </div>



              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label class="text-primary">รหัสนิสิต</label>
                    <input type="text" name="student_ID" required  maxlength="11" class="form-control" placeholder="รหัสนิสิต" value="<?php echo $student_ID; ?>">
                  </div>
                  <div class="col-md-4">
                    <label class="text-primary">หอ/ห้อง</label>
                    <input type="text" name="dorm" class="form-control" placeholder="หอ/ห้อง" value="<?php echo $dorm; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="text-primary">เบอร์โทรศัพท์ที่ติดต่อได้ (ไม่ต้องใส่ - คั่นระหว่างตัวเลข)</label>
                <input type="tel" name="mobile_number" required maxlength="10" class="form-control" placeholder="เบอร์โทรศัพท์" value="<?php echo $mobile_number; ?>">
                </div>
              <div class="form-group">

                
                <label class="text-primary">เครือข่ายโทรศัพท์</label>
                <select class= "form-control" name ="mobile_net_ID">
                  <option value ="">กรุณาเลือก</option>
                    <?php 
                    $sql = "
                      SELECT
                        tb_mobile_net.mobile_net_ID,
                        tb_mobile_net.mobile_net_name
                      FROM
                      tb_mobile_net
                    ";
                    $data = $db->select($sql);
                    foreach($data as $key=>$value){
                      if($mobile_net_ID == $value['mobile_net_ID']){
                        $selected = "selected";
                      }else{
                        $selected = "";
                      }
                      echo "<option value='{$value['mobile_net_ID']}'{$selected}>{$value['mobile_net_name']}</option>";
                    }
                    ?>
                  </select>
              </div>
      
              <div class="form-group">
                <div class="row">
                  <div class="col-md-7">
                    <label class="text-primary">FACEBOOK</label>
                    <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $facebook; ?>">
                  </div>
                  <div class="col-md-5">
                    <label class="text-primary">LINE ID</label>
                    <input type="text" name="Line" class="form-control" placeholder="LINE ID" value="<?php echo $Line; ?>">
                  </div>
                </div>

                              </div>
      
      <div class="form-group">
                    <label class="text-primary">E-mail</label>
                    <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo $email; ?>">
              </div>
            

              <div class="form-group">
              <label class="text-primary">น้องสนใจกิจกรรมใดบ้าง (เลือกได้หลายกิจกรรม)</label><br>
                <input type="checkbox" name="act_ID1" value="1"> Meeting นั่งสมาธิ ปล่อยนกปล่อยปลา<br>
                <input type="checkbox" name="act_ID2" value="2"> ค่ายน้องใหม่ใจสมาธิ 3 วัน<br>
                <input type="checkbox" name="act_ID3" value="3"> ปล่อยปลาสร้างความดี นอกสถานที่<br>
                <input type="checkbox" name="act_ID4" value="4"> ค่ายเรียนดีเมื่อมีสมาธิ 3 วัน<br>
                <input type="checkbox" name="act_ID5" value="5"> ค่ายช่วงปิดเทอม หลายสถาบัน 7 วัน<br>
              </div>
         
              <div class="form-group">
                <label class="text-primary">น้องสนใจชมรมเพราะ</label>
                <textarea name="interesting" class="form-control" placeholder="เขียนความสนใจ..." value="<?php echo $interesting; ?>"></textarea>
              </div>

              <div class="form-group">
              <label class="text-primary">น้องสนใจชมรม</label>
              <br class="custom-control custom-checkbox row">
                    <?php 
                    $sql = "
                      SELECT
                        tb_interest.interest_ID,
                        tb_interest.interest_name
                      FROM
                      tb_interest
                    ";
                    $data = $db->select($sql);
                    foreach($data as $key=>$value){
                      if($act_ID == $value['interest_ID']){
                        $checked = "checked";
                      }else{
                        $checked = "";
                      }
                      echo "<input type='radio' name='interest_ID' required value='{$value['interest_ID']}'{$checked}> {$value['interest_name']}  ";
                    }
                    ?>
              </div>
              <div class="form-group"> 
              <label class="text-primary">น้องเคยนั่งสมาธิบ้างหรือไม่</label><br>
              <div class="row">
                
                
                  <div class="col-md-4">
                    <?php 
                    $sql = "
                      SELECT
                        tb_med_ever.med_ever_ID,
                        tb_med_ever.med_ever_name
                      FROM
                      tb_med_ever
                    ";
                    $data = $db->select($sql);
                    foreach($data as $key=>$value){
                      if($act_ID == $value['med_ever_ID']){
                        $checked = "checked";
                      }else{
                        $checked = "";
                      }
                      echo "<input type='radio' name='med_ever_ID' value='{$value['med_ever_ID']}'{$checked}> {$value['med_ever_name']}  ";
                    }
                    ?>
                  </div>
                  <div class="col-md-8 row">
                  
                <label> ถ้าเคย นั่งนานสุด </label>
                <div class ="col-md-4">
                <input type="text" name="med_time" class="form-control" placeholder="" value="<?php echo $interesting; ?>"> 
                </div>
                <label>  นาที </label>
                </div>
                  </div>


                  <div class="form-group">
              <label class="text-primary">น้องสนใจรับข่าวสารชมรมผ่านทาง</label>
              <br class="custom-control custom-checkbox row">
                    <?php 
                    $sql = "
                      SELECT
                        tb_social.social_ID,
                        tb_social.social_name
                      FROM
                      tb_social
                    ";
                    $data = $db->select($sql);
                    foreach($data as $key=>$value){
                      if($act_ID == $value['social_ID']){
                        $checked = "checked";
                      }else{
                        $checked = "";
                      }
                      echo "<input type='radio' name='social_ID' value='{$value['social_ID']}'{$checked}> {$value['social_name']}  ";
                    }
                    ?>
              </div>
                  






              <div class="form-group">
                  <button type="submit" id="submit" class="btn btn-primary">ส่งข้อมูล</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="/one-page/assets/library/js/jquery-3.3.1.min.js"></script>
    <script src="/one-page/assets/library/js/script.js"></script>
    
  </body>
                  
            
        
          
      
      
      
   </html>