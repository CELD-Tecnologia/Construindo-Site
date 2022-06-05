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

            <p>
                <?php foreach($servicos as $servico): ?>
                    <a href="#item<?php echo $servico; ?>">item <?php echo $servico; ?></a>
                <?php endforeach; ?>
            <a href="#default">clear</a>
            </p>

            <div class="items">
                <?php foreach($servicos as $servico): ?>
                    <p id="item<?php echo $servico; ?>">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $imagensSite[$servico - 1]['imagem'] ) . '" />'; ?>

                        <input id="idSetorImagem<?php echo $servico; ?>" name="idSetorImagem<?php echo $servico; ?>" type="hidden" value="<?php echo $imagensSite[$servico - 1]['idSetorImagem']; ?>">

                        <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                        <input class="form-control" id="tituloImagem<?php echo $servico; ?>"	name="tituloImagem<?php echo $servico; ?>" placeholder="Digite o título desejado" type="text" value="<?php echo $imagensSite[$servico - 1]['tituloImagem']; ?>">

                        <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                        <textarea class="form-control" id="dsImagem<?php echo $servico; ?>" name="dsImagem<?php echo $servico; ?>" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagensSite[$servico - 1]['dsImagem']; ?></textarea>

                        <label class="control-label" for="exampleInputEmail1">&nbsp;Alterar imagem:</label>				
                        <input type="file" accept="image/*" name="imagem<?php echo $servico; ?>" class="form-control" id="inputPerfil"/>	

                        <label class="control-label" for="exampleInputEmail1">servicoFoto0<?php echo $servico; ?>Titulo:</label>
                        <textarea class="form-control" id="servicoFoto0<?php echo $servico; ?>Titulo" name="servicoFoto0<?php echo $servico; ?>Titulo" placeholder="Digite o título desejado" rows="4" cols="50"><?php echo $site['servicoFoto0'.$servico.'Titulo']; ?></textarea>

                        <label class="control-label" for="exampleInputEmail1">Subtítulo:</label>
                        <textarea class="form-control" id="servicoFoto0<?php echo $servico; ?>Descricao" name="servicoFoto0<?php echo $servico; ?>Descricao" placeholder="Digite o subtitulo" rows="4" cols="50"><?php echo $site['servicoFoto0'.$servico.'Descricao']; ?></textarea>
                    </p>
                <?php endforeach; ?>
                <p id="default"></p><!-- by default, show no text -->
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Salvar alterações</button>
        </form>	
    </div>
</div>