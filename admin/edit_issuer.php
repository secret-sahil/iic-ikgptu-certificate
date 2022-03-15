<!-- session check -->
<?php 
  session_start();
  if (empty($_SESSION['user']) || $_SESSION['user']!='admin') {
    header('location:./');
  }
include 'include/header.php';
if (isset($_GET['edit'])) {
    $id=$_GET['edit'];
}
else {
    $id=$_POST['edit'];
}
include 'include/db.php';
$query=$db->prepare('SELECT * from admin where id=?');
    $query->execute(array(
      $id,
    ));
$data=$query->fetch();
?>
<body>
<?php include "include/nav.php"?>
<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
  include 'include/functions.php';
  if (empty($_POST['npwd']) or empty($_POST['c_npwd'])) {
    alert2('All fields are required','danger');
  }
  elseif ($_POST['c_npwd']!=$_POST['npwd']) {
    alert2('Password do not match','danger');
  }
  else {
    require_once 'include/db.php';
      $query=$db->prepare('UPDATE admin SET password=? where id=?');
      $query->execute(array(
        password_hash($_POST['npwd'], PASSWORD_BCRYPT),
        $id
      ));
      alert2('Password changed sucessfully.','success');
      header( "refresh:1;url=view_issuers.php" );
    }
}
?>
<div class="form">
  <div class="col-lg-4 col-md-6 col-sm-12">
    <form action="edit_issuer.php" method="POST">
        <input type="text" name="edit" value="<?php echo $data['id'] ?>" hidden>
        <h2 class="text-center">Change Password</h2>
        <div class="form-floating mb-3">
          <input type="text" value="<?php echo $data['name'] ?>" class="form-control" placeholder="Name" disabled>
          <label for="floatingPassword">Name</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" value="<?php echo $data['email'] ?>" class="form-control" placeholder="Email" disabled>
          <label for="floatingPassword">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="npwd" class="form-control" placeholder="Change Password">
          <label for="floatingPassword">Change Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="c_npwd" class="form-control" placeholder="Confirm Password">
          <label for="floatingPassword">Confirm Password</label>
        </div>
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Submit</button>
    </form>
  </div>
</div>
<?php include "include/footer.php"?>