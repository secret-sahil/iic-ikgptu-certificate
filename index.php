<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Certificate | Punjab Technical University</title>
    <!-- seo tags start -->
    <meta name="description" content="Get certified by participating in different events organised at I K Gujral Punjab Technical University">

    <meta property="og:title" content="Verify Your Certificate | Punjab Technical University" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $base_url ?>" />
    <meta property="og:image" content="<?php echo $base_url?>assets/images/og.png" />
    <meta property="og:image:width" content="526" />
    <meta property="og:image:height" content="275" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:description" content="Get certified by participating in different events organised at I K Gujral Punjab Technical University" />
    <meta property="og:site_name" content="Verify Your Certificate | Punjab Technical University" />
    <!-- seo tags ends -->
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <!-- jquery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- boot strap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- typing script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
</head>

<body>
     <div class="logo">
        <ul>
            <li>
                <img src="./assets/images/logo.png" alt="ikgptu logo">
            </li>
        </ul>
    </div>
    <div class="main-heading">
        <h1>Verify Your Certificate for <br><span class="typing"></span></h1>
        <?php
        session_start(); 
        if (isset($_SESSION['no_record_found'])){ ?>
            <p class="warning">No such certificate ID exisit <i class="fa-solid fa-circle-exclamation"></i></p>
        <?php }
        unset($_SESSION['no_record_found']);
        ?>
    </div>
        <form class="form" action="certificate.php">
            <input type="text" class="input" name="cid" placeholder="Certificate ID">
            <button type="submit" class="btn">Search</button>
        </form>
    </div>
    <div class="people">
        <img src="./assets/images/people.png" alt="people">
    </div>
    <footer class="footer">
        <p>
        © <?php echo date('Y')?> Copyright Reserved with <a href="https://mrsahil.in" target="_blank">Sahil Kumar</a>
        </p>
    </footer>
    <!-- custom script file -->
    <script src="./assets/js/main.js"></script>
</body>

</html>