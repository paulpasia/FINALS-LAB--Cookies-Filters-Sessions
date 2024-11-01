<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333; \
        }


        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }


        input[type="submit"] {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }


        #error {
            color: red;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }


        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }


        @media (max-width: 600px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }

            h1 {
                font-size: 20px;
            }

            input[type="submit"] {
                font-size: 16px;
            }
        }
    </style>

    <script>
        function validateLogin() {
            var name = document.getElementById("name").value;
            var password = document.getElementById("password").value;

            //  validation
            if (name === "" || password === "") {
                document.getElementById("error").innerHTML = "Please fill out both fields.";
                return false;
            }

            // AJAX request to validate.php
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText === "success") {
                        // Redirect to another site if login is successful
                        window.location.href = "exercise2.php";
                    } else {
                        // Display error message
                        document.getElementById("error").innerHTML = this.responseText;
                    }
                }
            };

            // Send the request to validate.php with name and password as POST data
            xmlhttp.open("POST", "validate.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("name=" + encodeURIComponent(name) + "&password=" + encodeURIComponent(password));
        }
    </script>
</head>
<body>

  <?php
include 'header.php';
include 'footer.php';

getHeader("Login Form with AJAX");
?>

    <div class="login-container">
        <h1>Login Form</h1>

        <!-- Login form -->
        <form onsubmit="event.preventDefault(); validateLogin();">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo isset($_COOKIE['rememberUser']) ? $_COOKIE['rememberUser'] : ''; ?>" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label><input type="checkbox" id="rememberMe"> Remember Me</label>

    <input type="submit" value="Login">
</form>


        <!-- Display error message -->
        <p id="error"></p>
    </div>

<?php
<div>
getFooter();
</div>


?>

</body>
</html>
