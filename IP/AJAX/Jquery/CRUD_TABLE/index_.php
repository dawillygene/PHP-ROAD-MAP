<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud with Ajax</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form action="">
        <label for="">username</label>
        <input type="text" name="username" placeholder="Enter your username" id="username"> <br>
        <label for="">Email</label>
            <input type="email" name="email" placeholder="Enter your Email" id="email"> <br>
            <label for="">password</label>
            <input type="password" name="" id="password"><br>
            <button type="button" id="save">Save</button>

    </form>
    <div class="" id="output"></div>
<script>
$(document).ready(function () {


function fetchData() {
    $.ajax({
        url: "server.php",
        method: "GET",
        dataType: "json",
        success: function (response) {
            if (response.length === 0) {
                $("#output").html("<p>No data found</p>");
                return;
            }

            var tableHtml = `<table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>`;

            $.each(response, function (index, data) {
                tableHtml += `<tr>
                    <td>${data.id}</td>
                    <td>${data.username}</td>
                    <td>${data.email}</td>
                    <td>${data.password}</td>
                </tr>`;
            });

            tableHtml += `</tbody></table>`;
            $("#output").html(tableHtml);
        },
        error: function (xhr, status, error) {
            console.log("Error fetching data: " + error);
        }
    });
}


fetchData();

$("#save").click(function (e) {
    e.preventDefault();
    
    var name = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();

    if (name === "" || email === "" || password === "") {
        alert("All fields are required!");
        return;
    }

    $.ajax({
        url: "service.php",
        method: "POST",
        contentType: "application/json", 
        data: JSON.stringify({
            username: name,
            email: email,
            password: password
        }),
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                alert(response.message);
                fetchData(); 
                $("#username").val("");
                $("#email").val("");
                $("#password").val("");
            } else {
                alert(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.log("Error inserting data: " + error);
        }
    });
});
});


</script>
</body>
</html>