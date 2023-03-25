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

<form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-servicos.php">
    <div class="col-md-12">
        <div class="row">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Título:</label>
                                <textarea class="form-control" id="servicoTitulo" name="servicoTitulo" placeholder="Digite o título desejado" rows="4" cols="50"><?php echo $site['site_servico_titulo']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Subtítulo:</label>
                                <textarea class="form-control" id="servicoSubtitulo" name="servicoSubtitulo" placeholder="Digite o subtitulo" rows="4" cols="50"><?php echo $site['site_servico_subtitulo']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <?php echo '<img width=100% src="data:image/jpeg;base64,' . base64_encode( $imagensSite[0]['imagem'] ) . '" />'; ?>

                            <input id="cd_imagem_setor1" name="cd_imagem_setor1" type="hidden" value="3">

                            <br>

                            <label class="control-label" for="exampleInputEmail1">Título:</label>
                            <input class="form-control" id="imagem_titulo1"	name="imagem_titulo1" placeholder="Digite o título desejado" type="text" value="<?php echo $imagensSite[0]['imagem_titulo']; ?>">

                            <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                            <textarea class="form-control" id="imagem_descricao1" name="imagem_descricao1" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagensSite[0]['imagem_descricao']; ?></textarea>

                            <label class="control-label" for="exampleInputEmail1">Alterar imagem:</label>
                            <input type="file" accept="image/*" name="imagem1" class="form-control" id="inputPerfil"/>

                            <label class="control-label" for="exampleInputEmail1">Título abaixo da imagem:</label>
                            <input class="form-control" id="servicoFoto01Titulo"	name="servicoFoto01Titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['site_servico_foto_titulo_01']; ?>">

                            <label class="control-label" for="exampleInputEmail1">Descrição abaixo da imagem:</label>
                            <textarea class="form-control" id="servicoFoto01Descricao" name="servicoFoto01Descricao" placeholder="Digite o subtitulo" rows="4" cols="50"><?php echo $site['site_servico_foto_descricao_01']; ?></textarea>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="col-md-12">
        <div class="row">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo '<img width=100% src="data:image/jpeg;base64,' . base64_encode( $imagensSite[1]['imagem'] ) . '" />'; ?>

                            <input id="cd_imagem_setor2" name="cd_imagem_setor2" type="hidden" value="4">

                            <br>

                            <label class="control-label" for="exampleInputEmail1">Título:</label>
                            <input class="form-control" id="imagem_titulo2"	name="imagem_titulo2" placeholder="Digite o título desejado" type="text" value="<?php echo $imagensSite[1]['imagem_titulo']; ?>">

                            <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                            <textarea class="form-control" id="imagem_descricao2" name="imagem_descricao2" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagensSite[1]['imagem_descricao']; ?></textarea>

                            <label class="control-label" for="exampleInputEmail1">Alterar imagem:</label>
                            <input type="file" accept="image/*" name="imagem2" class="form-control" id="inputPerfil"/>

                            <label class="control-label" for="exampleInputEmail1">Título abaixo da imagem:</label>
                            <input class="form-control" id="servicoFoto02Titulo"	name="servicoFoto02Titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['site_servico_foto_titulo_02']; ?>">

                            <label class="control-label" for="exampleInputEmail1">Descrição abaixo da imagem:</label>
                            <textarea class="form-control" id="servicoFoto02Descricao" name="servicoFoto02Descricao" placeholder="Digite o subtitulo" rows="4" cols="50"><?php echo $site['site_servico_foto_descricao_02']; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <?php echo '<img width=100% src="data:image/jpeg;base64,' . base64_encode( $imagensSite[2]['imagem'] ) . '" />'; ?>

                            <input id="cd_imagem_setor3" name="cd_imagem_setor3" type="hidden" value="5">

                            <br>

                            <label class="control-label" for="exampleInputEmail1">Título:</label>
                            <input class="form-control" id="imagem_titulo3"	name="imagem_titulo3" placeholder="Digite o título desejado" type="text" value="<?php echo $imagensSite[2]['imagem_titulo']; ?>">

                            <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                            <textarea class="form-control" id="imagem_descricao3" name="imagem_descricao3" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $imagensSite[2]['imagem_descricao']; ?></textarea>

                            <label class="control-label" for="exampleInputEmail1">Alterar imagem:</label>
                            <input type="file" accept="image/*" name="imagem3" class="form-control" id="inputPerfil"/>

                            <label class="control-label" for="exampleInputEmail1">Título abaixo da imagem:</label>
                            <input class="form-control" id="servicoFoto03Titulo"	name="servicoFoto03Titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['site_servico_foto_titulo_03']; ?>">

                            <label class="control-label" for="exampleInputEmail1">Descrição abaixo da imagem:</label>
                            <textarea class="form-control" id="servicoFoto03Descricao" name="servicoFoto03Descricao" placeholder="Digite o subtitulo" rows="4" cols="50"><?php echo $site['site_servico_foto_descricao_03']; ?></textarea>

                            <br>
                            <button type="submit" class="btn btn-primary btn-lg">Salvar alterações</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>