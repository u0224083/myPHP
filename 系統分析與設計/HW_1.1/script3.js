//<!--篩選，JS傳值給PHP-->
function passValue(){
    var val = document.getElementById("slct2");
    //var x = str.options[str.selectedIndex].text;
    //撈出所選option的選項文字
    $.post("./getValue.php" , {postValue: val.options[val.selectedIndex].text},
    function(data){
        //$("#demo").html(data);
        //console.log(JSON.stringify(db));       
        $("#XX").empty();
        for (var i in db){
            if (db[i].book_author == val.options[val.selectedIndex].text){
                $("#XX").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");
             //inputData.book.push(new bookdata(db[i].book_name, db[i].book_price, db[i].book_quantity, db[i].book_author, db[i].book_publisher, db[i].book_publish_date));
            }else if (db[i].book_publisher == val.options[val.selectedIndex].text){
                $("#XX").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");
            }else if (val.options[val.selectedIndex].text == "請選擇"){
                $("#XX").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");
                //console.log(i);
            }
        }


    });
}