<?php
include "config.php";
session_start();
if (isset($_GET['cid'])) {
    require "admin/include/db.php";
    $query=$db->prepare('SELECT * from details where id=?');
    $query->execute(array(
        $_GET['cid']
    ));
    $data=$query->fetchall();
    $count=sizeof($data);
    if ($count<=0) {
        header('location:./');
        $_SESSION['no_record_found']=true;
    }
}
else {
    header('location:./');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Certificate | Punjab Technical University</title>
    <!-- seo tags start -->
    <meta name="description" content="This is certify that <?php echo $data[0]['name'] ?> has participated in <?php echo $data[0]['issuedFor'] ?> that was held on <?php echo date_format(date_create($data[0]['event_date']),"d-m-Y") ?> by I K Gujaral Punjab Technical University<?php if($data[0]['position']!="none"){?> and got <?php echo $data[0]['position'] ?> position."><?php } ?>
    <meta property="og:title" content="Verify Your Certificate | Punjab Technical University" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $base_url.$data[0]['id'] ?>" />
    <meta property="og:image" content="<?php echo $base_url?><?php if ($data[0]['type']=="Participation") {
        echo 'participation_certificate_ikgptu.php?cid='.$data[0]['id'];
    }elseif ($data[0]['type']=="Merit") {
        echo 'merit_certificate_ikgptu.php?cid='.$data[0]['id'];   
    } ?>" />
    <meta property="og:image:width" content="526" />
    <meta property="og:image:height" content="275" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:description" content="This is certify that <?php echo $data[0]['name'] ?> has participated in <?php echo $data[0]['issuedFor'] ?> that was held on <?php echo date_format(date_create($data[0]['event_date']),"d-m-Y") ?> by I K Gujaral Punjab Technical University<?php if($data[0]['position']!="none"){?> and got <?php echo $data[0]['position'] ?> position." /><?php } ?>
    <meta property="og:site_name" content="Verify Your Certificate | Punjab Technical University" />
    <!-- seo tags ends -->
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <!-- jquery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <img src="./assets/images/logo.png" alt="Punjab Technical University logo">
            </li>
        </ul>
    </div>
    <div class="main-container">
        <div class="main-heading">
            <h1>
            Punjab Technical University
            </h1>
        </div>
        <div class="certificate-box col-lg-10">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="<?php if ($data[0]['type']=="Participation") {
        echo 'participation_certificate_ikgptu.php?cid='.$data[0]['id'];
    }elseif ($data[0]['type']=="Merit") {
        echo 'merit_certificate_ikgptu.php?cid='.$data[0]['id'];   
    } ?>" class="certificate-img" alt="certificate">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h2>Certificate of <?php echo $data[0]['type'] ?>
                            </h2>
                            <p>
                            This is certify that <b><?php echo $data[0]['name'] ?></b> has participated in <b><?php echo $data[0]['issuedFor'] ?></b>
                            that was held on <b><?php echo date_format(date_create($data[0]['event_date']),"d-m-Y") ?></b>
                            by <b>I K Gujaral Punjab Technical University</b> <?php if ($data[0]['position']!="none") {?>
                                and got <b><?php echo $data[0]['position'] ?></b> position.
                            <?php } ?>
                            <p>Issue Date:
                                <?php echo date_format(date_create($data[0]['issuedOn']),"d-m-Y")?>
                            </p>
                            <div class="social-tray">
                                <input type="text" id="link" value="<?php echo $base_url.$data[0]['id']?>" disabled> 
                                <span class="copy-link">
                                    <i class="fa-solid fa-clipboard"></i>
                                </span>
                                <div class="soical-icons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $base_url.$data[0]['id']?>" class="fb" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://linkedin.com/sharing/share-offsite/?url=<?php echo $base_url.$data[0]['id']?>" class="in" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="https://twitter.com/intent/tweet?text=<?php echo $base_url.$data[0]['id']?>" class="tw" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="whatsapp://send?text=<?php echo $base_url.$data[0]['id']?>" class="wp" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php if ($data[0]['type']=="Participation") {
        echo 'participation_certificate_ikgptu.php?cid='.$data[0]['id'];
    }elseif ($data[0]['type']=="Merit") {
        echo 'merit_certificate_ikgptu.php?cid='.$data[0]['id'];   
    } ?>" download><button class="download-btn">Download Certificate <i class="fa-solid fa-download"></i></button></a>
    </div>
    <footer class="certificate-footer">
        <p>
            © <?php echo date('Y')?> Copyright Reserved with <a href="https://mrsahil.in" target="_blank">Sahil Kumar</a>
        </p>
    </footer>
    <!-- custom script file -->
    <script src="./assets/js/main.js"></script>
</body>

</html>