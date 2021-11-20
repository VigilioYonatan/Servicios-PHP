<?php
require_once 'config.php';
 if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT ruc_cliente FROM clientes WHERE ruc_cliente LIKE :country ORDER BY ruc_cliente ASC LIMIT 0,3';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['country' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['ruc_cliente'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Encontrado</p>';
    }
  }
?>