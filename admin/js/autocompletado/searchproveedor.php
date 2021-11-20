<?php
require_once 'config.php';
 if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT razon_proovedor  FROM proveedores WHERE razon_proovedor  LIKE :country ORDER BY razon_proovedor  ASC LIMIT 0,3';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['country' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['razon_proovedor'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>