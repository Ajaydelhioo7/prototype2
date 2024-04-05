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
</head>
<body>
    
    <!-- Form for Master Tag -->
    <form action="process.php" method="POST">
        <label for="masterTag">Master Tag:</label>
        <input type="text" id="masterTag" name="masterTag">
        <input type="submit" value="Submit">
    </form>

    <!-- Additional Inputs -->
    <div class="subtag">
        <form action="process.php" method="POST">
        <label for="masterTag">Sub Tag:</label>
            <input type="text" id="parentTagName" name="parentTagName" placeholder="Parent Tag Name"><br>
            <input type="text" id="tagName" name="tagName" placeholder="Tag Name"><br>
            <input type="text" id="addedBy" name="addedBy" placeholder="Added By"><br>
            <input type="number" id="parentTagId" name="parentTagId" placeholder="Parent Tag ID"><br>
            <input type="text" id="updatedBy" name="updatedBy" placeholder="Updated By"><br>
            <select id="status" name="status">
                <option value="true">True</option>
                <option value="false">False</option>
            </select><br>
            <input type="time" id="updatedTime" name="updatedTime"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
