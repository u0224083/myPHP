var inputData;
var optionAuthor = new Array();
var optionPublisher = new Array();
optionAuthor = ["請選擇"];
optionPublisher = ["請選擇"];
var db;

function data_list(){
    for (var i in db){
        //動態呈現篩選結果
        $("#booklist").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");
    }
}



function option_unique(){
    //將陣列distinct
    optionAuthor = optionAuthor.filter(function(item, i, ar){ return ar.indexOf(item) === i; });
    //將陣列distinct
    optionPublisher = optionPublisher.filter(function(item, i, ar){ return ar.indexOf(item) === i; });
}




function collect_option_data(){
    for (var i in db){
        optionAuthor.push(db[i].book_author);
    }
    for (var i in db){
        optionPublisher.push(db[i].book_publisher);
    }
}




function option_rename(){
    for (var i = 0; i < optionAuthor.length; i++){
        var temp = "author_" + i + "|" + optionAuthor[i];
        optionAuthor[i] = temp;
    }
    for (var i = 0; i < optionPublisher.length; i++){
        var temp = "author_" + i + "|" + optionPublisher[i];
        optionPublisher[i] = temp;
    }
}




//監聽 slct1
function populate(s1,s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    
    //將每個陣列元素隔開，分別存取前後割出的值，再依序加入option中
    if (s1.value == "author"){
        var optionArr = optionAuthor;
        for (var option in optionArr){
            var pair = optionArr[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];
            s2.options.add(newOption);
        }
    }else if (s1.value == "publisher"){
        var optionArr = optionPublisher;
        for (var option in optionArr){
            var pair = optionArr[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];
            s2.options.add(newOption);
        }
    }else if (s1.value == "#"){
        for (var i in db){
            $("#booklist").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");
        }
    }
}




//監聽 slct2
function passValue(){
    var val = document.getElementById("slct2");
    //var x = str.options[str.selectedIndex].text;
    //撈出所選option的選項文字
    $.post("./index.php" , {postValue: val.options[val.selectedIndex].text},
    function(data){      
        $("#booklist").empty();//列出已篩選表格前，清空<tbody>
        //建立<tbody>表格
        for (var i in db){
            if (db[i].book_author == val.options[val.selectedIndex].text){
                $("#booklist").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");
            }else if (db[i].book_publisher == val.options[val.selectedIndex].text){
                $("#booklist").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");
            }else if (val.options[val.selectedIndex].text == "請選擇"){
                $("#booklist").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");
            }
        }
    });
}