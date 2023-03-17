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

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_email:</label>
                                <input class="form-control" id="site_email"	name="site_email" placeholder="site_email" type="text" value="<?php echo $site['site_email']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_dominio:</label>
                                <input class="form-control" id="site_dominio"	name="site_dominio" placeholder="site_dominio" type="text" value="<?php echo $site['site_dominio']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_vencimento_dominio:</label>
                                <input class="form-control" id="site_vencimento_dominio"	name="site_vencimento_dominio" placeholder="site_vencimento_dominio" type="text" value="<?php echo $site['site_vencimento_dominio']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_nome_exibicao:</label>
                                <input class="form-control" id="site_nome_exibicao"	name="site_nome_exibicao" placeholder="site_nome_exibicao" type="text" value="<?php echo $site['site_nome_exibicao']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_whats:</label>
                                <input class="form-control" id="site_whats"	name="site_whats" placeholder="site_whats" type="text" value="<?php echo $site['site_whats']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_telefone:</label>
                                <input class="form-control" id="site_telefone"	name="site_telefone" placeholder="site_telefone" type="text" value="<?php echo $site['site_telefone']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputPassword1">Alterar cor:</label>
                                <select class="form-control" name="cdCSS" id="cdCSS">
                                    <?php foreach($sites_css as $css): ?>
                                        <option value="<?php echo $css['cd_site_css']; ?>" <?php echo $site['cd_site_css'] == $css['cd_site_css'] ? 'selected' : '' ?> ><?php echo $css['site_css_descricao']; ?></option>
                                    <?php endforeach; ?>
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

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_facebook:</label>
                                <input class="form-control" id="site_facebook"	name="site_facebook" placeholder="site_facebook" type="text" value="<?php echo $site['site_facebook']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_instagram:</label>
                                <input class="form-control" id="site_instagram"	name="site_instagram" placeholder="site_instagram" type="text" value="<?php echo $site['site_instagram']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_area_atuacao_titulo:</label>
                                <input class="form-control" id="site_area_atuacao_titulo"	name="site_area_atuacao_titulo" placeholder="site_area_atuacao_titulo" type="text" value="<?php echo $site['site_area_atuacao_titulo']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_area_atuacao_subtitulo:</label>
                                <input class="form-control" id="site_area_atuacao_subtitulo"	name="site_area_atuacao_subtitulo" placeholder="site_area_atuacao_subtitulo" type="text" value="<?php echo $site['site_area_atuacao_subtitulo']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">&nbsp;site_area_atuacao_frase:</label>
                                <input class="form-control" id="site_email"	name="site_area_atuacao_frase" placeholder="site_area_atuacao_frase" type="text" value="<?php echo $site['site_area_atuacao_frase']; ?>">
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