<?php

    if(!isset($_SESSION)) { session_start(); }
    $_SESSION['setor'] = 4;
    include("_php/buscar-site.php");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Início</a>
    </li>
    <li class="breadcrumb-item active">Quem Somos</li>
</ol>
<div class="col-md-12">
    <div class="row">
        <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizarQuemSomos.php" >
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group">								
                        <label class="control-label" for="exampleInputEmail1">&nbsp;Quem Somos:</label>	
                        <div class="item active">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $imagensSite['imagem'] ) . '" />'; ?>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;Título da Imagem:</label>
                                <input class="form-control" id="tituloImagem"	name="tituloImagem" placeholder="Digite o título desejado" type="text" value="<?php echo $imagensSite['tituloImagem']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Descrição da Imagem:</label>
                                <textarea class="form-control" id="dsImagem" name="dsImagem" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagensSite['dsImagem']; ?></textarea>
                            </div>
                        </div>	
                        <input type="file" accept="image/*" name="imagem" class="form-control" id="inputPerfil"/>								
                    </div>
                </div>	
            </div>
            <div class="col-md-6">	
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                    <input class="form-control" id="principalTitulo"	name="principalTitulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['quemsomosTitulo']; ?>">
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Sub Título:</label>
                    <textarea class="form-control" id="principalSubtitulo" name="principalSubtitulo" placeholder="Digite o subtítulo desejado" rows="4" cols="50"><?php echo $site['quemsomosSubtitulo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                    <textarea class="form-control" id="principalDescricao" name="principalDescricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $site['video']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Sub Título:</label>
                    <textarea class="form-control" id="principalSubtitulo" name="principalSubtitulo" placeholder="Digite o subtítulo desejado" rows="4" cols="50"><?php echo $site['quemsomosFoto01Titulo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                    <textarea class="form-control" id="principalDescricao" name="principalDescricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $site['quemsomosFoto01Subtitulo']; ?></textarea>
                </div>
                icVideo
                <button id="btnAlterar" class="btn btn-primary btn-lg">Alterar - Inseri AJAX e ajustar o Back</button>
                <label id="retorno">Dados salvos com sucesso</label>
            </div>
        </form>						
    </div>
</div>