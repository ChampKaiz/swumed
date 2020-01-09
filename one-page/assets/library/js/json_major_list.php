<?php require($_SERVER['DOCUMENT_ROOT']."/one-page/inc/db/db_webdev.php"); ?>
<?php
    $faculty_key = $_REQUEST['faculty_key'];
    if($faculty_key){
        $sql = "
            SELECT
                tb_major.major_ID,
                tb_major.major_name
            FROM
                tb_major
            WHERE
                tb_major.faculty_key = '{$faculty_key}'
               
        ";
        $data = $db->select($sql);
        echo json_encode($data);
    }
?>