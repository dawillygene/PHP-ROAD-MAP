<!DOCTYPE html>
<html>
<head>
    <title>Team Members</title>
</head>
<body>
    <p id="output"></p>
    <h1>Team Members</h1>
    <table id="member-table" border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rows will be populated here -->
        </tbody>
    </table>
    <script>


        function fetchTeamMembers() {
            const xhr = new XMLHttpRequest();
            const url = "backendopenai.php"; 
            const bearer = "10304050RTD"; // Bearer token
            const requestBody = JSON.stringify({ username: "MEMBERS" }); // JSON body

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Authorization", `Bearer ${bearer}`); // Correctly set Bearer token
            
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("output").innerHTML = xhr.responseText;
                    const response = JSON.parse(xhr.responseText);
                 
                    
                    displayMembers(response);
                } else if (xhr.readyState == 4 && xhr.status !== 200) {
                    console.error("Error occurred during fetching data:", xhr.statusText);
                }
            };

            xhr.send(requestBody);
        }

        function displayMembers(response) {
            const tbody = document.querySelector("#member-table tbody"); // Correctly select tbody
            tbody.innerHTML = ""; // Clear existing rows

            response.forEach(member => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${member.name}</td>
                    <td>${member.role}</td>
                    <td>${member.email}</td>
                `;
                tbody.appendChild(row);
            });
        }

        window.onload = fetchTeamMembers; // Call fetchTeamMembers on page load
    </script>
</body>
</html>