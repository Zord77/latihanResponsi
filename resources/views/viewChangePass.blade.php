<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Change Password</h2>
        <form id="changePasswordForm">
            <div>
                <label for="password">New Password:</label>
                <input type="password" id="password" required>
            </div>
            <div>
                <label for="confirmPassword">Confirm New Password:</label>
                <input type="password" id="confirmPassword" required>
                <div id="passwordMismatchError" class="error" style="display: none;">Passwords do not match.</div>
            </div>
            <input type="hidden" id="email" value="{{ $details['email'] }}">
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        document.getElementById("changePasswordForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var email = document.getElementById("email").value;

            if (password !== confirmPassword) {
                document.getElementById("passwordMismatchError").style.display = "block";
            } else {
                // Lakukan permintaan AJAX
                var formData = new FormData();
                formData.append('email', email);
                formData.append('password', password);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/ubahPassword', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Password berhasil diubah
                            console.log(xhr.responseText);
                            alert("Password berhasil diubah");
                        } else {
                            // Gagal mengubah password
                            console.error(xhr.responseText);
                            alert("Gagal mengubah password");
                        }
                    }
                };
                xhr.send(formData);
            }
        });
    </script>
</body>

</html>