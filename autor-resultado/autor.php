
<?php
include "../conexao.php";

$dado = $_GET['id'];

$select = "SELECT escritor.foto_url as esc_foto, nome, biografia FROM escritor WHERE escritor.slug='$dado'";

if ($resultado = mysqli_query($conexao, $select)) {
    while ($autor = mysqli_fetch_array($resultado)) {
        echo "
        <!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>{$autor['nome']}</title>
</head>
<body>

       <h2>{$autor['nome']}</h2>
      <p>CONTEÚDO: {$autor['biografia']}</p>

       <img src='{$autor['esc_foto']}' alt=''>

        ";
    }
}

?>

<?php
$resenhas = "SELECT resenha.foto_url as res_foto, titulo FROM resenha INNER JOIN escritor ON escritor.id_escritor = resenha.id_escritor WHERE escritor.slug='$dado'";

if ($result = mysqli_query($conexao, $resenhas)) {
    while ($box = mysqli_fetch_array($result)) {
        echo "
        <img src='{$box['res_foto']}' alt=''>
        <p>{$box['titulo']}</p>

</body>
</html> 
        ";
    }
}


?>