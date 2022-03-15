<!-- session check -->
<?php 
  session_start();
  if (empty($_SESSION['user'])) {
    header('location:./');
  }
include 'include/header.php';
?>
<body>
<?php include "include/nav.php"?>
<?php
require_once 'include/db.php';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  include 'include/functions.php';
  if (empty($_POST['pwd']) or empty($_POST['npwd']) or empty($_POST['c_npwd'])) {
    alert2('All fields are required','danger');
  }
  elseif ($_POST['c_npwd']!=$_POST['npwd']) {
    alert2('Password do not match','danger');
  }
  else {
    require_once 'include/db.php';
    $query=$db->prepare('SELECT * from admin where id=?');
    $query->execute(array(
      $_SESSION['id'],
    ));
    $data=$query->fetch();
    if (password_verify($_POST['pwd'], $data['password'])) {
      $query=$db->prepare('UPDATE admin SET password=? where id=?');
      $query->execute(array(
        password_hash($_POST['npwd'], PASSWORD_BCRYPT),
        $_SESSION['id']
      ));
      alert2('Password changed sucessfully.','success');
      header( "refresh:1;url=./" );
    } else {
      alert2('Wrong old password','danger');
    }
  }
}
?>
<div class="form">
  <div class="col-lg-4 col-md-6 col-sm-12">
    <form action="change_password.php" method="POST">
        <h2 class="text-center">Change Password</h2>
        <div class="form-floating mb-3">
          <input type="password" name="pwd" class="form-control" placeholder="Password">
          <label for="floatingPassword">Currect Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="npwd" class="form-control" placeholder="Password">
          <label for="floatingPassword">New Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="c_npwd" class="form-control" placeholder="Password">
          <label for="floatingPassword">Confirm Password</label>
        </div>
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Submit</button>
    </form>
  </div>
</div>
<?php include "include/footer.php"?>