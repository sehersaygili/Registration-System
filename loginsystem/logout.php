<?php
session_start();
$_SESSION['login']=="";

session_unset();
$_SESSION['logout']="You have logged out!!!!!";
?>
<script language="javascript">
document.location="index.php";
</script>
