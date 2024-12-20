<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Agent Registration</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #424243;
        }
        .main{
            display:flex;
        }
        aside{
            display: flex;
    flex-direction: column;
    width: 400px;
    height: 400px;
    margin-right: 100px;
    text-align: center;
    background: #a8aaaa;
    border-radius: 14px;
            
        }
        aside img{
            height: 100px;
    width: 100px;
    border-radius: 50%;
    align-self: center;
    display: flex;
        }
        form {
            width: 460px;
    margin: auto;
    flex-direction: column;
    display: flex;
    background: #c0bdbd;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, select, textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
            background: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        #modal h2 {
            text-align: center;
            color: red;
        }
        #modal button {
            display: block;
            margin: 20px auto 0;
            background-color: #ff4d4d;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "secret_agents";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $code_name = $_POST['code_name'] ?? '';
    $real_name = $_POST['real_name'] ?? '';
    $date_of_birth = $_POST['date_of_birth'] ?? '';
    $country = $_POST['country'] ?? '';
    $special_skills = $_POST['special_skills'] ?? '';
    $assigned_mission = $_POST['assigned_mission'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';

    
    $sql = "INSERT INTO agents (code_name, real_name, date_of_birth, country, special_skills, assigned_mission, email, contact_number)
            VALUES ('$code_name', '$real_name', '$date_of_birth', '$country', '$special_skills', '$assigned_mission', '$email', '$contact_number')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('modal');
                document.getElementById('modal-content').innerHTML = `
                    <h2>Registered Agent Details</h2>
                    <p><strong>Name:</strong> $real_name</p>
                    <p><strong>Code Name:</strong> $code_name</p>
                    <p><strong>Date of Birth:</strong> $date_of_birth</p>
                    <p><strong>Country:</strong> $country</p>
                    <p><strong>Special Skills:</strong> $special_skills</p>
                    <p><strong>Assigned Mission:</strong> $assigned_mission</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Contact Number:</strong> $contact_number</p>
                `;
                modal.style.display = 'block';
            });
        </script>";

    } else {
        echo "<script>alert('Error: " . $sql . "\\n" . $conn->error . "');</script>";
    }

    $conn->close();

}

    
    ?>
    
<div class="main">
<form id="agent-registration-form" method="POST">
    <h2 style="color:goldenrod;text-align:center;">Secret Agent Registration</h2>

    <label for="code-name">Code Name:</label>
    <input type="text" id="code-name" name="code_name" required>

    <label for="real-name">Real Name:</label>
    <input type="text" id="real-name" name="real_name" required>

    <label for="date-of-birth">Date of Birth:</label>
    <input type="date" id="date-of-birth" name="date_of_birth" required>

    <label for="country">Country:</label>
    <select id="country" name="country">
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="Russia">Russia</option>
        <option value="China">China</option>
        <option value="Other">Other</option>
    </select>

    <label for="special-skills">Special Skills:</label>
    <textarea id="special-skills" name="special_skills" rows="4"></textarea>

    <label for="assigned-mission">Assigned Mission:</label>
    <input type="text" id="assigned-mission" name="assigned_mission" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="contact-number">Contact Number:</label>
    <input type="tel" id="contact-number" name="contact_number" required>

    <button type="submit">Submit</button>
</form>
<aside>
            <h1 style="color:black;">Agent ID Viewer</h1>
            <img src="user.png" alt="">
            <h1 style="color:black;">Welcome Solder !</h1>
            <p style="text-align:center">Your unique Agent ID will be displayed here after registration.</p>
            <p style="text-align:center;font-style:italic;">" We live and die in the shadows, for those we hold close — and those we never meet. "</p>
            
        </aside>
        
</div>
<div id="modal">
    <div id="modal-content"></div>
    <button onclick="document.getElementById('modal').style.display='none';">Close</button>
</div>

</body>
</html>
