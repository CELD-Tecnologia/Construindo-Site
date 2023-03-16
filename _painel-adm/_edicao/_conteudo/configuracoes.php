<?php
    if(!isset($_SESSION)) { session_start(); }
    $_SESSION['setor'] = 6;
    include("_php/buscar-site.php");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Início</a>
    </li>
    <li class="breadcrumb-item active">Dados do Site</li>
</ol>

<div class="col-md-12">
    <div class="row">
        <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-configuracoes.php" >

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
                                <label class="control-label" for="exampleInputPassword1">Alterar Template:</label>
                                <select class="form-control" name="cdCSS" id="cdCSS">
                                    <option value="<?php echo $site['cd_site_css'] ?>"><?php echo $site['cd_site_css'] ?></option>
                                    <option value="1">CSS01</option>
                                    <option value="2">CSS02</option>
                                    <option value="3">CSS03</option>
                                    <option value="4">CSS04</option>
                                    <option value="5">CSS05</option>
                                    <option value="6">CSS06</option>
                                    <option value="7">CSS07</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;Título do Site:</label>
                                <input class="form-control block" id="titulo"	name="titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['site_titulo']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Descrição do Site:</label>
                                <textarea class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $site['site_descricao']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Palavras-Chaves:</label>
                                <textarea class="form-control" id="keyword" name="keyword" placeholder="Digite as palavras chave do site" rows="4" cols="50"><?php echo $site['site_keyword']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Separar palavras-chaves por vírgula</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar alterações</button>
                            <div class="result"></div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>