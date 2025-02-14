<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Books</title>
</head>

<body>
    <h1>List of available books</h1>
    <button onclick="fetch_Books()">Get available books</button>
    <div id="bookDisplay"></div>

    <script>
        function fetch_Books() {
            const url = "https://library.example.com/api/books";
            const xhr = new XMLHttpRequest();
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Authorization", "Bearer LibraryBearerToken123");
            xhr.setRequestHeader("Content-Type", "application/json");

            const body = JSON.stringify({
                requester: "library_user",
                action: "fetch_books"
            });

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);
                        if (data.success) {
                            const booklist = document.getElementById("bookDisplay");
                            booklist.innerHTML = "";
                            data.books.forEach(book => {
                                const itembook = document.createElement("div");
                                itembook.innerHTML = `
                                <h3>${book.title}</h3>
                                <p><strong>Author:</strong> ${book.author}</p>
                                <p><strong>Genre:</strong> ${book.genre}</p>
                                <p><strong>Year:</strong> ${book.year}</p>
                                <p><strong>ISBN:</strong> ${book.isbn}</p>
                                <hr>
                            `;
                                booklist.appendChild(itembook);
                            });
                        } else {
                            alert(data.message);
                        }
                    } else {
                        alert("Error has emerged: " + xhr.status);
                    }
                }
            };
            xhr.send(body);
        }
    </script>
</body>

</html>