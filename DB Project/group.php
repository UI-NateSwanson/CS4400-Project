<html>
<head>
    <title>Lyft Group Project CS4400</title>
    <link rel="stylesheet" href="main.css">
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
</head>
<body>
<div id="main">
    <span style="font-size:30px;cursor:pointer; color: #white" onclick="openNav()">&#9776;</span>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.html">Home</a>
    <a href="#">Group Members</a>
    <a href="description.php">Description</a>
    <a href="schema.php">Our Schema</a>
</div>
<div id="Group">
    <h3>Group Members</h3>
    <ul>
        <li>Krishnaveni Sompallae</li>
        <li>Qinyuan Li</li>
        <li>Andrew Marburg</li>
        <li>Nate Swanson</li>
    </ul>
</div>
</body>
</html>