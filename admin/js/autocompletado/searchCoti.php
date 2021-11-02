
<?php
require_once 'config.php';
 if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT cot_cliente FROM cotizacion WHERE cot_cliente LIKE :country';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['country' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['cot_cliente'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>