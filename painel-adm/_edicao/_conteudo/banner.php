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
<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div id="home" class="carousel-inner">

                    <?php
                        $active = "active";
                        foreach ($imagensSite as $banner):
                    ?>
                        <div class="item <?php echo $active ?>">
                            <?php echo '<img width=100% src="data:' . $banner['imagem_formato'] . ';base64,' . base64_encode( $banner['imagem'] ) . '" />'; ?>

                            <form role="form" method="post" action="_conteudo/_php/atualizar-banner.php?etapa=2&cd_imagem=<?php echo $banner['cd_imagem']; ?>">
                                <div class="form-group">
                                    <label class="control-label" for="exampleInputEmail1">&nbsp;Título da Imagem:</label>
                                    <input class="form-control" id="imagem_titulo"	name="imagem_titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $banner['imagem_titulo']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="exampleInputEmail1">Descrição da Imagem:</label>
                                    <textarea class="form-control" id="imagem_descricao" name="imagem_descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $banner['imagem_descricao']; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Atualizar</button>
                                <a href="_conteudo/_php/atualizar-banner.php?etapa=3&cd_imagem=<?php echo $banner['cd_imagem']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Excluir banner</a>
                            </form>

                        </div>

                        <hr>

                    <?php
                        $active = "";
                        endforeach;
                    ?>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">


            <h2>Inserir novo banner</h2>
            <div class="form-group" style="width: 900px">
                <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-banner.php?etapa=1">
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">&nbsp;Título:</label>
                        <input class="form-control" id="imagem_titulo"	name="imagem_titulo" placeholder="Digite o título desejado" type="text" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                        <textarea class="form-control" id="imagem_descricao" name="imagem_descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">&nbsp;Escolher novo banner:</label>
                        <input type="file" accept="image/*" name="imagem" class="form-control" id="inputPerfil"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Cadastrar banner</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>