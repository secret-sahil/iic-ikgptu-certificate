<!-- session check -->
<?php 
  session_start();
  if (empty($_SESSION['user']) || $_SESSION['user']!='admin') {
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
  if (empty($_POST['username']) or empty($_POST['pwd']) or empty($_POST['email'])) {
    alert2('All fields are required','danger');
  }
  elseif ($_POST['pwd']!=$_POST['cpwd']) {
    alert2('Password do not match','danger');
  }
  else {
    require_once 'include/db.php';
    $query=$db->prepare('SELECT * from admin where email=?');
    $query->execute(array(
      $_POST['email'],
    ));
    $data=$query->fetchall();
    $count= count($data);
    if ($count>0) {
      alert2('Email already exist','danger');
    } else {
      $query=$db->prepare('INSERT INTO admin (name,email,password,type) VALUES(?,?,?,"issuer")');
      $query->execute(array(
        $_POST['username'],
        $_POST['email'],
        password_hash($_POST['pwd'], PASSWORD_BCRYPT)
      ));
      // logging action
      date_default_timezone_set("Asia/Calcutta");
      $log_query=$db->prepare('INSERT into logs(action) VALUES(?)');
      $log_query->execute(array(
        $_SESSION['username'].' Added new user "'.$_POST['email'].'" on '.date("d-m-Y | h:i:sa")
      ));
      alert2('Issuer added sucessfully.','success');
      header( "refresh:1;url=view_issuers.php" );
    }
  }
}
?>
<div class="form">
  <div class="col-lg-4 col-md-6 col-sm-12">
    <form action="add_issuer.php" method="POST">
        <h2 class="text-center">Add Issuer</h2>
        <div class="form-floating mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control" placeholder="email">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="pwd" class="form-control" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="cpwd" class="form-control" placeholder="Password">
          <label for="floatingPassword">Confirm Password</label>
        </div>
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Submit</button>
    </form>
  </div>
</div>
<?php include "include/footer.php"?>