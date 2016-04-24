<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>JSON</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
    
    <section id = "content"><h1>JSON</h1><hr></section>
    <!--
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    -->
    <script language="JavaScript" type="text/javascript">
        var sqlList = new Array();
        var unique = new Array();
        var optionTEST = new Array();
        var svalue;
        optionTEST = ["#|請選擇"];
        
        $(document).ready(function ch(){
            loadData();
        });
        var loadData = function(){
            $.ajax({
                type:"POST",
                url:"./user.php"
            }).done(function(data){
                console.log(data);
                var auth = JSON.parse(data);
                
                //sqlList = auth;
                
                //var unique = sqlList.filter()
                
                var count = 1;
                for (var i in auth){
                    //$("#content").append(count + "|" + auth[i].book_author + "<br>");
                    optionTEST.push(count + "|" + auth[i].book_author);
                    //optionTEST.push(auth[i].book_author);
                    
                    //optionTEST[count] = optionTEST[count] + (count + "|" + auth[i].book_author);
                    count++;
                }
                
                /*以下為相同方法將陣列distinct
                function onlyUniqe(value , index , self){
                    return self.indexOf(value) === index;
                }
                function(item, i, ar){ return ar.indexOf(item) === i; }
                */
                //unique = optionTEST.filter(function(item, i, ar){ return ar.indexOf(item) === i; });//將陣列distinct
            });
            
        }
        
        
        
        function populate(s1,s2){
            var s1 = document.getElementById(s1);
            var s2 = document.getElementById(s2);
            s2.innerHTML = "";
            var count = unique.length;
            
            if (s1.value == "author"){
                //var optionArr2 = ["#|請選擇","author_1|九把刀","author_2|查良鏞","author_3|羅貫中","author_4|施耐庵","author_5|吳承恩","author_6|古龍"];
                var optionArr = optionTEST;
                //optionArr.toString();
            }
            
            
            for (var option in optionArr){
                var pair = optionArr[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                s2.options.add(newOption);
            }
            
            
            document.getElementById("demo").innerHTML = "You select:" + s1.value + "<br>";
            document.getElementById("demo2").innerHTML = optionArr;
            alert(unique.length);
        }
        
    </script>
    
    <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>">
        <select id = "slct1" onChange = "populate(this.id , 'slct2')">
            <option value = "#">請選擇</option>
            <option value = "author">作者</option>
            <option value = "publisher">出版社</option>
        </select>
        <select id = "slct2"></select>
    </form>
    <p id = "demo"></p>
    <p id = "demo2"></p>
</body>
</html>