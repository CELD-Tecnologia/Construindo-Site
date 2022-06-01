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
        <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizar-configuracoes.php">

            <div class="col-md-4">					
                <div class="form-group" style="width: 300px">								
                    <label class="control-label" for="exampleInputEmail1">&nbsp;Favicon (ícone do site)</label>	
                    <div class="item active">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $imagensSite['imagem'] ) . '" />'; ?>
                    </div>			
                    <input type="file" accept="image/*" name="imagem" class="form-control" id="inputPerfil"/>								
                </div>												
            </div>
    
            <div class="col-md-6">	
                <div class="form-group">
                    <label class="control-label" for="exampleInputPassword1">Alterar Template:</label>
                    <select class="form-control" name="cdCSS" id="cdCSS">									
                        <option value="<?php echo $site['cdCSS'] ?>"><?php echo $site['cdCSS'] ?></option>
                        <option value="CSS01">CSS01</option>
                        <option value="CSS02">CSS02</option>
                        <option value="CSS03">CSS03</option>
                        <option value="CSS04">CSS04</option>
                        <option value="CSS05">CSS05</option>
                        <option value="CSS06">CSS06</option>
                        <option value="CSS07">CSS07</option>
                    </select>
                </div>	
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">&nbsp;Título do Site:</label>
                    <input class="form-control block" id="titulo"	name="titulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['titulo']; ?>">
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Descrição do Site:</label>
                    <textarea class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $site['descricao']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Palavras-Chaves:</label>
                    <textarea class="form-control" id="keyword" name="keyword" placeholder="Digite as palavras chave do site" rows="4" cols="50"><?php echo $site['keyword']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Separar palavras-chaves por vírgula</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>
            
            </div>
        </form>
    </div>
</div>