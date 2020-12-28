<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./style/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index.css">
        <title><?= Project::getSetting("project_title"); ?></title>
    </head>
    <body>

        <header><a href="#">TheNinja</a></header>

        <div class="container">

        <?php include_once(__PAGES__."/menu.php"); ?>

        <div class="row">
        
            <div class="col-3">
                <div class="card">
                    <div class="card-header">Title</div>
                    <div class="card-body">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo, fugit vel ratione, distinctio sed maxime perferendis provident, nihil optio voluptatum soluta. Accusamus atque fugit nulla sint consequuntur, numquam vitae debitis.</div>
                </div>
            </div>
            <div class="col-6">
