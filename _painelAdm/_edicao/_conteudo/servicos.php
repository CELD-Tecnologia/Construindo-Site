<?php
    session_start();
    $_SESSION['setor'] = 3;
    include("_php/buscar-site.php");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Início</a>
    </li>
    <li class="breadcrumb-item active">Serviço</li>
</ol>
<div class="row">
    <div class="col-md-6">			

            <form enctype="multipart/form-data" role="form" method="post" action="_php/atualizarPrincipal.php?idImagem=<?php echo $row['idImagem']; ?>">		
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Título:</label>
                    <textarea class="form-control" id="servicoTitulo" name="servicoTitulo" placeholder="Digite o título desejado" rows="4" cols="50"><?php echo $site['servicoTitulo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Subtítulo:</label>
                    <textarea class="form-control" id="servicoSubtitulo" name="servicoSubtitulo" placeholder="Digite o subtitulo" rows="4" cols="50"><?php echo $site['servicoSubtitulo']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Alterar - falta JS e alterar descricao foto principal</button>
            </form>	
            
    </div>
</div>