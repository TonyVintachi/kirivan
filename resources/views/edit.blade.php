<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kirivan - Dashboard</title>
<link href="{{ asset('/css/style_dashboard.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    body {
        margin: 0;
        font-family: "Lato", sans-serif;
    }

    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #e8a452;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: white;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: #f1f1f1;
        color: #e8a452;
    }

    .sidebar a:hover:not(.active) {
        background-color: #000000;
        color: white;
    }

    /* Logo */
    .logo {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 180px;
    }

    .profile-card {
        text-align: left;
        margin: 16px;
    }


    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }

    .card {
        width: 30%;
        display: flex;
        flex-direction: column;
        border: 1px #e8a452 solid;
    }

    .header {
        height: 30%;
        background: #e8a452;
        color: white;
        text-align: center;
    }

    .container {
        padding: 2px 8px;
    }

    #myProgress {

        width: 100%;
        background-color: #f1f1f1;
    }

    #myBar {
        width: 10%;
        height: 20px;
        background-color: #e8a452;
        text-align: center;
        line-height: 20px;
        color: #f1f1f1;
    }

    /* Floating Action Button*/
    .float{
	    position:fixed;
	    width:60px;
	    height:60px;
	    bottom:40px;
	    right:40px;
	    background-color:#e8a452;
	    color:#ffffff;
	    border-radius:60px;
	    text-align:center;
    }



    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 200px;
        top: 0;
        width: 90%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #e8a452;
        color: white;
    }

    .modal-body {padding: 2px 16px;}

    .modal-footer {
        padding: 2px 16px;
        background-color: ##e8a452;
        color: white;
    }

    /* The Close Modal Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #ffffff;
        text-decoration: none;
        cursor: pointer;
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }

</style>
</head>

<body>
    <div class="sidebar">
        <br>
        <img src="/images/kirivan_logo.png" class="logo">

        <div class="profile-card">
            <div class="profile-icon-label">
                <i class="fa fa-user-circle"></i>
            </div>
            <div class="username"><b>{{auth()->user()-> first_name}} {{auth()->user()-> last_name}}</b></div>
            <div class="email">{{auth()->user()->email}}</div>
        </div>

        <a class="active" href="/dashboard"><i class="fa fa-fw fa-home"></i> Dashboard</a>
        <a href="/projects"><i class="fa fa-fw fa-wrench"></i> Projects</a>
        <a href="/diary"><i class="fa fa-fw fa-book"></i> Diary</a>
        <a href="/team"><i class="fa fa-fw fa-users"></i> Team</a>
    </div>

    <div class="content">
        <h2>Project Editor</h2>

        <table>
            <tr>
                {{$project->name}}
                {{$project->description}}
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
            <?php if($project->name){?>
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->description}}<td>
            </tr>
            <?php }?>
            <?php endif;?>
        </table>




    </div>
</body>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    var i = 0;
    function move() {
        if (i == 0) {
            i = 1;
            var elem = document.getElementById("myBar");
            var width = 10;
            var id = setInterval(frame, 10);

            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                    i = 0;
                } else {
                    width++;
                    elem.style.width = width + "%";
                    elem.innerHTML = width  + "%";
            }
        }
      }
    }
</script>

</html>
