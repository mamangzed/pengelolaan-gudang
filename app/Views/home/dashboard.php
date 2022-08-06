<?= $this->extend('layout/main.php') ?>
<?= $this->section('content'); ?>

<?php 
if($user->level == 'admin'){
    echo $this->include('page/home_admin.php');
}elseif($user->level == 'petugas'){
    echo $this->include('page/home_petugas.php');
}elseif($user->level == 'superadmin'){
    echo $this->include('page/home_superadmin.php');
}else{
    echo 'FUCK YOU!!';
}
?>
<?= $this->endSection(); ?>