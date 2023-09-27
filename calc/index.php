<!DOCTYPE html>
<html>
<head>
    <title>Calculator Example with MySQL</title>
</head>
<body>
    <h1>Calculator</h1>
    <input type="text" id="num1" placeholder="Enter number 1">
<br/>
    <input type="text" id="num2" placeholder="Enter number 2">
<br/>
    <select id="operation">
        <option value="add">Addition (+)</option>
        <option value="subtract">Subtraction (-)</option>
        <option value="multiply">Multiplication (*)</option>
        <option value="divide">Division (/)</option>
    </select>
<br/>
    <button onclick="calculate()">Calculate</button>
    <p id="result"></p>
    <script>
        function calculate() {
            var num1 = document.getElementById("num1").value;
            var num2 = document.getElementById("num2").value;
            var operation = document.getElementById("operation").value;
            var xhr = new XMLHttpRequest();
            var path = "calculator.php";
          xhr.open("POST", path, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var result = xhr.responseText;
                    document.getElementById("result").innerHTML = "Result: " + result;
                }
            };
            var data = "num1=" + num1 + "&num2=" + num2 + "&operation=" + operation;
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
        }
    </script>
</body>
</html>