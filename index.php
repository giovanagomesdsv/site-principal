<?php
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>BIBLIÓFILOS Community</title>
</head>

<body>
    <!--Primeira tela___________________________________________________________________-->
    <section>
        <nav>
            <a href="#">Home</a>
            <a href="resenhas/resenhas.php">Resenhas</a>
            <a href="autores/autores.php">Autores</a>
            <a href="livros/livros.php">Livros</a>
            <a href="sobre/sobre.php">Sobre</a>
        </nav>

        <div class="change-text">
            <h3>
                <span class="word">"Um&nbsp;livro&nbsp;é&nbsp;um&nbsp;sonho&nbsp;que&nbsp;você&nbsp;segura&nbsp;nas&nbsp;mãos."&nbsp;–&nbsp;Neil&nbsp;Gaiman</span>

                <span class="word">"Os&nbsp;livros&nbsp;são&nbsp;os&nbsp;amigos&nbsp;mais&nbsp;silenciosos&nbsp;e&nbsp;constantes;&nbsp;os&nbsp;conselheiros&nbsp;mais&nbsp;acessíveis&nbsp;e&nbsp;sábios&nbsp;e&nbsp;os&nbsp;professores&nbsp;mais&nbsp;pacientes."&nbsp;–&nbsp;Charles&nbsp;W.&nbsp;Eliot</span>

                <span class="word">"Um&nbsp;quarto&nbsp;sem&nbsp;livros&nbsp;é&nbsp;como&nbsp;um&nbsp;corpo&nbsp;sem&nbsp;alma."&nbsp;–&nbsp;Cícero</span>

                <span class="word">"Os&nbsp;livros&nbsp;são&nbsp;uma&nbsp;magia&nbsp;portátil&nbsp;única."&nbsp;–&nbsp;Stephen&nbsp;King</span>

                <span class="word">"A&nbsp;leitura&nbsp;de&nbsp;um&nbsp;bom&nbsp;livro&nbsp;é&nbsp;um&nbsp;diálogo&nbsp;incessante:&nbsp;o&nbsp;livro&nbsp;fala&nbsp;e&nbsp;a&nbsp;alma&nbsp;responde."&nbsp;–&nbsp;André&nbsp;Maurois</span>

                <span class="word">"Sempre&nbsp;imaginei&nbsp;que&nbsp;o&nbsp;paraíso&nbsp;fosse&nbsp;uma&nbsp;espécie&nbsp;de&nbsp;biblioteca."&nbsp;–&nbsp;Jorge&nbsp;Luis&nbsp;Borges</span>

                <span class="word">"A&nbsp;leitura&nbsp;é&nbsp;para&nbsp;a&nbsp;mente&nbsp;o&nbsp;que&nbsp;o&nbsp;exercício&nbsp;é&nbsp;para&nbsp;o&nbsp;corpo."&nbsp;–&nbsp;Joseph&nbsp;Addison</span>

                <span class="word">"A&nbsp;pessoa&nbsp;que&nbsp;lê&nbsp;vive&nbsp;mil&nbsp;vidas&nbsp;antes&nbsp;de&nbsp;morrer.&nbsp;Quem&nbsp;não&nbsp;lê&nbsp;vive&nbsp;apenas&nbsp;uma."&nbsp;–&nbsp;George&nbsp;R.&nbsp;R.&nbsp;Martin</span>

                <span class="word">"Quando&nbsp;penso&nbsp;em&nbsp;todos&nbsp;os&nbsp;livros&nbsp;que&nbsp;ainda&nbsp;quero&nbsp;ler,&nbsp;tenho&nbsp;a&nbsp;certeza&nbsp;de&nbsp;ser&nbsp;feliz."&nbsp;–&nbsp;Jules&nbsp;Renard</span>

                <span class="word">"Os&nbsp;livros&nbsp;são&nbsp;o&nbsp;alimento&nbsp;da&nbsp;juventude&nbsp;e&nbsp;a&nbsp;alegria&nbsp;da&nbsp;velhice."&nbsp;–&nbsp;Marco&nbsp;Túlio&nbsp;Cícero</span>

                <span class="word">"Um&nbsp;livro&nbsp;é&nbsp;uma&nbsp;arma&nbsp;carregada&nbsp;na&nbsp;casa&nbsp;ao&nbsp;lado.&nbsp;Queimar&nbsp;livros&nbsp;é&nbsp;o&nbsp;mesmo&nbsp;que&nbsp;matar&nbsp;a&nbsp;liberdade."&nbsp;–&nbsp;Ray&nbsp;Bradbury,&nbsp;Fahrenheit&nbsp;451</span>

                <span class="word">"Livros&nbsp;nos&nbsp;dão&nbsp;a&nbsp;chance&nbsp;de&nbsp;viver&nbsp;vidas&nbsp;diferentes&nbsp;em&nbsp;cada&nbsp;página."&nbsp;–&nbsp;Anônimo</span>
            </h3>
        </div>
    </section>

    <!--Segunda tela___________________________________________________________________-->
    <section>
        <?php
        $consulta = "SELECT * FROM parceria";

        if ($resultado = mysqli_query($conexao, $consulta)) {
            while ($parceria = mysqli_fetch_array($resultado)) {
                echo "
                  <p>{$parceria['nome']}</p>
                ";
            }
        }
        ?>


    </section>

    <!--Terceira tela___________________________________________________________________-->
    <section>

        <!-- Barra de Pesquisa -->
        <div class="search-container">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Digite o título do artigo..." required>
                <button type="submit">Pesquisar</button>
            </form>
        </div>

        <div class="pesquisa">
            <?php
            // Pesquisa por slug (exibe um artigo específico)
            if (isset($_GET['slug'])) {
                $slug = $_GET['slug'];

                $stmt = $conexao->prepare("SELECT * FROM resenha WHERE slug = ?");
                $stmt->bind_param("s", $slug);
                $stmt->execute();

                $result = $stmt->get_result();
                $artigo = $result->fetch_assoc();

                if ($artigo) {
                    echo "<h1>" . htmlspecialchars($artigo['titulo']) . "</h1>";
                    echo "<p>" . nl2br(htmlspecialchars($artigo['sinopse'])) . "</p>";
                } else {
                    echo "Artigo não encontrado.";
                }

                $stmt->close();
            }
            // Pesquisa por termo (exibe resultados da busca)
            elseif (isset($_POST['search'])) {
                $search = '%' . $_POST['search'] . '%';

                $stmt = $conexao->prepare("SELECT * FROM resenha WHERE titulo LIKE ?");
                $stmt->bind_param("s", $search);
                $stmt->execute();

                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<div class='card-container'>";
                    while ($artigo = $result->fetch_assoc()) {
                        echo "<div class='card'>";
                        echo "<h2><a href='http://localhost/TCC/site-principal/resenha-resultado/resenha.php?id={$artigo['slug']}'>" . htmlspecialchars($artigo['titulo']) . "</a></h2>";
                        echo "<p>" . substr(htmlspecialchars($artigo['sinopse']), 0, 100) . "...</p>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "Nenhum artigo encontrado para a pesquisa.";
                }

                $stmt->close();
            }
            ?>
        </div>

        <!-- Para as resenhas -->
        <main>

            <!-- Clássicos -->
            <!--div container das resenhas-->
            <div class="classicos">
                <?php
                $consulta_classicos = "SELECT * FROM resenha WHERE genero = 'classicos' ORDER BY data_publicacao DESC LIMIT 6";

                if ($resultado_classicos = mysqli_query($conexao,  $consulta_classicos)) {
                    while ($artigo = mysqli_fetch_array($resultado_classicos)) {

                        // div de cada resenha

                        echo "<div>
                           <img src='{$artigo['foto_url']}' alt=''>
                           <h2><a href='http://localhost/TCC/site-principal/resenha-resultado/resenha.php?id={$artigo['slug']}'>" . htmlspecialchars($artigo['titulo']) . "</a></h2>
                        </div>";
                    }
                }


                ?>
            </div>
           

            <!-- Terror -->
            <!--div container das resenhas-->
            <div class="terror">
                <?php
                $consulta_terror = "SELECT * FROM resenha WHERE genero = 'terror' ORDER BY data_publicacao DESC LIMIT 6";

                if ($resultado = mysqli_query($conexao,  $consulta_terror)) {
                    while ($artigo = mysqli_fetch_array($resultado)) {

                        // div de cada resenha

                        echo "<div>";
                        echo "<h2><a href='http://localhost/TCC/site-principal/resenha-resultado/resenha.php?id={$artigo['slug']}'>" . htmlspecialchars($artigo['titulo']) . "</a></h2>";
                        echo "<p>" . substr(htmlspecialchars($artigo['sinopse']), 0, 100) . "...</p>";
                        echo "</div>";
                    }
                }


                ?>
            </div>

            <!-- Suspense e mistério -->
            <!--div container das resenhas-->
            <div class="suspense">
                <?php
                $consulta_suspense = "SELECT * FROM resenha WHERE genero = 'suspense e mistério' ORDER BY data_publicacao DESC LIMIT 6";

                if ($resultado_suspense = mysqli_query($conexao,  $consulta_suspense)) {
                    while ($artigo = mysqli_fetch_array($resultado_suspense)) {

                        // div de cada resenha

                        echo "<div>";
                        echo "<h2><a href='http://localhost/TCC/site-principal/resenha-resultado/resenha.php?id={$artigo['slug']}'>" . htmlspecialchars($artigo['titulo']) . "</a></h2>";
                        echo "<p>" . substr(htmlspecialchars($artigo['sinopse']), 0, 100) . "...</p>";
                        echo "</div>";
                    }
                }


                ?>
            </div>

            <!-- Romance -->
            <!--div container das resenhas-->
            <div class="romance">
                <?php
                $consulta_romance = "SELECT * FROM resenha WHERE genero = 'romance' ORDER BY data_publicacao DESC LIMIT 6";

                if ($resultado_romance = mysqli_query($conexao,  $consulta_romance)) {
                    while ($artigo = mysqli_fetch_array($resultado_romance)) {

                        // div de cada resenha

                        echo "<div>";
                        echo "<h2><a href='http://localhost/TCC/site-principal/resenha-resultado/resenha.php?id={$artigo['slug']}'>" . htmlspecialchars($artigo['titulo']) . "</a></h2>";
                        echo "<p>" . substr(htmlspecialchars($artigo['sinopse']), 0, 100) . "...</p>";
                        echo "</div>";
                    }
                }


                ?>
            </div>

            <!-- Ficção e fantasia -->
            <!--div container das resenhas-->
            <div class="ficcao">
                <?php
                $consulta_ficcao = "SELECT * FROM resenha WHERE genero = 'ficção e fantasia' ORDER BY data_publicacao DESC LIMIT 6";

                if ($resultado_ficcao = mysqli_query($conexao,  $consulta_ficcao)) {
                    while ($artigo = mysqli_fetch_array($resultado_ficcao)) {

                        // div de cada resenha

                        echo "<div>";
                        echo "<h2><a href='http://localhost/TCC/site-principal/resenha-resultado/resenha.php?id={$artigo['slug']}'>" . htmlspecialchars($artigo['titulo']) . "</a></h2>";
                        echo "<p>" . substr(htmlspecialchars($artigo['sinopse']), 0, 100) . "...</p>";
                        echo "</div>";
                    }
                }


                ?>
            </div>

            <!-- Aventura -->
            <!--div container das resenhas-->
            <div class="aventura">
                <?php
                $consulta_aventura = "SELECT * FROM resenha WHERE genero = 'aventura' ORDER BY data_publicacao DESC LIMIT 6";

                if ($resultado_aventura = mysqli_query($conexao,  $consulta_aventura)) {
                    while ($artigo = mysqli_fetch_array($resultado_aventura)) {

                        // div de cada resenha

                        echo "<div>";
                        echo "<h2><a href='http://localhost/TCC/site-principal/resenha-resultado/resenha.php?id={$artigo['slug']}'>" . htmlspecialchars($artigo['titulo']) . "</a></h2>";
                        echo "<p>" . substr(htmlspecialchars($artigo['sinopse']), 0, 100) . "...</p>";
                        echo "</div>";
                    }
                }


                ?>
            </div>

            <!-- Drama -->
            <!--div container das resenhas-->
            <div class="drama">
                <?php
                $consulta_drama = "SELECT * FROM resenha WHERE genero = 'drama' ORDER BY data_publicacao DESC LIMIT 6";

                if ($resultado_drama = mysqli_query($conexao,  $consulta_drama)) {
                    while ($artigo = mysqli_fetch_array($resultado_drama)) {

                        // div de cada resenha

                        echo "<div>";
                        echo "<h2><a href='http://localhost/TCC/site-principal/resenha-resultado/resenha.php?id={$artigo['slug']}'>" . htmlspecialchars($artigo['titulo']) . "</a></h2>";
                        echo "<p>" . substr(htmlspecialchars($artigo['sinopse']), 0, 100) . "...</p>";
                        echo "</div>";
                    }
                }


                ?>
            </div>


        </main>


    </section>


    <script src="script.js"></script>
</body>

</html>