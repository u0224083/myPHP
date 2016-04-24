<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>List Present</title>
<script src="../../Scripts/knockout-3.3.0.js"></script>

</head>
<body>  
    <button data-bind="click: AddUser">Add</button>  
    <button id="btn_json">Json</button>  
    <fieldset>  
        <legend>Table 呈現</legend>  
        <table>  
            <thead>  
                <tr>  
                    <th>Number</th>  
                    <th>First name</th>  
                    <th>Last name</th>  
                    <th></th>  
                </tr>  
            </thead>  
            <tbody data-bind="foreach: users">  
                <tr>  
                    <td data-bind="text: Index"></td>  
                    <td data-bind="text: firstName"></td>  
                    <td data-bind="text: lastName"></td>  
                    <td>  
                        <button data-bind="click: $parent.RemoveUser">移除</button>  
                    </td>  
                </tr>  
            </tbody>  
        </table>  
    </fieldset>  
    <fieldset>  
        <legend>清單呈現</legend>  
        <ul data-bind="foreach: users">  
            <li>  
                <span data-bind="text: Index">:</span>  
                <span data-bind="text: firstName"></span>  
                <span data-bind="text: lastName"></span>  
                <button data-bind="click: $parent.RemoveUser">移除</button>  
            </li>  
        </ul>  
    </fieldset>  
   
    <script type="text/javascript">  
   
        //定義使用者  
        var User = function (Index, firstName, lastName) {  
            var self = this;  
            self.Index = Index;  
            self.firstName = firstName;  
            self.lastName = lastName;  
        }  
   
        //ViewModel  
        var viewModel = function () {  
            var self = this;  
            self.users = ko.observableArray();  
            //新增使用者事件  
            self.AddUser = function () {  
                var index = self.users().length + 1;  
                model.users.push(new User(index, "Kyle", "Shen" + index));  
            }  
            //移除使用者事件  
            self.RemoveUser = function () {  
                self.users.remove(this);  
            }  
        }  
   
        //手動新增3筆假資料  
        var model = new viewModel();  
        for (var i = 1; i <= 3; i++) {  
            model.users.push(new User(i, "Kyle", "Shen" + i));  
        }  
        ko.applyBindings(model);  
   
    </script>  
</body>
</html>