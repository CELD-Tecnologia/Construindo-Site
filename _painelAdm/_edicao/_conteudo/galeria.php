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
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">	 			
            <div class="form-group">								
                <label class="control-label" for="exampleInputEmail1">&nbsp;Galeria:</label>	

                <div class="item active">
                    <?php foreach($imagensSite AS $imagem): ?>
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $imagem['imagem'] ) . '" />'; ?>

                        <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-galeria.php?cd_imagem=<?php echo $imagem['cd_imagem']; ?>&etapa=2">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                                <input class="form-control" id="imagem_titulo"	name="imagem_titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $imagem['imagem_titulo']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                                <textarea class="form-control" id="imagem_descricao" name="imagem_descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagem['imagem_descricao']; ?></textarea>
                            </div>
                                <button type="submit" class="btn btn-default">Editar</button>
                                <a href="_conteudo/_php/atualizar-galeria.php?cd_imagem=<?php echo $imagem['cd_imagem']; ?>&etapa=3" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Excluir </a>
                        </form>
                    <?php endforeach; ?>
                </div>							
            </div>

            <div class="form-group">
                <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-galeria.php?etapa=1">
                    <div class="form-group">
                        <h5>Inserir nova imagem</h5>
                        <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                                <input class="form-control" id="imagem_titulo"	name="imagem_titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $imagem['imagem_titulo']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                                <textarea class="form-control" id="imagem_descricao" name="imagem_descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagem['imagem_descricao']; ?></textarea>
                            </div>
                        <label class="control-label" for="exampleInputEmail1">&nbsp;Novo Galeria:</label>				
                        <input type="file" accept="image/*" name="imagem" class="form-control" id="inputPerfil"/>								
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Inserir</button>
                </form>
            </div>
        </div>
    </div>
</div>