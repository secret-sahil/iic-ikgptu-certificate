<!-- session check -->
<?php 
  session_start();
  if (empty($_SESSION['user'])) {
    header('location:./');
  }
?>
<?php include "include/header.php"?>
<body>
<?php include "include/nav.php"?>
<!-- php code -->
<?php
if (isset($_POST['type'])) {
  $type=$_POST['type'];
}else{
  $type=$_GET['type'];
}
$random_id = uniqid();
$varray = str_split($random_id);
$len = sizeof($varray);
$otp = array_slice($varray, $len-6, $len);
$otp = implode(",", $otp);
$otp = str_replace(',', '', $otp);
$user_certificate_id = "PTU".$otp;
if ($_SERVER['REQUEST_METHOD']=='POST') {
    include 'include/functions.php';
    $issue_date=$_POST['issue_date'];
    $c_id=$_POST['c_id'];
    $campus_name=$_POST['campus_name'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $event_date=$_POST['event_date'];
    $Roll=$_POST['Roll'];
    $issuedFor=$_POST['issuedFor'];
    $position=$_POST['position'];
    $type=$_POST['type'];
    $description=$_POST['description'];
  if (empty($name) or empty($email) or empty($Roll) or empty($issuedFor) or empty($event_date) or empty($campus_name) or empty($issue_date)) {
    alert2('All fields are required','danger');
    $error[]=1;
  } else {
      require_once('include/db.php');
      $query=$db->prepare('INSERT INTO details(id, name, Roll, email, event_date, issuedby,issuedFor,issuedOn, description, position, campus_name, type) 
      VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
      $query->execute([
        $c_id,
        $name,
        $Roll,
        $email,
        $event_date,
        $_SESSION['email'],
        $issuedFor,
        $issue_date,
        $description,
        $position,
        $campus_name,
        $type
    ]);
    // logging action
      date_default_timezone_set("Asia/Calcutta");
      $log_query=$db->prepare('INSERT into logs(action) VALUES(?)');
      $log_query->execute(array(
        $_SESSION['username'].' Added new certificate having certificate id ('.$id.') on '.date("d-m-Y | h:i:sa")
      ));
      alert2('Certificate Added Sucessfully','success');
      header( "refresh:1;url=all_certificates.php" );
    }
}
?>
  <div class="add-certificate">
    <h2 class="text-center">Add Certificate of <?php if ($type=="Merit"){echo "Merit";} elseif ($type=="Participation"){echo "Participation";}?></h2>
    <form action="add_certificate.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="type" value="<?php echo $type ?>" hidden>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="c_id" value="<?php echo $user_certificate_id;?>" placeholder="Certificate ID" readonly>
        <label for="floatingInput">Certificate ID</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="name" value="<?php if(isset($error)){ echo $_POST['name'];}?>" placeholder="Name">
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" placeholder="Email">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="Roll" value="<?php if(isset($error)){ echo $_POST['Roll'];}?>" placeholder="Roll no.">
        <label for="floatingInput">Roll No.</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="campus_name" value="<?php if(isset($error)){ echo $_POST['campus_name'];}?>" placeholder="Roll no.">
        <label for="floatingInput">Campus Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" name="event_date" value="<?php if(isset($error)){ echo $_POST['event_date'];}?>" placeholder="To Date">
        <label for="floatingInput">Event Date</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" name="issuedFor" id="mytextarea" placeholder="Issued For" style="height: 100px"><?php if(isset($error)){ echo $_POST['issuedFor'];}?></textarea>
        <label for="floatingTextarea">Certificate Issued for participating in (Event Name)</label>
      </div>
      <?php if ($type=="Merit") { ?>
        <div class="form-floating mb-3">
          <select class="form-select" name="position" id="floatingSelect" aria-label="Floating label select example">
            <option value="1st">First</option>
            <option value="2nd">Second</option>
            <option value="3rd">Third</option>
          </select>
          <label for="floatingSelect">Position if any?</label>
        </div>
      <?php }?>
      <?php if ($type=="Participation") { ?>
        <input type="text" name="position" value="<?php echo "none" ?>" hidden>
      <?php }?>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="issue_date" value="<?php if(isset($error)){ echo $_POST['issue_date'];}?>" placeholder="To Date">
          <label for="floatingInput">Date of issue</label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control" name="description" id="mytextarea" placeholder="description" style="height: 100px"><?php if(isset($error)){ echo $_POST['description'];}?></textarea>
          <label for="floatingTextarea">Any Refrence(for e.g. student from another university)</label>
        </div>
      <button type="submit" class="btn"><i class="fa-solid fa-circle-plus"></i> Submit</button>
    </form>
  </div>
  <?php include 'include/footer.php';?>