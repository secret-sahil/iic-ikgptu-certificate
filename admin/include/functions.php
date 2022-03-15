<?php function alert($msg,$color){?>
    <script type="text/javascript">
        notification('<?php echo $msg?>','<?php echo $color ?>')
    </script>
<?php }?>

<?php function alert2($msg,$color){?>
    <div class="alert-box">
        <div class="alert-msg col-lg-4 col-md-6 col-sm-12" id="alert">
        <div id="warn" class="alert alert-<?php echo $color ?> 
        alert-dismissible fade show" role="alert"><i class="fa-solid fa-circle-exclamation"></i> 
        <?php echo $msg ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        </div>
    </div>
<?php }?>