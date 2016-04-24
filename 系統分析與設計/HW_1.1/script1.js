//使用AJAX撈db資料
var inputData;

var optionAuthor = new Array();
var optionPublisher = new Array();
optionAuthor = ["請選擇"];
optionPublisher = ["請選擇"];
var db;
//頁面載入後執行
$(document).ready(function ch(){
    loadData();
});

var loadData = function(){
    $.ajax({
        type:"POST",
        url:"./db.php"
    }).done(function(data){
        //console.log(data);
        db = JSON.parse(data);
        //alert(JSON.stringify(db[4]));//列出Object內容
        
        //Version2
        //呈現Total data
        function bookdata(name, price, unit, author, publisher, time){
            var self = this;
            self.name = name;
            self.price = price;
            self.unit = unit;
            self.author = author;
            self.publisher = publisher;
            self.time = time;
        }
        function viewList(){
            var self = this;
            self.book =  ko.observableArray();
        }
        inputData = new viewList();
        for (var i in db){
            $("#XX").append("<tr><td>" + db[i].book_name + "</td><td>" + db[i].book_price + "</td><td>" + db[i].book_quantity + "</td><td>" + db[i].book_author + "</td><td>" + db[i].book_publisher + "</td><td>" + db[i].book_publish_date + "</td></tr>");//動態呈現篩選結果
            //inputData.book.push(new bookdata(db[i].book_name, db[i].book_price, db[i].book_quantity, db[i].book_author, db[i].book_publisher, db[i].book_publish_date));
            console.log(inputData.book);
        }
        //ko.applyBindings(inputData);
        /*//Version1
        for (var i in db){
            storage1.push(db[i].book_name);
            storage2.push(db[i].book_price);
            storage3.push(db[i].book_quantity);
        }
        //alert(storage);
        
        var names = storage1;
        var prices = storage2;
        var units = storage3;
        
        function bookdata(name, price, unit){
            var self = this;
            self.name = name;
            self.price = price;
            self.unit = unit;
        }
        function viewList(){
            var self = this;
            self.book = ko.observableArray();
        }
        
        var inputData = new viewList();
        for (var i = 0;i < names.length; i++){
            inputData.book.push(new bookdata(names[i], prices[i], units[i]));
        }
        ko.applyBindings(inputData);
        */
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
        //alert(optionAuthor);
        //test();
        /*以下為相同方法將陣列distinct
        function onlyUniqe(value , index , self){
            return self.indexOf(value) === index;
        }
        function(item, i, ar){ return ar.indexOf(item) === i; }
        */
    });
}

//alert(storage); 
        
        
        