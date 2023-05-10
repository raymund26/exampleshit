<?php
  include "config.php";
$id=$_GET["id"];
mysqli_query($conn, "delete from books where id=$id");

?>

<script type="text/javascript">
window.location="info_books.php";

</script>