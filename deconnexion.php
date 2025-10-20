<?php

//recuperer la session
session_start();
//supprime la session
session_destroy();
//redirige vers le blog
header("Location: blog.php");

exit();