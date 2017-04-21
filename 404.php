<!-- =-=-=-=-=-=-= HEADER  =-=-=-=-=-=-= -->
<?php
session_start();
if (isset($_SESSION['user'])){

	include 'logInHeader.php';

}else {
	include 'header.php';
}
?>
<!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <form action="index.php" method="get">
               		<input type="image" src="assets/images/404error.png" name="" id="" style="padding: 0 8em"/>
               </form>
            </div>
        </div>
    </div>
</div>

<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<?php 
	require './footer.php';
?>
