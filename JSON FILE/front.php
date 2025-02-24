<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
</head>
<body>
    <h2>Team Members</h2>
    <table id="members-table" border="1"></table>




    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetchTeamMembers();
        });

        function fetchTeamMembers() {

            const token = "1030405TKD"; 
            const xhr = new XMLHttpRequest();

            xhr.open("GET", "backend.php", true);
            xhr.setRequestHeader("Authorization", "Bearer " + token);
            xhr.setRequestHeader("Content-Type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);

                        if (data.error) {
                            alert(data.error);
                            return;
                        }

                        const table = document.getElementById("members-table");
                        table.innerHTML = "<tr><th>Name</th><th>Role</th><th>Email</th></tr>";

                        data.members.forEach(member => {
                            const row = `<tr>
                                            <td>${member.name}</td>
                                            <td>${member.role}</td>
                                            <td>${member.email}</td>
                                        </tr>`;
                            table.innerHTML += row;
                        });
                    } else {
                        console.error("Error:", xhr.statusText);
                    }
                }
            };

            xhr.send();
        }
    </script>
</body>
</html>
