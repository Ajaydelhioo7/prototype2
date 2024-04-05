<!DOCTYPE html>
<html>
<head>
    <title>Prototype Input</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 10px;
            width:600px;
            height:600px;
            margin:auto;
        }
        .container {
            width: 70%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        form {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="time"], select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #fcba03;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
    </style>
    <script>
        function updateParentTagDetails() {
            var parentTagSelector = document.getElementById("parentTagName");
            var selectedOption = parentTagSelector.options[parentTagSelector.selectedIndex];
            // Update the hidden parentTagId input field with the selected option's value (the ID)
            document.getElementById("parentTagId").value = selectedOption.value;
            // Also, update the hidden parentTagName input field with the selected option's text
            document.getElementById("parentTagNameValue").value = selectedOption.text;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Master Tag </h2>
        <form action="process.php" method="POST">
            <label for="masterTag">Master Tag:</label>
            <input type="text" id="masterTag" name="masterTag">
            <input type="submit" value="Submit">
        </form>

        <h2>Sub Tag</h2>
        <form action="process.php" method="POST">
            <label for="parentTagName">Parent Tag Name:</label>
            <select id="parentTagName" name="parentTagName" onchange="updateParentTagDetails()">
                <option value="">Select a tag</option>
                <?php
                include 'db.php';
                $query = "SELECT id, masterTag FROM master_tags ORDER BY masterTag";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["id"]."'>".$row["masterTag"]."</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
            <!-- Hidden input field to hold the parent tag ID -->
            <input type="hidden" id="parentTagId" name="parentTagId">
            <!-- Hidden input field to hold the parent tag NAME -->
            <input type="hidden" id="parentTagNameValue" name="parentTagNameValue">

            <label for="tagName">Tag Name:</label>
            <input type="text" id="tagName" name="tagName">

            <label for="addedBy">Added By:</label>
            <input type="text" id="addedBy" name="addedBy">

            <label for="updatedBy">Updated By:</label>
            <input type="text" id="updatedBy" name="updatedBy">

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="true">True</option>
                <option value="false">False</option>
            </select>

            <label for="updatedTime">Updated Time:</label>
            <input type="time" id="updatedTime" name="updatedTime">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
