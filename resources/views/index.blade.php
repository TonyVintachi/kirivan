<!doctype>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username"></label>
                </div>
            </form>
        </div>
        <!--code will desplay a list of projects for a user-->
        @forelse ($projects = Project::all())
            <!--use blade to create html elements-->
            "....","....","...."
        @empty

        @endforelse
    </div>
</body>
</html>

