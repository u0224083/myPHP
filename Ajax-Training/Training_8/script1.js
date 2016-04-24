function trans(){
    var val = document.getElementById("slct1").value;
    $.post("./getValue.php", {postValue:val},
    function(data){
        $("#demo").html(data);
        alert(data);
    });
    //alert(data);
}