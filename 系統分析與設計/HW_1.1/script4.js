function test(){
    var names = ["三國演義", "西遊記", "水滸傳"];
    //var names = storage;
    var auth = ["九把刀", "施耐庵", "東野圭吾"];
    var prices = [200, 230, 180];
    var units = [90, 70, 80];
    alert (optionAuthor);
    
    // function bookdata(name, price, unit){
    //     var self = this;
    //     self.name = name;
    //     self.price = price;
    //     self.unit = unit;
    // }
    // function viewList(){
    //     var self = this;
    //     self.book = ko.observableArray();
    // }
    
    var inputData = new viewList();
    for (var i = 0;i < names.length; i++){
        inputData.book.push(new bookdata(db[i].book_name, db[i].book_price, db[i].book_quantity, db[i].book_author, db[i].book_publisher, db[i].book_publish_date));
    }
    
    
    ko.applyBindings(inputData);
}
   


