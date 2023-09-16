<!DOCTYPE html>
<html>
<head>
    <title>Student - <?php echo $ime . ' ' . $prezime; ?></title>
    <link rel="stylesheet" href="Style/Simple.css">
</head>
<body>
<div class="container">
    <h1>Informacije o studentu</h1>
    <p><strong>Ime:</strong> <?php echo $ime . ' ' . $prezime; ?></p>
    <p><strong>ID studenta:</strong> <?php echo $student_id; ?></p>
    <form action="Controllers/StudentController.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
        <button class="delete-button" name="delete" type="submit">Obriši studenta</button>
    </form>

    <h2>Ocjene</h2>


        <?php
        if(!empty($ocjene)) {
            ?>
        <table>
            <tr>
                <th>Predmet</th>
                <th>Ocjena</th>
                <th>Opcije</th>
            </tr>
            <?php
            foreach ($ocjene as $ocjena) {
                echo '<tr>';
                echo '    <td>' . $ocjena['predmet'] . '</td>';
                echo '    <td>';
                echo '        <form action="Controllers/OcjeneController.php" method="POST">';
                echo '            <input type="hidden" name="ocjena_id" value="'. $ocjena['id'] .'">';
                echo '            <input type="number" min="1" max="5" name="nova_ocjena" value="'. $ocjena['ocjena'] .'" required>';
                echo '    </td>';
                echo '    <td>';
                echo '            <button class="edit-button" type="submit" name="edit">Uredi</button>';
                echo '            <button class="delete-button" type="submit" name="delete">Ukloni</button>';
                echo '        </form>';
                echo '    </td>';
                echo '</tr>';
            }?>
        </table><?php
        } else {
            echo "<h2>Trenutno nema ocjena!</h2>";
        }
        ?>



    <div>
        <form action="Controllers/OcjeneController.php" method="POST">
            <input type="hidden" name="student_id" value="15">
            <div class="custom-form-container">
                <label for="predmet" class="custom-label">Predmet:</label>
                <input type="text" name="predmet" id="predmet" class="custom-input" required="">
                <label for="ocjena" class="custom-label">Ocjena:</label>
                <input type="number" min="1" max="5" name="ocjena" id="ocjena" class="custom-input" required="">
                <button class="blue-button custom-button" type="submit" name="add">Dodaj ocjenu</button>
            </div>
        </form>

        <form action="index.php" method="GET">
            <button class="blue-button" type="submit">Povratak na popis studenata</button>
        </form>
    </div>
</div>
</body>
</html>
