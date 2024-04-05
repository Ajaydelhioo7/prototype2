<!DOCTYPE html>
<html>
<head>
    <title>Prototype Input</title>
    <script>
        function updateParentTagDetails() {
            var parentTagSelector = document.getElementById("parentTagNameSelect");
            var selectedOption = parentTagSelector.options[parentTagSelector.selectedIndex];
            document.getElementById("parentTagId").value = selectedOption.value; // The value is the tag ID
            document.getElementById("parentTagName").value = selectedOption.text; // The text is the tag name
        }
    </script>
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Master Tag Form</h2>
        <form action="process.php" method="POST">
            <label for="masterTag">Master Tag:</label>
            <input type="text" id="masterTag" name="masterTag">
            <input type="submit" value="Submit">
        </form>

        <h2>Additional Tag Details</h2>
        <form action="process.php" method="POST">
            <label for="parentTagName">Parent Tag Name:</label>
            <select id="parentTagNameSelect" name="parentTagNameSelect" onchange="updateParentTagDetails()">
                <option value="">Select a tag</option>
                <?php
                include 'db.php';
                $query = "SELECT id, masterTag FROM master_tags UNION SELECT id, tagName AS masterTag FROM tags ORDER BY masterTag";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["id"]."'>".$row["masterTag"]."</option>";
                    }
                } else {
                    echo "<option value=''>No tags found</option>";
                }
                $conn->close();
                ?>
            </select>
            <input type="hidden" id="parentTagId" name="parentTagId">
            <input type="hidden" id="parentTagName" name="parentTagName">

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
