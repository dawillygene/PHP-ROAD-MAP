<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Books</title>
    
</head>
<body onload="fetchBooks()">
    <h1>Available Books</h1>
    <div id="booksContainer"></div>
    <script>
        function fetchBooks() {
            const xhr = new XMLHttpRequest();
            const url = "https://library.example.com/api/books";
            const bearerToken = "Bearer LibraryBearerToken123";
            const jsonBody = JSON.stringify({
                requester: "library_user",
                action: "fetch_books"
            });

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Authorization", bearerToken);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const books = JSON.parse(xhr.responseText);
                    displayBooks(books);
                } else if (xhr.readyState === 4) {
                    alert("Error: " + xhr.status);
                }
            };
            xhr.send(jsonBody);
        }

        function displayBooks(books) {
            const booksContainer = document.getElementById("booksContainer");
            booksContainer.innerHTML = "";
            books.forEach(book => {
                const bookElement = document.createElement("div");
                bookElement.innerHTML = `
                    <h3>${book.title}</h3>
                    <p>Author: ${book.author}</p>
                    <p>Genre: ${book.genre}</p>
                    <p>Year: ${book.year}</p>
                    <p>ISBN: ${book.ISBN}</p>
                `;
                booksContainer.appendChild(bookElement);
            });
        }
    </script>
</body>
</html>