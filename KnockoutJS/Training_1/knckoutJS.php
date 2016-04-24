<p>First name: <input data-bind="value: firstName" /></p>
<p>Last name: <input data-bind="value: lastName" /></p>

<script src="../Scripts/knockout-3.3.0.js"></script>
<script type="text/javascript">
    function AppViewModel() {
        this.firstName = ko.observable("Ben");
        this.lastName = ko.observable("Sun");
    }
ko.applyBindings(new AppViewModel());
    
</script>