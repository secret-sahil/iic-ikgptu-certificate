<!-- session check -->
<?php 
  session_start();
  if (empty($_SESSION['user'])) {
    header('location:./');
  }
?>
<?php include "include/header.php"?>
<body>
<?php include "include/nav.php";
if (isset($_GET['edit'])) {
    $id=$_GET['edit'];
}
else{
    $id=$_POST['edit'];
}
require_once('include/db.php');
$query=$db->prepare('SELECT * from details where id=?');
$query->execute(array(
    $id
));
$data=$query->fetch();
?>
<!-- php code -->
<?php
if (isset($_POST['type'])) {
  $type=$_POST['type'];
}else{
  $type=$_GET['type'];
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
    include 'include/functions.php';
    $issue_date=$_POST['issue_date'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $event_date=$_POST['event_date'];
    $Roll=$_POST['Roll'];
    $issuedFor=$_POST['issuedFor'];
    $campus_name=$_POST['campus_name'];
    $position=$_POST['position'];
    $description=$_POST['description'];
    if (empty($name) or empty($email) or empty($Roll) or empty($issuedFor) or empty($position) or empty($event_date) or empty($issue_date) or empty($campus_name)) {
      alert2('All fields are required','danger');
      $error[]=1;
  } else {
      require_once('include/db.php');
      $query=$db->prepare('UPDATE details SET name=?, Roll=?, email=?, event_date=?,issuedFor=?,issuedOn=?, description=?, position=?, campus_name=? where id=?');
      $query->execute([
        $name,
        $Roll,
        $email,
        $event_date,
        $issuedFor,
        $issue_date,
        $description,
        $position,
        $campus_name,
        $id
    ]);
    // logging action
      date_default_timezone_set("Asia/Calcutta");
      $log_query=$db->prepare('INSERT into logs(action) VALUES(?)');
      $log_query->execute(array(
        $_SESSION['username'].' Edited certificate having certificate ID ('.$id.') on '.date("d-m-Y | h:i:sa")
      ));
      alert2('Certificate Updated Sucessfully','success');
      header( "refresh:1;url=all_certificates.php" );
    }
}
?>
  <div class="add-certificate">
    <h2 class="text-center">Add Certificate</h2>
    <form action="edit_certificate.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="type" value="<?php echo $type ?>" hidden>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="edit" value="<?php echo $data['id'];?>" placeholder="Certificate ID" readonly>
        <label for="floatingInput">Certificate ID</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>" placeholder="Name">
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" value="<?php echo $data['email'];?>" placeholder="Email">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="Roll" value="<?php echo $data['Roll'];?>" placeholder="Roll no.">
        <label for="floatingInput">Roll No.</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="campus_name" value="<?php echo $data['campus_name'];?>" placeholder="Campus Name">
        <label for="floatingInput">Campus Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" name="event_date" value="<?php echo $data['event_date'];?>" placeholder="Event Date">
        <label for="floatingInput">Event Date</label>
      </div>
      <div class="form-floating mb-3">
        <textarea class="form-control" name="issuedFor" id="mytextarea" placeholder="Certificate Issued for participating in (Event Name)" style="height: 100px"><?php echo $data['issuedFor'];?></textarea>
        <label for="floatingTextarea">Certificate Issued for participating in (Event Name)</label>
      </div>
      <?php if ($type=="Merit") {?>
        <div class="form-floating mb-3">
          <select class="form-select" name="position" id="floatingSelect" aria-label="Floating label select example">
              <?php if ($data['position']=="none") { ?>
                <option value="1st">First</option>
                <option value="2nd">Second</option>
                <option value="3rd">Third</option>
              <?php }?>
              <?php if ($data['position']=="1st") { ?>
                <option selected value="1st">First</option>
                <option value="2nd">Second</option>
                <option value="3rd">Third</option>
              <?php }?>
              <?php if ($data['position']=="2nd") { ?>
                <option value="1st">First</option>
                <option selected value="2nd">Second</option>
                <option value="3rd">Third</option>
              <?php }?>
              <?php if ($data['position']=="3rd") { ?>
                <option value="1st">First</option>
                <option value="2nd">Second</option>
                <option selected value="3rd">Third</option>
              <?php }?>
            </select>
            <label for="floatingSelect">Position if any?</label>
        </div>
      <?php }?>
      <?php if ($type=="Participation") { ?>
        <input type="text" name="position" value="<?php echo "none" ?>" hidden>
      <?php }?>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="issue_date" value="<?php echo $data['issuedOn'];?>" placeholder="To Date">
          <label for="floatingInput">Date of issue</label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control" name="description" id="mytextarea" placeholder="description" style="height: 100px"><?php echo $data['description'];?></textarea>
          <label for="floatingTextarea">Any Refrence(for e.g. student from another university)</label>
        </div>
      <button type="submit" class="btn"><i class="fa-solid fa-circle-plus"></i> Submit</button>
    </form>
  </div>
  <?php include 'include/footer.php';?>