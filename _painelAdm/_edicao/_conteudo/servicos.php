<?php
    if(!isset($_SESSION)) { session_start(); }
    $_SESSION['setor'] = 3;
    include("_php/buscar-site.php");
    $servicos = [1, 2, 3]; //Aqui podemos descidir quantos serviços terá no site. Hoje o BD só aceita 3
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Início</a>
    </li>
    <li class="breadcrumb-item active">Serviço</li>
</ol>
<div class="row">
    <div class="col-md-6">			
        <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-servicos.php">		
            <div class="form-group">
                <label class="control-label" for="exampleInputEmail1">Título:</label>
                <textarea class="form-control" id="servicoTitulo" name="servicoTitulo" placeholder="Digite o título desejado" rows="4" cols="50"><?php echo $site['servicoTitulo']; ?></textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="exampleInputEmail1">Subtítulo:</label>
                <textarea class="form-control" id="servicoSubtitulo" name="servicoSubtitulo" placeholder="Digite o subtitulo" rows="4" cols="50"><?php echo $site['servicoSubtitulo']; ?></textarea>
            </div>
            <?php foreach($servicos as $servico): ?>

                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $imagensSite[$servico - 1]['imagem'] ) . '" />'; ?>

                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">servicoFoto0<?php echo $servico; ?>Titulo:</label>
                    <textarea class="form-control" id="servicoFoto0<?php echo $servico; ?>Titulo" name="servicoFoto0<?php echo $servico; ?>Titulo" placeholder="Digite o título desejado" rows="4" cols="50"><?php echo $site['servicoFoto0'.$servico.'Titulo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Subtítulo:</label>
                    <textarea class="form-control" id="servicoFoto0<?php echo $servico; ?>Descricao" name="servicoFoto0<?php echo $servico; ?>Descricao" placeholder="Digite o subtitulo" rows="4" cols="50"><?php echo $site['servicoFoto0'.$servico.'Descricao']; ?></textarea>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary btn-lg">Alterar - apenas texto</button>
        </form>	
    </div>
</div>