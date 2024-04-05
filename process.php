<?php
include 'db.php';

// Process Master Tag Form
if (isset($_POST['masterTag']) && !empty($_POST['masterTag'])) {
    $masterTag = $_POST['masterTag'];

    $stmt = $conn->prepare("INSERT INTO master_tags (masterTag) VALUES (?)");
    $stmt->bind_param("s", $masterTag);

    if ($stmt->execute()) {
        echo "Master tag inserted successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Process Additional Inputs Form
if (isset($_POST['parentTagId'], $_POST['parentTagNameValue'], $_POST['tagName'])) {
    $parentTagId = $_POST['parentTagId'];
    $parentTagName = $_POST['parentTagNameValue']; // Retrieve the parent tag name
    $tagName = $_POST['tagName'];
    $addedBy = $_POST['addedBy'];
    $updatedBy = $_POST['updatedBy'];
    $status = ($_POST['status'] == 'true') ? 1 : 0;
    $updatedTime = $_POST['updatedTime'];

    $stmt = $conn->prepare("INSERT INTO tags (parentTagId, parentTagName, tagName, addedBy, updatedBy, status, updatedTime) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssis", $parentTagId, $parentTagName, $tagName, $addedBy, $updatedBy, $status, $updatedTime);

    if ($stmt->execute()) {
        echo "Additional details inserted successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

$conn->close();
?>
