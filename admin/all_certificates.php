<!-- session check -->
<?php 
  session_start();
  if (empty($_SESSION['user'])) {
    header('location:./');
  }
include 'include/header.php';
?>
<?php 
require_once 'include/db.php';
$query=$db->query('SELECT * from details ORDER BY name');
?>
<script>
    function edit(sno,type) {
        window.location.href="edit_certificate.php?edit="+sno+"&type="+type
    }
    function del(sno) {
        if (confirm('Do you Really Want to delete?')) {
            window.location.href="all_certificates.php?del="+sno
        }
    }
</script>
<?php 
    if (isset($_GET['del'])) {
        $query=$db->prepare('DELETE from details where id=?');
        $query->execute(array(
            $_GET['del']
        ));
        // logging action
        date_default_timezone_set("Asia/Calcutta");
        $log_query=$db->prepare('INSERT into logs(action) VALUES(?)');
        $log_query->execute(array(
            $_SESSION['username'].' Deleted certificate having certificate id "'.$_GET['del'].'" on '.date("d-m-Y | h:i:sa")
          ));
        header('location:all_certificates.php');
        $_SESSION['deleted_sucessfully']=true;
    }
?>
<body>
    <?php include 'include/nav.php'; ?>
    <center>
            <h2>Certificates</h2>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-circle-plus"></i> Issue New Certificate
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="add_certificate.php?type=Participation">Certificate of Participation</a></li>
                    <li><a class="dropdown-item" href="add_certificate.php?type=Merit">Certificate of Merit</a></li>
                </ul>
            </div>
        </center>
    <?php
    include 'include/functions.php';
    if (isset($_SESSION['deleted_sucessfully'])) {
        alert2('Deleted Sucessfully','success');
        unset($_SESSION['deleted_sucessfully']);
    }
    ?>
    <div class="table-responsive custom-table">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">S.no</th>
                <th scope="col">Certificate ID</th>
                <th scope="col">Name</th>
                <th scope="col">Parctipated In</th>
                <th scope="col">Issued By</th>
                <th scope="col">Edit/Delete</th>
                <th scope="col">View Certificate</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sno=1;
                while ($data=$query->fetch()) { ?>
                    <tr>
                        <th scope="row"><?php echo $sno; ?></th>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['issuedFor'] ?></td>
                        <td><?php echo $data['issuedBy'] ?></td>
                        <td>
                            <a style="font-size:1.6rem; color:#00a1ff; cursor:pointer;" onclick=edit("<?php echo $data['id'] ?>","<?php echo $data['type'] ?>")><i class="fa-solid fa-pen-to-square"></i></a>&nbsp; &nbsp;
                            <a style="font-size:1.6rem; color:red; cursor:pointer;" onclick=del("<?php echo $data['id'] ?>")><i class="fa-solid fa-trash"></i></a>
                        </td>
                        <td>
                            <a style="font-size:1.6rem; color:#00a1ff; cursor:pointer;" href="../<?php echo $data['id']?>" target="_blank"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                <?php $sno=$sno+1; }?>
            </tbody>
        </table>
    </div>
    <?php include 'include/footer.php';?>