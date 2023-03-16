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

            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $imagensSite['imagem'] ) . '"';?> >
                            <input type="file" accept="image/*" name="imagem" class="form-control" id="inputPerfil" />
                            <hr>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;Título da Imagem:</label>
                                <input class="form-control" id="imagem_titulo"	name="imagem_titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $imagensSite['imagem_titulo']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Descrição da Imagem:</label>
                                <textarea class="form-control" id="imagem_descricao" name="imagem_descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagensSite['imagem_descricao']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                                <input class="form-control" id="quemsomosTitulo"	name="quemsomosTitulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['site_quem_somos_titulo']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Subtítulo:</label>
                                <input class="form-control" id="quemsomosSubtitulo"	name="quemsomosSubtitulo" placeholder="Digite o subtítulo desejado" type="text" value="<?php echo $site['site_quem_somos_subtitulo']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Possui vídeo?:</label>
                                <input class="form-control" id="icVideo" name="icVideo" type="checkbox" <?php echo $site['site_possui_video'] == '1' ? 'checked' : ''; ?> value="1">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Caminho do vídeo:</label>
                                <input class="form-control" id="video"	name="video" placeholder="Digite o caminho do vídeo" type="text" value="<?php echo $site['site_video']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Título do texto lateral da imagem:</label>
                                <input class="form-control" id="quemsomosFoto01Titulo"	name="quemsomosFoto01Titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['site_quem_somos_foto_titulo_01']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Texto lateral da imagem:</label>
                                <textarea class="form-control" id="quemsomosFoto01Subtitulo" name="quemsomosFoto01Subtitulo" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $site['site_quem_somos_foto_subtitulo_01']; ?></textarea>
                            </div>
                            <button id="btnAlterar" class="btn btn-primary btn-lg">Salvar alterações</button>
                            <div class="result"></div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>