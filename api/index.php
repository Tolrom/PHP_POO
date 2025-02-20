<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api experiment</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <form action="" method="post" id="signupForm" >
        <label>
            Username
            <input type="text" name="username" >
        </label>
        <label>
            Email
            <input type="email" name="email" >
        </label>
        <label>
            Password
            <input type="password" name="password" >
        </label>
        <button type="submit">Sign up</button>
    </form>
    <script>
        document.querySelector('#signupForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevents the page from reloading
            
            // Retrieving form data
            const username = document.querySelector('input[name="username"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;

            // Creating a Json object with the data
            const formData = {
                username: username,
                email: email,
                password: password
            };
            // console.log(formData, JSON.stringify(formData))

            try {
                const response = await fetch('http://localhost/php_poo/api/signUp.php', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();
                console.log(data); // Console logs the server response

            } catch (error) {
                console.error("Signup error :", error);
            }
        });
    </script>
</body>
</html>