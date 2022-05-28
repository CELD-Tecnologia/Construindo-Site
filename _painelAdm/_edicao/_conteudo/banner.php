<?php
    if(!isset($_SESSION)) { session_start(); }
    $_SESSION['setor'] = 2;
    include("_php/buscar-site.php");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Início</a>
    </li>
    <li class="breadcrumb-item active">Banner</li>
</ol>
<div class="row">
    <div class="col-md-12">
        <div class="form-group" style="width: 900px">								
            <label class="control-label" for="exampleInputEmail1">&nbsp;Banner:</label>	

            <div class="item active">
                <?php foreach($imagensSite AS $imagem): ?>
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $imagem['imagem'] ) . '" />'; ?>

                    <form enctype="multipart/form-data" role="form" method="post" action="_php/editarBanner.php?idImagem=<?php echo $imagem['idImagem']; ?>">
                        <div class="form-group">
                            <label class="control-label" for="exampleInputEmail1">&nbsp;Título da Imagem:</label>
                            <input class="form-control" id="tituloImagem"	name="tituloImagem" placeholder="Digite o título desejado" type="text" value="<?php echo $imagem['tituloImagem']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputEmail1">Descrição da Imagem:</label>
                            <textarea class="form-control" id="dsImagem" name="dsImagem" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagem['dsImagem']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Editar</button>
                        <a href="_php/excluirBanner.php?idImagem=<?php echo $imagem['idImagem']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Excluir </a>
                    </form>
                <?php endforeach; ?>
            </div>							
        </div>

        incluir banner

        excluir banner
        <div class="form-group" style="width: 900px">
            <form enctype="multipart/form-data" role="form" method="post" action="_php/novoBanner.php">
                <div class="form-group">								
                    <label class="control-label" for="exampleInputEmail1">&nbsp;Inserir Novo Banner:</label>				
                    <input type="file" accept="image/*" name="imagem" class="form-control" id="inputPerfil"/>								
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Inserir</button>
                </div>
            </form>
        </div>
    </div>
</div>