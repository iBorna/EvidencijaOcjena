<!DOCTYPE html>
<html>
<head>
    <title>Studenti</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 5px;
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
    <h1>Lista Studenta</h1>

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
                    <button type="submit">--></button>
                </form>
              </td>';
            echo '</tr>';
        }
        ?>
    </table>

    <form action="/controllers/StudentController.php" method="POST">
        <div class="input-group">
            <label for="ime">Ime:</label>
            <input type="text" name="ime" id="ime" required>
        </div>
        <div class="input-group">
            <label for="prezime">Prezime:</label>
            <input type="text" name="prezime" id="prezime" required>
        </div>
        <button type="submit">Dodaj studenta</button>
    </form>
</div>
</body>
</html>
