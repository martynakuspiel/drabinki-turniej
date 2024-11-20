<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numParticipants = intval($_POST['numParticipants']);
    $participants = [];
    for ($i = 1; $i <= $numParticipants; $i++) {
        $participants[] = $_POST["participant_$i"];
    }
    shuffle($participants); 
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drabinka Turniejowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Drabinka Turniejowa</h1>
        <?php if (!empty($participants)): ?>
            <div class="bracket">
                <?php foreach (array_chunk($participants, 2) as $match): ?>
                    <div class="match">
                        <div class="participant"><?= htmlspecialchars($match[0]) ?></div>
                        <div class="participant"><?= htmlspecialchars($match[1] ?? '---') ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Błąd: Nie podano uczestników.</p>
        <?php endif; ?>
    </div>
</body>
</html>
