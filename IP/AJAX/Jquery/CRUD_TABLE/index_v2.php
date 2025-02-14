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
        function Getdata() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "server.php", true);
            xhr.setRequestHeader("Accept", "application/json");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    let table = `<table border="1">
<thead>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Password</th>
</thead><tbody>`;

                    response.forEach(item => {
                        table += `<tr>
<td>${item.id}</td>
<td>${item.username}</td>
<td>${item.email}</td>
<td>${item.password}</td>
</tr>`;
                    });

                    table += `</tbody></table>`;
                    document.getElementById("output").innerHTML = table;
                }
            };

            xhr.send(); 
        }

        Getdata(); 
    </script>
</body>

</html>
