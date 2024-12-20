<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Registration Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background:aqua;
        }
        form {
            flex-direction: column;
    max-width: 409px;
    margin: auto;
    padding: 54px;
    display: flex
;
    border: 1px solid #ccc;
    border-radius: 10px;
    background:#00ffd6;
        }
        form div {
            margin-bottom: 15px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input, form select, form textarea, form button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 2px solid #007BFF;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        #popup button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Pet Registration Form</h2>

<form id="petForm">
    <div>
        <label for="petName">Pet Name</label>
        <input type="text" id="petName" name="petName" required>
    </div>
    <div>
        <label for="ownerName">Owner's Name</label>
        <input type="text" id="ownerName" name="ownerName" required>
    </div>
    <div>
        <label for="petType">Pet Type</label>
        <select id="petType" name="petType" required>
            <option value="">Select Type</option>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Bird">Bird</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div>
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>
    </div>
    <div>
        <label for="gender">Gender</label>
        <div>
            <label><input type="radio" name="gender" value="Male" required> Male</label>
            <label><input type="radio" name="gender" value="Female"> Female</label>
        </div>
    </div>
    <div>
        <label for="notes">Special Notes</label>
        <textarea id="notes" name="notes" rows="3"></textarea>
    </div>
    <button type="submit">Register Pet</button>
</form>

<div id="popup">
    <h3>Data Saved!</h3>
    <div id="savedData"></div>
    <button onclick="$('#popup').hide();">Close</button>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pet_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'error' => $conn->connect_error]);
        exit;
    }

    $petName = $conn->real_escape_string($_POST['petName']);
    $ownerName = $conn->real_escape_string($_POST['ownerName']);
    $petType = $conn->real_escape_string($_POST['petType']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $notes = $conn->real_escape_string($_POST['notes']);

    $sql = "INSERT INTO pets (petName, ownerName, petType, dob, gender, notes) VALUES ('$petName', '$ownerName', '$petType', '$dob', '$gender', '$notes')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            'success' => true,
            'petName' => $petName,
            'ownerName' => $ownerName,
            'petType' => $petType,
            'dob' => $dob,
            'gender' => $gender,
            'notes' => $notes
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $conn->close();
    exit;
}
?>

<script>
    $(document).ready(function() {
        $('#petForm').on('submit', function(e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                url: window.location.href, 
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $('#savedData').html(
                            `<p><strong>Pet Name:</strong> ${response.petName}</p>
                             <p><strong>Owner's Name:</strong> ${response.ownerName}</p>
                             <p><strong>Pet Type:</strong> ${response.petType}</p>
                             <p><strong>Date of Birth:</strong> ${response.dob}</p>
                             <p><strong>Gender:</strong> ${response.gender}</p>
                             <p><strong>Special Notes:</strong> ${response.notes}</p>`
                        );
                        $('#popup').show();
                        $('#petForm')[0].reset();
                    } else {
                        alert('Error saving data: ' + (response.error || 'Unknown error'));
                    }
                },
                error: function() {
                    alert('Failed to send request. Please try again.');
                }
            });
        });
    });
</script>

</body>
</html>
