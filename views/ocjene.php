<!DOCTYPE html>
<html>
<head>
    <title>Student - <?php echo $ime . ' ' . $prezime; ?></title>
    <style>
        .container {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
        }
        h2 {
            font-size: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-button {
            background-color: #ff6666;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .delete-button:hover {
            background-color: #ff3333;
        }
        form {
            margin-top: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Informacije o studentu</h1>
    <p><strong>Ime:</strong> <?php echo $ime . ' ' . $prezime; ?></p>
    <p><strong>ID studenta:</strong> <?php echo $student_id; ?></p>
    <form action="/controllers/StudentController.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
        <button class="delete-button" type="submit">Obriši studenta</button>
    </form>

    <h2>Ocjene</h2>
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
            echo '    <td>' . $ocjena['ocjena'] . '</td>';
            echo '    <td>
                    <form action="/controllers/OcjeneController.php" method="POST">
                        <input type="hidden" name="ocjena_id" value="'. $ocjena['id'] .'">
                        <button class="delete-button" type="submit">Ukloni</button>
                    </form>
                  </td>';
            echo '</tr>';
        }
        ?>

    </table>

    <form action="/controllers/OcjeneController.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
        <label for="predmet">Predmet:</label>
        <input type="text" name="predmet" id="predmet" required><br>
        <label for="ocjena">Ocjena:</label>
        <input type="number" name="ocjena" id="ocjena" required><br>
        <button type="submit">Dodaj ocjenu</button>
    </form>

    <form action="/" method="GET">
        <button type="submit">Povratak na popis studenata</button>
    </form>
</div>
</body>
</html>
