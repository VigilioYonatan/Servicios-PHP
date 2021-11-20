
<?php
require_once 'config.php';
 if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT nombre_ingresos FROM ingresos WHERE nombre_ingresos LIKE :country ORDER BY nombre_ingresos  ASC LIMIT 0,2';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['country' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['nombre_ingresos'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Encontrado</p>';
    }
  }
?>