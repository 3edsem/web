<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AJAX Examples</title>
<style>
body {
font-family: Arial, sans-serif;
margin: 0;
padding: 0;
background-color: #f9f9f9;
}
h1 {
text-align: center;
padding: 20px;
color: #333;
}
#content {
max-width: 800px;
margin: 20px auto;
padding: 20px;
border: 1px solid #ccc;
border-radius: 8px;
background-color: #fff;
}
button {
padding: 10px 20px;
margin: 10px;
font-size: 16px;
cursor: pointer;
background-color: #007bff;
color: white;
border: none;
border-radius: 5px;
}
button:hover {
background-color: #0056b3;
}
#output {
margin-top: 20px;
padding: 15px;
border: 1px solid #ccc;
border-radius: 5px;
background-color: #f4f4f4;
white-space: pre-wrap;
max-height: 300px;
overflow-y: auto;
}
</style>
</head>
<body>
<h1>AJAX Examples</h1>
<div id="content">
<button id="plain-ajax-btn">Plain AJAX (No jQuery)</button>
<button id="jquery-ajax-btn">AJAX with jQuery</button>
<button id="get-json-btn">getJSON Example</button>
<button id="parseJSONButton">parseJSON Example</button>
<div id="output">Click a button to see the results here.</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
// Helper function to update the output display
function showOutput(content) {
const output = document.getElementById('output');
output.textContent = content;
}
// a. Plain AJAX without jQuery
document.getElementById('plain-ajax-btn').addEventListener('click', function () {
const xhr = new XMLHttpRequest();
xhr.open('GET', 'textfile.txt', true);
xhr.onload = function () {
if (xhr.status === 200) {
showOutput(xhr.responseText);
} else {
showOutput('Error loading file.');
}
};
xhr.onerror = function () {
showOutput('Request failed.');
};
xhr.send();
});
// b. AJAX using jQuery
$('#jquery-ajax-btn').on('click', function () {
$.ajax({
url: 'textfile.txt',
method: 'GET',
success: function (data) {
showOutput(data);
},
error: function () {
showOutput('Error loading file.');
}
});
});
// c. getJSON Example
$('#get-json-btn').on('click', function () {
$.getJSON('data.json')
.done(function (data) {
showOutput(JSON.stringify(data, null, 2));
})
.fail(function () {
showOutput('Error loading JSON file.');
});
});
// d. parseJSON Example
$('#parseJSONButton').click(function() {
            const jsonString = '{"name": "Alice", "age": 28, "city": "London"}';
            const parsedData = $.parseJSON(jsonString);
            $('#output').text(`Name: ${parsedData.name}, Age: ${parsedData.age}, City: ${parsedData.city}`);
        });
</script>
</body>
</html>