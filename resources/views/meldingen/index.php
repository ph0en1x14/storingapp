<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <div style="height: 300px; background: #ededed; display: flex; color: #666666;">
        
        <?php 
        require_once'../../../config/conn.php';
        $query= "SELECT * FROM meldingen";
        $statement=$conn->prepare($query);
        $statement->execute();
        $meldingen=$statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table>
            <tr>
                <th>Attractie</th>
                <th>Type</th>
                <th>Melder</th>
                <th>Overige</th>
            </tr>
        <?php foreach($meldingen as $melding): ?>
            <tr>
                <td><?php echo $melding['attractie'] ?></td>
                <td><?php echo $melding['type'] ?></td>
                <td><?php echo $melding['melder'] ?></td>
                <td><?php echo $melding['overige_info'] ?></td>
            </tr>
        <?php endforeach; ?>
        </table> 
        
    
        </div>
    </div>

</body>

</html>
