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
$query=$db->query('SELECT * from admin');
?>
<script>
    function edit(sno) {
        window.location.href="edit_issuer.php?edit="+sno
    }
    function del(sno) {
        if (confirm('Do you Really Want to delete?')) {
            window.location.href="view_issuers.php?del="+sno
        }
    }
</script>
<?php 
    if (isset($_GET['del'])) {
        $query=$db->prepare('DELETE from admin where id=?');
        $query->execute(array(
            $_GET['del']
        ));
        // logging action
        date_default_timezone_set("Asia/Calcutta");
        $log_query=$db->prepare('INSERT into logs(action) VALUES(?)');
        $log_query->execute(array(
            $_SESSION['username'].' Deleted a user on '.date("d-m-Y | h:i:sa")
        ));
        header('location:view_issuers.php');
    }
?>
<body>
    <?php include 'include/nav.php';?>
    <center>
            <h2>All Issuers</h2>
            <a href="add_issuer.php"><button class="btn"><i class="fa-solid fa-circle-plus"></i> Add New Issuer</button></a>
        </center>
    <div class="table-responsive custom-table">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">S.no</th>
                <th scope="col">Email</th>
                <th scope="col">Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sno=0;
                while ($data=$query->fetch()) { ?>
                    <tr>
                    <?php if ($data['id']!=1) { ?>
                        <th scope="row"><?php echo $sno; ?></th>
                        <td><?php echo $data['email'] ?></td>     
                        <td>
                        <a style="font-size:1.6rem; color:#00a1ff; cursor:pointer;" onclick=edit(<?php echo $data['id'] ?>)><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; &nbsp;
                            <a style="font-size:1.6rem; color:red; cursor:pointer;" onclick=del(<?php echo $data['id'] ?>)><i class="fa-solid fa-trash"></i></a>
                        </td>
                    <?php }?>
                    </tr>
                <?php $sno=$sno+1; }?>
            </tbody>
        </table>
    </div>
    <?php include 'include/footer.php';?>