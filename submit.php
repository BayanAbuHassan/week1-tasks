<?php
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

if ($name === '') {
    $errors[] = "Name is required.";
}

if ($email === '') {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email is not valid.";
}

if ($message === '') {
    $errors[] = "Message is required.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submission Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 40px;
            max-width: 700px;
            margin: auto;
        }
        .success, .error {
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<?php if (!empty($errors)): ?>
    <div class="error">
        <h3>Submission failed due to the following:</h3>
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="contact.html">← Go Back</a>
    </div>
<?php else: ?>
    <div class="success">
        <h3>Thank you for contacting us!</h3>
        <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>Message:</strong><br><?= nl2br(htmlspecialchars($message)) ?></p>
        <a href="contact.html">← Send another message</a>
    </div>
<?php endif; ?>

</body>
</html>
