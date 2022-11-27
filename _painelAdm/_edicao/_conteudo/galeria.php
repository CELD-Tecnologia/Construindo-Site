<?php
    if(!isset($_SESSION)) { session_start(); }
    $_SESSION['setor'] = 5;
    include("_php/buscar-site.php");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Início</a>
    </li>
    <li class="breadcrumb-item active">Galeria</li>
</ol>

<div class="section" id="galeria">
    <div class="container">
        <div class="row">

            <div class="col-md-12 text-center">

                <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-galeria.php?cd_imagem=<?php echo $foto['cd_imagem']; ?>&etapa=2">
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                        <input class="form-control" id="galeriaTitulo"	name="galeriaTitulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['site_galeria_titulo']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">Sub Título:</label>
                        <textarea class="form-control" id="galeriaSubtitulo" name="galeriaSubtitulo" placeholder="Digite o subtítulo desejado" rows="4" cols="50"><?php echo $site['site_galeria_subtitulo']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Editar</button>
                </form>
                <hr>
            </div>

            <h3>Imagens da galeria:</h3>

            <?php $i = 3; ?>
            <?php
                foreach ($imagensSite as $foto):
            ?>

                <?php if ($i == 3) {?>
                    <div class="row">
                <?php } ?>

                        <div class="col-md-4">
                            <img width=100% class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:' . $foto['imagem_formato'] . ';base64,' . base64_encode( $foto['imagem'] ) . '"'; ?>>

                            <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-galeria.php?cd_imagem=<?php echo $foto['cd_imagem']; ?>&etapa=2">
                                <div class="form-group">
                                    <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                                    <input class="form-control" id="imagem_titulo"	name="imagem_titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $foto['imagem_titulo']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                                    <textarea class="form-control" id="imagem_descricao" name="imagem_descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $foto['imagem_descricao']; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Editar</button>
                                <a href="_conteudo/_php/atualizar-galeria.php?cd_imagem=<?php echo $foto['cd_imagem']; ?>&etapa=3" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Excluir </a>
                            </form>

                            <hr>
                        </div>

                <?php $i--; ?>
                <?php if ($i == 0) {?>
                    </div>
                <?php $i=3; }  ?>

            <?php
                endforeach;
            ?>
        </div>

    </div>
</div>
</div>

<div class="section" id="galeria">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="form-group">
                    <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-galeria.php?etapa=1">
                        <div class="form-group">
                            <h5>Inserir nova imagem na galeria</h5>
                            <div class="form-group">
                                    <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                                    <input class="form-control" id="imagem_titulo"	name="imagem_titulo" placeholder="Digite o título desejado" type="text" >
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                                    <textarea class="form-control" id="imagem_descricao" name="imagem_descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"></textarea>
                                </div>
                            <label class="control-label" for="exampleInputEmail1">&nbsp;Nova imagem:</label>
                            <input type="file" accept="image/*" name="imagem" class="form-control" id="inputPerfil"/>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Inserir</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>