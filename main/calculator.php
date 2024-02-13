<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>

    <h2>Simple Calculator</h2>

    <form method="post" action="calculator.php">
        <label for="num1">Number 1:</label>
        <input type="text" name="num1" id="num1" required>

        <label for="operator">Operator:</label>
        <select name="operator" id="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <label for="num2">Number 2:</label>
        <input type="text" name="num2" id="num2" required>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve values from the form
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        // Check if the input is numeric
        if (is_numeric($num1) && is_numeric($num2)) {
            // Perform the calculation
            switch ($operator) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    // Check if dividing by zero
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        echo "Cannot divide by zero.";
                    }
                    break;
                default:
                    echo "Invalid operator.";
            }

            // Display the result
            echo "<p>Result: $result</p>";
        } else {
            echo "Please enter valid numeric values.";
        }
    }
    ?>

</body>
</html>
