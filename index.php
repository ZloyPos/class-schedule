<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>График занятий</title>
</head>
<body>
    <h2>Добавление занятия</h2>
    <form action="add.php" method="post">
        <label for="teacher">Преподаватель:</label>
        <select name="teacher" id="teacher">
            <?php
            include ("connect.php");
            $sql = "SELECT id, teacher_name FROM teachers";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['teacher_name'] . "</option>";}
            ?>
        </select><br><br>
        <label for="subject">Предмет:</label>
        <select name="subject" id="subject">
            <?php
            include ("connect.php");
            $sql = "SELECT id, subject_name FROM subjects";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['subject_name'] . "</option>";}
            ?>
        </select><br><br><label for="group">Группа:</label>
        <select name="group" id="group">
            <?php
            include ("connect.php");
            $sql = "SELECT id, group_name FROM groups";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['group_name'] . "</option>";}
            ?>
        </select><br><br>
        <label for="date">Дата:</label>
        <input type="date" name="date" id="date"><br><br>
        <label for="time">Время:</label>
        <input type="time" name="time" id="time"><br><br>
        <input type="submit" value="Добавить занятие">
    </form><br><br>
    <?php
    include ("table.php");
    ?>
</body>
</html>