<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
    <style>
        .card-cont {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'app/components/header.php'; ?>
    <?php include $content; ?>
    <?php include 'app/components/footer.php'; ?>
</body>
</html>