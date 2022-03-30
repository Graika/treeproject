<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/template/css/style.css">
    <title><?=$title?></title>
</head>
<body>
<div id="central">
    <?php if($_SESSION['alogin']) { ?><a style="position: relative; float: right; margin: 20px 30px;" href="/logout">Выход</a><?php } ?>