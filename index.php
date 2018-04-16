<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" id="font-awesome-style-css" href="https://www.phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
<!-- jQuery -->
    <script defer src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <title>Тестовое задание</title>
</head>
<body>
<div class="links">
    <p style="font-size: 40px;"><i class="fas fa-hand-point-right"></i> <a target="_blank" href="http://test.bur138.ru/array.txt" style="font-size: 30px;padding-left: 3%;">Тестовый документ</a></p>
</div>
<div>
<div id="target-content" >loading...</div>

<?php
include('db.php');
?>
<div align="center">
<ul class='pagination text-center' id="pagination">
<?php
include_once ('link.php');
?>
</div>

</div>

</body>
<script defer type="text/javascript" src="js/script.js"></script>