$(document).ready(function(){
    $('#slct1').change(function(){
        $.get("./index.php",
            {slct_name: $('#slct1').val()},
            function(data){
                //alert("working");
                $('#response').html(data);
                $('#demo').html(data);
                //alert("working");
            }
        );
    });
});