<?php include "inc/head.php"; ?>

<div class="navbar dark"> <?php include "inc/navigation.php"; ?> </div>
    
    <div class="container">

        <?php $this->flash('postAdded', 'alert alert-success') ?>
        <?php $this->flash('postUpdated', 'alert alert-success') ?>
        <?php $this->flash('postDeleted', 'alert alert-success') ?>
        <?php include "database.php"; ?>

    </div>

<?php include "inc/footer.php"; ?>
<!-- <script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script> -->

<?php linkJS("/assets/js/script.js"); ?>

<?php linkJS("/assets/js/dataTables.bootstrap5.min.js"); ?>
<?php linkJS("/assets/js/jquery.dataTables.min.js"); ?>
</body>
</html> 