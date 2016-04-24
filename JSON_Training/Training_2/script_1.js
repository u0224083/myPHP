//使用AJAX撈db資料
var optionAuthor = new Array();
var optionPublisher = new Array();
var t = new Array();//test
optionAuthor = ["請選擇"];
optionPublisher = ["請選擇"];


$(document).ready(function ch(){
    loadData();
});
var loadData = function(){
    $.ajax({
        type:"POST",
        url:"./user.php"
    }).done(function(data){
        console.log(data);
        var db = JSON.parse(data);
        
        //alert(JSON.stringify(db));//列出Object內容
        //alert($.toJSON(db));//同上
        
        
        for (var i in db){
            optionAuthor.push(db[i].book_author);
        }
        
        for (var i in db){
            optionPublisher.push(db[i].book_publisher);
        }
        
        optionAuthor = optionAuthor.filter(function(item, i, ar){ return ar.indexOf(item) === i; });//將陣列distinct
        optionPublisher = optionPublisher.filter(function(item, i, ar){ return ar.indexOf(item) === i; });//將陣列distinct
        
        for (var i = 0; i < optionAuthor.length; i++){
            var temp = "author_" + i + "|" + optionAuthor[i];
            optionAuthor[i] = temp;
        }
        
        for (var i = 0; i < optionPublisher.length; i++){
            var temp = "author_" + i + "|" + optionPublisher[i];
            optionPublisher[i] = temp;
        }
        
        /*以下為相同方法將陣列distinct
        function onlyUniqe(value , index , self){
            return self.indexOf(value) === index;
        }
        function(item, i, ar){ return ar.indexOf(item) === i; }
        */
    });
}    
$('#demo').html(t);