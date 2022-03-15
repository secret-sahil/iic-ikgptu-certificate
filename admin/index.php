<!-- session check -->
<?php 
  session_start();
  if (isset($_SESSION['user'])) {
    header('location:dashboard.php');
  }
?>
<?php include "include/header.php"?>
<body>
<?php include "include/nav.php"?>
<div class="form">
  <div class="col-lg-4 col-md-6 col-sm-12">
    <form action="./" method="POST">
        <h2 class="text-center">Admin Login</h2>
        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control" placeholder=Email">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="pwd" class="form-control" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
      <p>Not an admin? <a href="../">Back to Home</a></p>
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</button>
    </form>
  </div>
</div>
<?php include "include/footer.php"?>
<?php
require_once 'include/db.php';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  include 'include/functions.php';
  if (empty($_POST['email']) or empty($_POST['pwd'])) {
    alert('All fields are required','danger');
  }
  else {
    require_once 'include/db.php';
    $query=$db->prepare('SELECT * from admin where email=?');
    $query->execute(array(
      $_POST['email'],
    ));
    $data=$query->fetchall();
    if (sizeof($data)>0) {
      if(password_verify($_POST['pwd'], $data[0]['password'])) {
        $_SESSION['user']=$data[0]['type'];
        $_SESSION['email']=$data[0]['email'];
        $_SESSION['username']=$data[0]['name'];
        $_SESSION['id']=$data[0]['id'];
        alert('Login Sucuessfully!','success');
        header( "refresh:1;url=dashboard.php" );
      } else {
        alert('Wrong email or Password','danger');
      }
    } else {
      alert('Wrong email or Password','danger');
    }
    
  }
  
}
?>