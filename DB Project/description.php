<html>
<head>
    <title>Lyft Group Project CS4400</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <a href="group.php">Group Members</a>
    <a href="#">Description</a>
    <a href="schema.php">Our Schema</a>
</div>
<div id="Project">
    <h3>Project Description</h3>
    <p>Lyft is essentially an independent cab service with a similar business purpose. It provides people with a
        fast and affordable means of transportation if they are from out of town, don’t own a car, or have had a few
        too many drinks.</p>
</div>
</body>
</html>