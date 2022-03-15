  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00a1ff;">
    <div class="container-fluid">
      <img src="../assets/images/logo.png" alt="kohli media logo" width="40px">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php if (isset($_SESSION['user'])) { ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="all_certificates.php">All Certificates</a>
          </li>
          <?php if ($_SESSION['user']=='admin') { ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="view_issuers.php">All Issuers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="view_logs.php">Action Logs</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="change_password.php">Change Password</a>
          </li>
        </ul>
        <a href="../" target="_blank">
          <i class="fa-solid fa-eye"></i>
        </a>
        <a href="logout.php">
          <i class="fa-solid fa-right-from-bracket"></i>
        </a>
      </div>
      <?php } ?>
    </div>
  </nav>
  <div class="alert-box">
    <div class="alert-msg col-lg-4 col-md-6 col-sm-12" id="alert">
    </div>
  </div>