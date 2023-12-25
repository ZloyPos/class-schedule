<?php
include ("connect.php");
// Получение расписания за выбранный месяц
$currentMonth = date('m');
$sql = "SELECT t.teacher_name AS teacher_name, sub.subject_name AS subject_name, g.group_name AS group_name, s.time
        FROM schedule s
        INNER JOIN teachers t ON s.id_teacher = t.id
        INNER JOIN subjects sub ON s.id_subject = sub.id
        INNER JOIN groups g ON s.id_group = g.id
        WHERE MONTH(s.time) = $currentMonth
        ORDER BY time ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Вывод расписания
    echo "<table border='1'>
    <tr>
    <th>Преподаватель</th>
    <th>Предмет</th>
    <th>Группа</th>
    <th>Время</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["teacher_name"]."</td>
        <td>".$row["subject_name"]."</td>
        <td>".$row["group_name"]."</td>
        <td>".$row["time"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "Нет данных о расписании для текущего месяца.";
}
?>