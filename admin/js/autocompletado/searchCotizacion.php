<?php
require_once 'config.php';
 if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT cot_codigo FROM cotizacion WHERE cot_codigo LIKE :country2 ORDER BY cot_codigo  ASC LIMIT 0,3';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['country2' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['cot_codigo'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>