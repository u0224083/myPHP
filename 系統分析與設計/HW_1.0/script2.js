//監聽 option list
function populate(s1,s2){
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    /*
    if (s1.value == "author"){
        var optionArr = unique;
        var count = unique.length;
        var x = 0;
        for (var option in optionArr){
            var newOption = document.createElement("option");
            newOption.value = optionArr[x];
            newOption.innerHTML = optionArr[x];
            s2.options.add(newOption);
            x++;
        }
        //以下為測試部分傳值參數
        document.getElementById("demo").innerHTML = "You select:" + s1.value + "<br>";
        document.getElementById("demo2").innerHTML = optionArr;
        alert(unique.toString());
    }
    */
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
    }
   
    
    
}