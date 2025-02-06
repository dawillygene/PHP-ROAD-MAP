<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD with Ajax</title>
</head>
<body>
    <form action="">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter your username" id="username"> <br>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your Email" id="email"> <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>
        <button type="button" id="save">Save</button>
    </form>
    <div id="output"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Function to fetch data using XMLHttpRequest
            function fetchData() {
                const xhr = new XMLHttpRequest();
                xhr.open("GET", "server.php", true);
                xhr.setRequestHeader("Accept", "application/json");

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);

                        if (response.length === 0) {
                            document.getElementById("output").innerHTML = "<p>No data found</p>";
                            return;
                        }

                        let tableHtml = `<table border="1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>`;

                        response.forEach(item => {
                            tableHtml += `<tr>
                                <td>${item.id}</td>
                                <td>${item.username}</td>
                                <td>${item.email}</td>
                                <td>${item.password}</td>
                            </tr>`;
                        });

                        tableHtml += `</tbody></table>`;
                        document.getElementById("output").innerHTML = tableHtml;
                    } else {
                        console.log("Error fetching data: " + xhr.statusText);
                    }
                };

                xhr.onerror = function () {
                    console.log("Request failed");
                };

                xhr.send();
            }

            fetchData();

            document.getElementById("save").addEventListener("click", function (e) {
                e.preventDefault();

                const name = document.getElementById("username").value;
                const email = document.getElementById("email").value;
                const password = document.getElementById("password").value;

                if (name === "" || email === "" || password === "") {
                    alert("All fields are required!");
                    return;
                }

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "service.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("Accept", "application/json");

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);

                        if (response.status === "success") {
                            alert(response.message);
                            fetchData(); // Refresh the data
                            document.getElementById("username").value = "";
                            document.getElementById("email").value = "";
                            document.getElementById("password").value = "";
                        } else {
                            alert(response.message);
                        }
                    } else {
                        console.log("Error inserting data: " + xhr.statusText);
                    }
                };

                xhr.onerror = function () {
                    console.log("Request failed");
                };

                const data = JSON.stringify({
                    username: name,
                    email: email,
                    password: password
                });

                xhr.send(data);
            });
        });
    </script>
</body>
</html>