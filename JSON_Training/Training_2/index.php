<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>JSON</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="./script_1.js"></script>
    <script src="./script_2.js"></script>
</head>
<body>
    <section id = "content"><h1>JSON</h1><hr></section>
    
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