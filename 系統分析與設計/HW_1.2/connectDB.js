//頁面載入後執行
$(document).ready(function ch(){
    loadData();
});

var loadData = function(){
    $.ajax({
        type:"POST",
        url:"./db.php"
    }).done(function(data){
        db = JSON.parse(data);
        //alert(JSON.stringify(db[4]));//列出Object內容
        
        //呈現Total data
        data_list();
        
        collect_option_data();
        
        option_unique();
        
        option_rename();
    });
}