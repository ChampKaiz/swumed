$(document).ready(function(){

    $("body").on("change", "#faculty_major_ID", function(){
        let faculty_major_ID = $(this).val();
        console.log(faculty_major_ID);
        let url = "/one-page/assets/library/js/json_major_list.php";
        let data = {
            faculty_key: faculty_major_ID
        };
        $.post(url,data,function(response){
            //console.log(response);
            let res = $.parseJSON(response);
            //console.log(res);
            //console.log(res[1]);
            //console.log(res[1].cBuilding);
            let options = '';
            options += "<option value=''>-เลือกเอก-</option>";
            $.each(res,function(key,item){
                options += "<option value='"+item.major_ID+"'>"+item.major_name+"</option>";
            });
            //console.log(options);
            $("#major_nID").html(options);
        });
    });

    
    


});