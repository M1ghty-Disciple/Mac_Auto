<!Doctype html>
<html>

<head>
    <?php include 'header.php'; ?>
    <title>MAc Auto Shop</title>
</head>

<main>

    <body>
        <form action="New_Car.php" method="post">
            <input type="text" name='vin' placeholder="VIN #">
            <input type="text" name="year" placeholder="Year">
            <input type="text" name='make' placeholder="Make">
            <input type="text" name="model" placeholder="Model">
            <input type="submit" value="Add Car">
        </form>
    </body>
</main>

</html>