<?php
// معالجة البيانات لو تم إرسال النموذج
$result = "";
$num1 = "";
$num2 = "";
$operation = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['clean'])) {
        // زر تنظيف تم الضغط عليه => نصفر كل القيم
        $num1 = "";
        $num2 = "";
        $operation = "";
        $result = "";
    } else {
        $num1 = $_POST["num1"] ?? 0;
        $num2 = $_POST["num2"] ?? 0;
        $operation = $_POST["operation"] ?? "";

        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                if ($num2 == 0) {
                    $result = "Error: Cannot divide by zero!";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $result = "Please select a valid operation.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="number"], select, textarea {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            margin-right: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button.clean-btn {
            background-color: #f44336;
        }
        .result {
            background-color: #e0ffe0;
            border: 1px solid #4CAF50;
            padding: 10px;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Simple PHP Calculator</h1>

    <?php if ($result !== ""): ?>
        <div class="result">Result: <?php echo htmlspecialchars($result); ?></div>
    <?php endif; ?>

    <form method="POST" action="calculator.php">
        <label>First Number:</label>
        <input type="number" name="num1" value="<?php echo htmlspecialchars($num1); ?>" required />

        <label>Second Number:</label>
        <input type="number" name="num2" value="<?php echo htmlspecialchars($num2); ?>" required />

        <label>Operation:</label>
        <select name="operation" required>
            <option value="" <?php if ($operation == "") echo "selected"; ?>>--Select--</option>
            <option value="add" <?php if ($operation == "add") echo "selected"; ?>>Add (+)</option>
            <option value="subtract" <?php if ($operation == "subtract") echo "selected"; ?>>Subtract (-)</option>
            <option value="multiply" <?php if ($operation == "multiply") echo "selected"; ?>>Multiply (×)</option>
            <option value="divide" <?php if ($operation == "divide") echo "selected"; ?>>Divide (÷)</option>
        </select>

        <button type="submit" name="calculate">Calculate</button>
        <button type="submit" name="clean" class="clean-btn">Clean</button>
    </form>
</body>
</html>
