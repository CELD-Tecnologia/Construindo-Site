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
        <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-quem-somos.php" >
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group">								
                        <label class="control-label" for="exampleInputEmail1">&nbsp;Imagem:</label>	
                        <div class="item active">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $imagensSite['imagem'] ) . '" />'; ?>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;Título da Imagem:</label>
                                <input class="form-control" id="imagem_titulo"	name="imagem_titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $imagensSite['imagem_titulo']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Descrição da Imagem:</label>
                                <textarea class="form-control" id="imagem_descricao" name="imagem_descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagensSite['imagem_descricao']; ?></textarea>
                            </div>
                        </div>	
                        Alterar Imagem
                        <input type="file" accept="image/*" name="imagem" class="form-control" id="inputPerfil"/>								
                    </div>
                </div>	
            </div>
            <div class="col-md-6">	
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">&nbsp;quemsomosTitulo:</label>
                    <input class="form-control" id="quemsomosTitulo"	name="quemsomosTitulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['quemsomosTitulo']; ?>">
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">quemsomosSubtitulo:</label>
                    <textarea class="form-control" id="quemsomosSubtitulo" name="quemsomosSubtitulo" placeholder="Digite o subtítulo desejado" rows="4" cols="50"><?php echo $site['quemsomosSubtitulo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">video:</label>
                    <textarea class="form-control" id="video" name="video" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $site['video']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">quemsomosFoto01Titulo:</label>
                    <textarea class="form-control" id="quemsomosFoto01Titulo" name="quemsomosFoto01Titulo" placeholder="Digite o subtítulo desejado" rows="4" cols="50"><?php echo $site['quemsomosFoto01Titulo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">quemsomosFoto01Subtitulo:</label>
                    <textarea class="form-control" id="quemsomosFoto01Subtitulo" name="quemsomosFoto01Subtitulo" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $site['quemsomosFoto01Subtitulo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">icVideo:</label>
                    <input class="form-control" id="icVideo" name="icVideo" type="checkbox" <?php echo $site['icVideo'] == 1 ? 'checked' : ''; ?> value="1">
                </div>
                
                <button id="btnAlterar" class="btn btn-primary btn-lg">Salvar alterações</button>
                <label id="retorno">Dados salvos com sucesso</label>
            </div>
        </form>						
    </div>
</div>