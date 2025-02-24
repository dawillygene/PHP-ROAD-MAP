<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>json teting</title>
</head>
<body>
    <div id="person"></div>
</body>
<script>

var person = '{ "name" : "Dawilly", "age" : 25,"status" : "Single" }';
var Person = JSON.parse(person);

document.getElementById("person").innerHTML = `My name is ${Person.name} and age:   ${Person.age}`;


</script>
</html>