<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Agent Registration</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:#474646;        
        }
        #title{
            font-size:50px;
        }
        .main{
            display:flex;
            gap:3%
        }
        .container {
            margin: 20px;
    background:rgb(187, 182, 182);;
    padding: 20px;
    display: flex;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1
        {
            text-align: center;
            
            color: rgb(255 161 0);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form,
        aside {
            margin-top: 20px;
        }

        label {
            color:rgb(0, 0, 0);
    display: block;
    margin-top: 10px;
    font-weight: bold;
        }
        form{
            width: 524px;
        }
        input{
            width:350px;
        }
        input,
        textarea,
        select {
            padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 95%;
    font-style: italic;
    color: #350606;
    background:rgb(255, 255, 255);
    font-weight: bold;
        }

        button {
            display: block;
            width: 30%;
            display:flex;
            justify-self:center;
            padding: 10px 50px;
            margin-top: 20px;
            background-color: rgb(251, 182, 55);
            color: black;
            text-align:center;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="range"]{
            rgb(251, 182, 55);
        }
        button:hover {
            background-color:rgb(255, 166, 0);
        }
        aside{
            width: 400px;
            height: 400px;
            padding: 20px;
            margin:20px;
            border-radius:20px;
            background-color:rgb(187, 182, 182);
        }
        .rad{
            display: flex;;
        }
        .rad input{
            margin-top: 16px;
        }
        img{
            display:flex;
            justify-self:center;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .modal-content {
        background-color: rgb(187, 182, 182);
        margin: 10% auto;
        padding: 20px;
        border-radius: 10px;
        width: 60%;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        align-items: center;
        

    }

    .close {
        color:rgb(68, 62, 62);
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }

    </style>
</head>

<body>
    <h1 id="title">Secret Agent Registration Form</h1>
    <div class="main">
    <div class="container">
        <form id="agentForm" action="" method="POST" enctype="multipart/form-data">
            <label for="name">Name of the Agent:</label>
            <input type="text" id="name" name="Name" required><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br>

            <label for="pincode">Pincode:</label>
            <input type="text" id="pincode" name="pincode" required><br>

            <label for="agentKey">Agent Key Password:</label>
            <input type="password" id="agentKey" name="agentKey" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required><br>

            <label for="experience">Previous Work Experience:</label>
            <textarea id="experience" name="experience"></textarea><br>

            <label for="organization">Previous Organization:</label>
            <input type="text" id="organization" name="organization"><br>

            <label for="role">Choose a Role:</label>
            <select id="role" name="role">
                <option value="Spy">Spy</option>
                <option value="Field Agent">Field Agent</option>
                <option value="Analyst">Analyst</option>
                <option value="Hacker">Hacker</option>
            </select><br>

            <label for="skills">Rate Your Skill (1-100):</label>
            <input type="range" id="skills" name="skills" min="1" max="100"><br>

            <label for="idProof">Upload ID Proof:</label>
            <input type="file" id="idProof" name="idProof" ><br>

            <label>Your mission, should you decide to accept it</label>
            <div class="rad">
                <label for="ownedYes">Yes</label>
                <input type="radio" id="Yes" name="yesno" value="Yes" required>
            </div>
            <div class="rad"><label for="ownedNo">No</label>
                <input type="radio" id="no" name="yesno" value="No" required>
            </div>

            <button type="submit">Register</button>
        </form>

       
    </div>
    <aside>
            <h1 style="color:black;">Agent ID Viewer</h1>
            <img src="user.png" alt="">
            <h1 style="color:black;">Welcome Solder !</h1>
            <p style="text-align:center">Your unique Agent ID will be displayed here after registration.</p>
            <p style="text-align:center;font-style:italic;">" We live and die in the shadows, for those we hold close — and those we never meet. "</p>
            
        </aside>
    </div>
    <div id="detailsModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 style="color:rgb(230, 3, 45); text-align:center;">Registered Agent Details</h2>
        <p id="agentDetails" style="color:black; font-size:25px; font-family:Arial, sans-serif;"></p>
    </div>
</div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "agent_registration";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['Name'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $country = $_POST['country'];
        $address = $_POST['address'];
        $pincode = $_POST['pincode'];
        $agentKey = $_POST['agentKey'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $experience = $_POST['experience'];
        $organization = $_POST['organization'];
        $role = $_POST['role'];
        $skills = $_POST['skills'];
        $yesno = $_POST['yesno'];
        $idProof = $_FILES['idProof']['name'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["idProof"]["name"]);
        move_uploaded_file($_FILES["idProof"]["tmp_name"], $target_file);

        $sql = "INSERT INTO agents (Name, age, dob, country, address, pincode, agentKey, email, phone, experience, organization, role, skills, yesno, idProof) 
                VALUES ('$name', '$age', '$dob', '$country', '$address', '$pincode', '$agentKey', '$email', '$phone', '$experience', '$organization', '$role', '$skills', '$yesno', '$idProof')";

                $conn->close();
    }
    ?>

    <script>
        $(document).ready(function () {
            $('#submitBtn').click(function () {
                var formData = new FormData($('#agentForm')[0]);

                $.ajax({
                    url: '',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        try {
                            var data = JSON.parse(response);
                            if (data.success) {
                                $('#responseMessage').html('<p style="color: green;">' + data.message + '</p>');
                            } else {
                                $('#responseMessage').html('<p style="color: red;">' + data.message + '</p>');
                            }
                        } catch (e) {
                            $('#responseMessage').html('<p style="color: red;">An error occurred while processing your request.</p>');
                        }
                    },
                    error: function () {
                        $('#responseMessage').html('<p style="color: red;">Failed to send the request. Please try again later.</p>');
                    }
                });
            });
        });
        
    document.querySelector('#agentForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(e.target);
        const agentDetails = `
            <b>Name:</b> ${formData.get('Name')}<br>
            <b>Age:</b> ${formData.get('age')}<br>
            <b>Date of Birth:</b> ${formData.get('dob')}<br>
            <b>Country:</b> ${formData.get('country')}<br>
            <b>Address:</b> ${formData.get('address')}<br>
            <b>Pincode:</b> ${formData.get('pincode')}<br>
            <b>Email:</b> ${formData.get('email')}<br>
            <b>Phone:</b> ${formData.get('phone')}<br>
            <b>Role:</b> ${formData.get('role')}<br>
            <b>Skills:</b> ${formData.get('skills')}<br>
            <b>Mission Accepted:</b> ${formData.get('yesno')}<br>
        `;

        document.getElementById('agentDetails').innerHTML = agentDetails;

        const modal = document.getElementById('detailsModal');
        modal.style.display = 'block';

        document.querySelector('.close').addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        };
    });

    </script>
</body>

</html>