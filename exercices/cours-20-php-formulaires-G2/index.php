<?php
    include 'form.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
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
    <form action="#" method="post">
        <div>
            <input type="text" name="name" placeholder="Your name" id="name">
            <label for="name">Name</label>
        </div>

        <div>
            <input type="number" name="age" placeholder="Your age" id="age">
            <label for="age">Age</label>
        </div>

        <div>
            <label>
                <input type="radio" name="gender" value="female">
                Female
            </label>
            <label>
                <input type="radio" name="gender" value="male">
                Male
            </label>
        </div>
        <div>
            <input type="submit" value="Send">
        </div>
    </form>

</body>
</html>





