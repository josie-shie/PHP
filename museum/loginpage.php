<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import "compass/css3";

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            background: #95a5a6;
            background-image: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_embroidery.png);
            font-family: 'Helvetica Neue', Arial, Sans-Serif;}

        .login-wrap {
            position: relative;
            margin: 0 auto;
            background: #ecf0f1;
            width: 350px;
            border-radius: 5px;
            box-shadow: 3px 3px 10px #333;
            padding: 15px;
        }

        h2 {
            text-align: center;
            font-weight: 200;
            font-size: 2em;
            margin-top: 10px;
            color: #34495e;
        }

        .form {
            padding-top: 20px;
        }

        input[type="text"],
        input[type="password"],
        button {
            width: 80%;
            margin-left: 10%;
            margin-bottom: 25px;
            height: 40px;
            border-radius: 5px;
            outline: 0;
            -moz-outline-style: none;
        }
        

        input[type="text"],
        input[type="password"] {
            border: 1px solid #bbb;
            padding: 0 0 0 10px;
            font-size: 14px;
        }

        input:focus {
            border: 1px solid #3498db;
        
        }

        a {
            text-align: center;
            font-size: 10px;
            color: #3498db;
        }

        p {
            padding-bottom: 10px;
        }



        button {
            background: #e74c3c;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: 200;
            cursor: pointer;
            transition: box-shadow .4s ease;
        }

        
        button:hover {
            box-shadow: 1px 1px 5px #555;
        }

        
        button:active {
            box-shadow: 1px 1px 7px #222;
            }

        .login-wrap{
            margin: 20% auto;
        }
        
        .login-wrap:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background: -webkit-linear-gradient(left,
                    #27ae60 0%, #27ae60 20%,
                    #8e44ad 20%, #8e44ad 40%,
                    #3498db 40%, #3498db 60%,
                    #e74c3c 60%, #e74c3c 80%,
                    #f1c40f 80%, #f1c40f 100%);
            background: -moz-linear-gradient(left,
                    #27ae60 0%, #27ae60 20%,
                    #8e44ad 20%, #8e44ad 40%,
                    #3498db 40%, #3498db 60%,
                    #e74c3c 60%, #e74c3c 80%,
                    #f1c40f 80%, #f1c40f 100%);
            height: 5px;
            border-radius: 5px 5px 0 0;
        }

    </style>
</head>

<body>
    <div class="login-wrap">
        <h2>Login</h2>

        <form class="form" name="myForm" method="post" action="./login.php">
            <input type="text" name="username" value="" placeholder="Username" />
            <input input type="password" name="pwd" value="" placeholder="Password" />
            <button type="submit" value="登入" href="./login.php"> Sign in </button>
            <a href="#">
                <p> Don't have an account? Register </p>
            </a>
        </form>
    </div>
</body>

</html>