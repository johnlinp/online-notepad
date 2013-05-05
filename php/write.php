<?php
   $page = $_POST['page'];
   $content = $_POST['content'];

   if($page == "")
      exit;

   $page_dir = "../page/";
   $handle = fopen($page_dir . $page, "w");
   fwrite($handle, $content);

?>
