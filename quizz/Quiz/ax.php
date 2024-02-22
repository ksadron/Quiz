<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <style>
        h1 {
            font-family: "Protest Strike", sans-serif;
            font-weight: 100;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .card {
            font-family: "Protest Strike", sans-serif;
            font-weight: 100;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        form button {
            width: 60%;
            text-align: center;
            padding: 10px;
            margin-bottom: 5px;
            background-color: #99ff33;
            border-radius: 15px;
        }
        .message {
            color: #ff0000;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Witaj na quizie!</h1>
    <div id="clock" onclick="startCountdown()">Kliknij, aby rozpocząć odliczanie do 1 minuty</div>

    <script>
        var countdownStarted = false; // Flaga oznaczająca, czy odliczanie zostało już uruchomione

        function startCountdown() {
            if (!countdownStarted) {
                var timeLeft = 10;
                var clockDiv = document.getElementById('clock');
                clockDiv.innerHTML = "Pozostały czas: " + timeLeft + " sekund";

                var countdown = setInterval(function() {
                    timeLeft--;
                    if (timeLeft <= 0) {
                        clearInterval(countdown);
                        window.location.href = 'wynik.php';
                    } else {
                        clockDiv.innerHTML = "Pozostały czas: " + timeLeft + " sekund";
                    }
                }, 1000);
                countdownStarted = true; // Ustawiamy flagę na true, aby oznaczyć, że odliczanie zostało uruchomione
            }
        }

        function sendAnswer(selectedOption, correctAnswer) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send("selected_option=" + encodeURIComponent(selectedOption) + "&correct_answer=" + encodeURIComponent(correctAnswer));
        }
    </script>
    
    <?php
    include 'lacz.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (isset($_POST['selected_option']) && isset($_POST['correct_answer'])) {
        $selected_option = $_POST['selected_option'];
        $correct_answer = $_POST['correct_answer'];
        $result_text = ($selected_option == $correct_answer) ? true : false;

        if ($result_text) {
            $sql = "UPDATE `zdobytepunkty` SET `punkty` = `punkty` + 1;";
            mysqli_query($conn, $sql);
        } else {
            echo "Niepoprawny odpowiedz! Spróbuj jeszcze raz.";
        }
    }

    $sql = "SELECT * FROM pytania;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class='card'>
                <h2><?php echo $row["pytanie"]; ?></h2>
                <form>
                    <input type='hidden' name='correct_answer' value='<?php echo $row["dobraodpowiedz"]; ?>'>
                    <button type='button' onclick='sendAnswer(1, <?php echo $row["dobraodpowiedz"]; ?>)'><?php echo $row["odpowiedz1"]; ?></button>
                    <button type='button' onclick='sendAnswer(2, <?php echo $row["dobraodpowiedz"]; ?>)'><?php echo $row["odpowiedz2"]; ?></button>
                    <button type='button' onclick='sendAnswer(3, <?php echo $row["dobraodpowiedz"]; ?>)'><?php echo $row["odpowiedz3"]; ?></button>
                    <button type='button' onclick='sendAnswer(4, <?php echo $row["dobraodpowiedz"]; ?>)'><?php echo $row["odpowiedz4"]; ?></button>
                </form>
            </div>
            <?php
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>
