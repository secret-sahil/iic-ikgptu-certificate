<!-- session check -->
<?php 
  session_start();
  if (empty($_SESSION['user']) || $_SESSION['user']=='editor') {
    header('location:./');
  }
include 'include/header.php';
?>
<?php 
require_once 'include/db.php';
$query=$db->query('SELECT * from logs order by id desc');
?>
<body>
    <?php include 'include/nav.php';?>
    <center>
            <h2>Action Logs</h2>
        </center>
    <div class="table-responsive custom-table">
        <table class="table">
            <thead>
                <tr>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data=$query->fetch()) { ?>
                    <tr>
                        <td><?php echo $data['action'] ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <?php include 'include/footer.php';?>