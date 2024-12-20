<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Registration</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00ffbb;
            margin: 0;
            padding: 0;
        }

        #address {
            width: 100%;
            height: 70px;
        }

        .form-container {
            max-width: 580px;
            margin: 50px auto;
            background: #f8efef;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input,
        select,
        button,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: rgb(188, 230, 51);
            color: white;
            width: 50%;
            font-weight: bold;
            cursor: pointer;
            border: none;
            display: block;
            margin: auto;
            margin-top: 15px;
        }

        button:hover {
            background-color: rgb(209, 184, 58);
        }

        .rad {
            display: flex;
        }

        .rad input {
            margin-top: 16px;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1 style="text-align:center;color:rgb(255, 127, 72)">Prathiksha's</h1>
        <h2 style="text-align:center;color:rgb(243, 144, 102)">Pet Registration Form</h2>
        <form id="pet-registration-form">
            <label for="ownerName">Owner's Name:</label>
            <input type="text" id="ownerName" name="ownerName" required>

            <label for="petName">Pet's Name:</label>
            <input type="text" id="petName" name="petName" required>

            <label for="petType">Pet Type:</label>
            <select id="petType" name="petType" required>
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
                <option value="Bird">Bird</option>
                <option value="Other">Other</option>
            </select>

            <label for="age">Pet's Age:</label>
            <input type="number" id="age" name="age" min="0" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="1234567890" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <label>Have you owned a pet before?</label>
            <div class="rad">
                <label for="ownedYes">Yes</label>
                <input type="radio" id="ownedYes" name="ownedBefore" value="Yes" required>
            </div>
            <div class="rad">
                <label for="ownedNo">No</label>
                <input type="radio" id="ownedNo" name="ownedBefore" value="No" required>
            </div>

            <label for="petColor">Pet's Color:</label>
            <input type="color" id="petColor" name="petColor">

            <label for="petDOB">Pet's Date of Birth:</label>
            <input type="date" id="petDOB" name="petDOB">

            <button type="submit">Register</button>
        </form>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Registration Details</h2>
            <p id="modal-details"></p>
        </div>
    </div>

    <script>
        document.getElementById('pet-registration-form').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            const ownerName = document.getElementById('ownerName').value;
            const petName = document.getElementById('petName').value;
            const petType = document.getElementById('petType').value;
            const age = document.getElementById('age').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const address = document.getElementById('address').value;
            const ownedBefore = document.querySelector('input[name="ownedBefore"]:checked').value;
            const petColor = document.getElementById('petColor').value;
            const petDOB = document.getElementById('petDOB').value;

            // Display modal with details
            const modal = document.getElementById('modal');
            const modalDetails = document.getElementById('modal-details');

            modalDetails.innerHTML = `
                <strong>Owner's Name:</strong> ${ownerName}<br>
                <strong>Pet's Name:</strong> ${petName}<br>
                <strong>Pet Type:</strong> ${petType}<br>
                <strong>Pet's Age:</strong> ${age}<br>
                <strong>Email:</strong> ${email}<br>
                <strong>Phone:</strong> ${phone}<br>
                <strong>Address:</strong> ${address}<br>
                <strong>Owned Before:</strong> ${ownedBefore}<br>
                <strong>Pet's Color:</strong> <span style="color:${petColor}">${petColor}</span><br>
                <strong>Pet's DOB:</strong> ${petDOB}<br>
            `;

            modal.style.display = 'block';
        });

        document.querySelector('.close').onclick = function () {
            document.getElementById('modal').style.display = 'none';
        };
    </script>
</body>

</html>
