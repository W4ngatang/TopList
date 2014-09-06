<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>TopList: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>TopList</title>
        <?php endif ?>

        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/"><img alt="TopList" src="/img/logo.gif" width="300" height="300"/></a>
            </div>

            <div id="middle">
            
                <ul class="nav nav-pills">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="createlist.php">Create/Edit</a></li>
                    <li><a href="mylists.php">My Lists</a></li>
                    <li><a href="compare.php">Compare</a></li>
                    <li><a href="logout.php"><strong>Log Out</strong></a></li>
                 </ul>
