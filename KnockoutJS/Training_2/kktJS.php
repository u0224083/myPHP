<html>
<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="./style.css"/>
<title>List Present</title>
<script src="../../Scripts/knockout-3.3.0.js"></script>

</head>
<body>
    <legend>Table 呈現</legend>  
    <table>  
        <thead>  
            <tr>  
                <th>書名</th>  
                <th>價錢</th>  
                <th>數量</th>  
                <th></th>  
            </tr>  
        </thead>  
        <tbody data-bind = "foreach: book">  
            <tr>  
                <td data-bind = "text: name"></td>  
                <td data-bind = "text: price"></td>  
                <td data-bind = "text: unit"></td>
            </tr>  
        </tbody>  
    </table>
    
    <script type="text/javascript">
        var names = ["三國演義", "水滸傳", "西遊記"];
        var auth = ["九把刀", "施耐庵", "東野圭吾"];
        var prices = [200, 230, 180];
        var units = [90, 70, 80];
        //alert(auth);
        
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
        /*
        var inputData = new viewList();
        for (var i = 1; i < 2; i++){
            inputData.book.push(new bookdata("古龍", 100, 20));
            inputData.book.push(new bookdata("金庸", 60, 90));
        }
        */
        var inputData = new viewList();
        for (var i = 0;i < names.length; i++){
            inputData.book.push(new bookdata(names[i], prices[i], units[i]));
        }
        
        
        ko.applyBindings(inputData);
    </script>
</body>
</html>