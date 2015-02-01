<?php
    include 'form.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- SUCCESS -->
    <?php if(!empty($success)){ ?>
        <div class="success">
            <?php foreach($success as $_success){ ?>
                <p>
                    <?php echo $_success; ?>
                </p>
            <?php } ?>
        </div>
    <?php } ?>
    
    <!-- ERRORS -->
    <?php if(!empty($errors)){ ?>
        <div class="errors">
            <?php foreach($errors as $_error){ ?>
                <p>
                    <?php echo $_error; ?>
                </p>
            <?php } ?>
        </div>
    <?php } ?>

    <!-- FORM -->
    <form action="#" method="get">
        <div class="<?= array_key_exists('name', $errors) ? 'error' : '' ?>">
            <input type="text" name="name" placeholder="Your name" id="name" value="<?= $_POST['name'] ?>">
            <label for="name">Name</label>
        </div>

        <div class="<?= array_key_exists('age', $errors) ? 'error' : '' ?>">
            <input type="number" name="age" placeholder="Your age" id="age" value="<?= $_POST['age'] ?>">
            <label for="age">Age</label>
        </div>

        <div class="<?= array_key_exists('gender', $errors) ? 'error' : '' ?>">
            <label>
                <input type="radio" name="gender" value="female" <?= $_POST['gender'] == 'female' ? 'checked' : '' ?>>
                Female
            </label>
            <label>
                <input type="radio" name="gender" value="male" <?= $_POST['gender'] == 'male' ? 'checked' : '' ?>>
                Male
            </label>
        </div>
        <div>
            <input type="submit" value="Send">
        </div>
    </form>

</body>
</html>





