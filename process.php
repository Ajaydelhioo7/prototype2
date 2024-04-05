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
if (isset($_POST['parentTagName'])) {
    $parentTagName = $_POST['parentTagName'];
    $tagName = $_POST['tagName'];
    $addedBy = $_POST['addedBy'];
    $parentTagId = $_POST['parentTagId'];
    $updatedBy = $_POST['updatedBy'];
    $status = ($_POST['status'] == 'true') ? 1 : 0;
    $updatedTime = $_POST['updatedTime'];

    $stmt = $conn->prepare("INSERT INTO tags (parentTagName, tagName, addedBy, parentTagId, updatedBy, status, updatedTime) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisis", $parentTagName, $tagName, $addedBy, $parentTagId, $updatedBy, $status, $updatedTime);

    if ($stmt->execute()) {
        echo "Additional details inserted successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

$conn->close();
?>
