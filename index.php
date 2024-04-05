<!DOCTYPE html>
<html>
<head>
    <title>Prototype </title>
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
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box1">
        <h2>Master Tag </h2>
        <form action="process.php" method="POST">
            <label for="masterTag">Master Tag:</label>
            <input type="text" id="masterTag" name="masterTag">
            <input type="submit" value="Submit">
        </form>
        </div>
      <div class="box2">

      <h2>Sub Tag</h2>
        <form action="process.php" method="POST" class="form">
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

    </div>
</body>
</html>
