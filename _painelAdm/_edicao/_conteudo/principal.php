<?php
    session_start();
    $_SESSION['setor'] = 1;
    include("_php/buscar-site.php");
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Início</a>
    </li>
    <li class="breadcrumb-item active">Principal</li>
</ol>
<div class="col-md-12">
    <div class="row">
        <form enctype="multipart/form-data" role="form" method="post" action="_conteudo/_php/atualizarPrincipal.php" >
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group">								
                        <label class="control-label" for="exampleInputEmail1">&nbsp;Imagem Principal:</label>	
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
                    <input class="form-control" id="principalTitulo"	name="principalTitulo" placeholder="Digite o título desejado" type="text" value="<?php echo $site['principalTitulo']; ?>">
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Sub Título:</label>
                    <textarea class="form-control" id="principalSubtitulo" name="principalSubtitulo" placeholder="Digite o subtítulo desejado" rows="4" cols="50"><?php echo $site['principalSubtitulo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputEmail1">Descrição:</label>
                    <textarea class="form-control" id="principalDescricao" name="principalDescricao" placeholder="Digite a descrição desejada" rows="4" cols="50"><?php echo $site['principalDescricao']; ?></textarea>
                </div>
                <button id="btnAlterar" class="btn btn-primary btn-lg">Alterar - Inseri AJAX e ajustar o Back</button>
                <label id="retorno">Dados salvos com sucesso</label>
            </div>
        </form>						
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#btnAlterar').on('click',function(){
            //antes de enviar, aqui precisa realizar a validação de todos os campos
            alert("funcionou");
        });
    });

    $('input[type=submit]').click(function(e){
        //setamos para quando submeter não atualizar a pagina
        e.preventDefault();
        //o serialize retorna uma string pronta para ser enviada
        var valores = $('#form').serializeArray();
        //colocamos no console para vermos
        console.log(valores); 
    });
</script>