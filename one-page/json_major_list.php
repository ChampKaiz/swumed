<?php require($_SERVER['DOCUMENT_ROOT']."/inc/db/db_webdev.php"); ?>
<?php
    $faculty_ID = $_REQUEST['faculty_ID'];
    if($faculty_ID){
        $sql = "
            SELECT
                tb_major.major_ID,
                tb_major.major_name
            FROM
                tb_major
            WHERE
                tb_major.faculty_ID = '{$faculty_ID}'
                AND tb_major.n_active = '1'
        ";
        $data = $db->select($sql);
        echo json_encode($data);
    }
?>