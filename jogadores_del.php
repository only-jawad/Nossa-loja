<?php 
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    require_once __DIR__.'/Connection.php';
    // require_once("Connection.php");

    $conn = Connection::getConnection();

    $sql = "DELETE FROM jogadores WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header("location: cadastrar.php");

} else {
    echo "ID não informado";
    echo "<br>";
    echo "<a href='cadastrar.php'>Voltar</a>";
}

?>  