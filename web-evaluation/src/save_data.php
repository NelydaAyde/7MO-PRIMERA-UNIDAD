<?php
function saveEvaluationData($conn, $url, $data) {
    $stmt = $conn->prepare("INSERT INTO evaluations (url, load_time, word_count, image_count, link_count, script_count) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdiidd", $url, $data['load_time'], $data['word_count'], $data['image_count'], $data['link_count'], $data['script_count']);
    $stmt->execute();
    $stmt->close();
}
?>
