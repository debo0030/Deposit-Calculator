<?php include("./Lab4Common/header.php");

session_start();
?>

<?php if (isset($_SESSION["name"])) :
    $info = $_SESSION["name"]; ?>

   <div class='container'>
   <h1>Thank you <?php print '<span class="distinct">'. $info .'</span>'; ?> for using the deposit calculator.</h1></div>

    <?php session_destroy();?>

 <?php else :
 {
    print("<div class='container'> ");
    print ("<h1>Thank you for using the deposit calculator.</h1></div>");
 }

endif;
?>

<?php include("./Lab4Common/footer.php"); ?>
