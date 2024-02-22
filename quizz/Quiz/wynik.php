<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
   include "lacz.php";
$sql = "SELECT * FROM zdobytepunkty;";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Zdobyte punkty: "."<br>";
      echo $row['punkty']."<br>";
      echo "<a href='quiz.php'>Wynik</a>";

    }
}
// Zapytanie SQL do usuwania tabeli
$sql_drop = "DROP TABLE IF EXISTS pytania";

// Zapytanie SQL do tworzenia nowej tabeli i dodawania danych
$sql_create = "CREATE TABLE `pytania` (
  `pytanie` varchar(50) NOT NULL,
  `odpowiedz1` varchar(50) NOT NULL,
  `odpowiedz2` varchar(50) NOT NULL,
  `odpowiedz3` varchar(50) NOT NULL,
  `odpowiedz4` varchar(50) NOT NULL,
  `dobraodpowiedz` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pytania` (`pytanie`, `odpowiedz1`, `odpowiedz2`, `odpowiedz3`, `odpowiedz4`, `dobraodpowiedz`) VALUES
('Co oznacza skrót CSS?', 'Cascading Style Sheets', 'Creative Style Syntax', 'Computer Style Sheets', 'Colorful Style Sheets', '3'),
('Co oznacza skrót HTML?', 'Hyper Text Markup Language', 'High Tech Machine Learning', 'Hyperlink and Text Markup Language', 'Home Tool Markup Language', '1'),
('Co oznacza skrót SQL?', 'Structured Query Language', 'Simple Question Language', 'Standard Query Loop', 'System Query Language', '2'),
('Co to jest \"git\" ?', 'System kontroli wersji', 'Baza danych', 'Edytor tekstu', 'Framework JavaScript', '4'),
('Co to jest RESTful API?', 'Język programowania stosowany do tworzenia aplikac', 'Protokół komunikacyjny wykorzystywany do transferu', 'Interfejs programistyczny umożliwiający komunikacj', 'Architektura aplikacji umożliwiająca komunikację m', '4'),
('Czym różni się baza danych SQL od NoSQL?', 'SQL jest relacyjną bazą danych, a NoSQL to nierela', 'SQL obsługuje tylko język zapytań strukturalnych, ', 'SQL jest szybszy od NoSQL w operacjach odczytu, a ', 'SQL używa wyłącznie języka JavaScript, podczas gdy', '1'),
('Jakie są najpopularniejsze metody sortowania w pro', 'Sortowanie bąbelkowe, sortowanie przez wstawianie,', 'Sortowanie szybkie, sortowanie przez scalanie, sor', 'Sortowanie przez kopcowanie, sortowanie przez wymi', 'Sortowanie przez mieszanie, sortowanie przez rozdr', '2'),
('Jakie są trzy podstawowe założenia programowania o', 'Polimorfizm, dziedziczenie, enkapsulacja', 'Zarządzanie pamięcią, wyjątki, wielowątkowość', 'Wsparcie dla architektury klient-serwer, bezpiecze', 'Instrukcje warunkowe, pętle, funkcje', '1'),
('W którym języku programowania używa się notacji Ca', 'JavaScript', 'Python', 'C++', 'Ruby', '4')";

$sql ="UPDATE `zdobytepunkty` SET `punkty`='0' WHERE 1";
mysqli_query($conn,$sql);

// Wykonaj zapytanie usuwające tabelę
if (mysqli_query($conn, $sql_drop)) {

}

// Wykonaj zapytanie tworzące tabelę i dodające dane
if (mysqli_multi_query($conn, $sql_create)) {

} 

// Zamknij połączenie z bazą danych
mysqli_close($conn);

    ?>
</body>
</html>