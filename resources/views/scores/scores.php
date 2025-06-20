<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scores Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <?php
        $scores = [10, 8, 6, 4, 2, 0];
    ?>

    <table class="table border">
        <tr>
            <th>STT</th>
            <th>Scores</th>
            <th>Results</th>
        </tr>
        <?php
            $STT = 1;
        ?>

        <?php foreach($scores as $row) :?>
            <tr class="<?= ($STT % 2 ===0) ? 'table-secondary' : ''?>">
                <td><?=$STT++?></td>
                <td><?=$row?></td>
                <td>
                    <?= $row > 5 ? 'pass' : 'fail' ?>
                </td>
            </tr>
        <?php endforeach ?>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>