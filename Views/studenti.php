<!DOCTYPE html>
<html>
<head>
    <title>Studenti</title>
    <link rel="stylesheet" href="Style/Simple.css">
</head>
<body>
<div class="container">
    <h1>Lista Studenta</h1>

    <?php
    if(!empty($studenti)) {
        ?>
        <table>
        <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Ocjene</th>
        </tr>
        <?php
        foreach ($studenti as $student) {
            echo '<tr>';
            echo '    <td>' . $student['ime'] . '</td>';
            echo '    <td>' . $student['prezime'] . '</td>';
            echo '    <td>
                <form action="student.php" method="GET">
                    <input type="hidden" name="student_id" value="' . $student['id'] .'">
                    <button class="blue-button" type="submit">--></button>
                </form>
              </td>';
            echo '</tr>';
        }?>
        </table><?php
    } else {
        echo "<h2>Trenutno nema studenta!</h2>";
    }
    ?>
    <div>
        <form action="Controllers/StudentController.php" method="POST">
            <div class="custom-form-container">
                <label for="ime" class="custom-label">Ime:</label>
                <input type="text" name="ime" id="ime" class="custom-input" required>
                <label for="prezime" class="custom-label">Prezime:</label>
                <input type="text" name="prezime" id="prezime" class="custom-input" required>
                <button class="blue-button custom-button" type="submit" name="add">Dodaj studenta</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
