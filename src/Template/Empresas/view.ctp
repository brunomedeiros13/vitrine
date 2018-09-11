<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<div class="publicidade-topo">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Cabe -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-1536717510867925"
         data-ad-slot="1182329121"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>
<div class="container">
    <div class="row">
        <div class="col-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?= $this->Html->link('Vitrine'.$titulo, ['controller' => 'pages', 'action' => 'home']) ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $this->Html->link($empresa->categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'categoria' => $empresa->categoria->nomecategoria]) ?></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $empresa->nomeempresa ?></li>
                </ol>
            </nav>
            <?= $this->Flash->render() ?>
            <div class="card">
                <h5 class="card-header"><?= $empresa->nomeempresa ?>
                    <?php $empresa->rating = round($empresa->rating); ?>
                    <?php if ($empresa->rating == 1) { ?>
                        <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    <?php } elseif ($empresa->rating == 2) { ?>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    <?php } elseif ($empresa->rating == 3) { ?>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    <?php } elseif ($empresa->rating == 4) { ?>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                    <?php } elseif ($empresa->rating == 5) { ?>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <?php } elseif ($empresa->rating == 0) { ?>
                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    <?php } ?> <?php if ($empresa->destaque == '1'){ ?> <span class="badge badge-warning">Destaque</span><?php } ?>
                    <span class="float-right sugerir-link"><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i> Sugerir edição</a></span></h5>
                <div class="card-body">
                    <?php if ($empresa->photo != null AND $empresa->destaque == 1) { ?>
                        <?php
                        $diretorio = str_replace('\\', '/', $empresa->dir);
                        echo $this->Html->image('/' . $diretorio . $empresa->photo, ['style' => 'max-width: 200px;margin-left:15px', 'class' => 'float-right']);
                        ?>                      
                    <?php } ?>
                    <p class="card-text" style="margin-bottom: 5px !important"><i class="fas fa-map-marker-alt"></i> <?= $empresa->endereco ?>, <?= $empresa->numero ?> - 
                        <?php
                        if ($empresa->complemento != "") {
                            echo $empresa->complemento . ' - ';
                        }
                        ?><?= $empresa->bairro->nomeBairro ?> - <?= $empresa->cidade ?>/SC - CEP <?= $empresa->cep ?>       
                    </p>
                    <p class="card-text" style="margin-bottom: 5px !important"><i class="fas fa-phone-square"></i> <?= $empresa->telefone1 ?> <?php if ($empresa->telefone2 != '') { ?> | <?= $empresa->telefone2 ?><?php } ?></p>
                    <?php if ($empresa->email != '') { ?> 
                        <p class="card-text"><i class="fas fa-envelope"></i> <?= $empresa->email ?></p>
                    <?php } ?>

                    <?php if ($empresa->site != '' OR $empresa->destaque == 1) { ?>
                        <p class="card-text" style="margin-top: 10px !important">
                            <?php if ($empresa->site != '') { ?> 
                                <a href="http://<?= $empresa->site ?>" class="btn btn-secondary" target="_blank"><i class="fas fa-external-link-alt"></i> Site</a>
                            <?php } ?>
                            <?php if ($empresa->destaque == 1) { ?>
                                <button type="button" id="enviarEmail1" class="btn btn-secondary" data-toggle="modal" data-target="#enviarEmail"><i class="fas fa-envelope-open"></i> Enviar E-mail</button> </p>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($empresa->destaque == 1) { ?>
                        <div class="destaque">

                            <div class="card-text" style="margin-top: 20px"><?php if ($empresa->saibamais != '') { ?>

                                    <p class="card-text" style="text-decoration: underline"><b>Saiba Mais</b></p>                                    
                                    <?php
                                    echo $empresa->saibamais;
                                }
                                ?></div>
                            
                            <?php if ($empresa->preço > 0 OR $empresa->pagamento != '' OR $empresa->facebook != '' OR $empresa->twitter != '' OR $empresa->instagram != ''){ ?>
                            <p class="card-text" style="text-decoration: underline"><b>Mais Informações</b></p>
                            
                            <dl class="row">
                                <?php if ($empresa->preço > 0){ ?>
                                <dt class="col-sm-3">Faixa de Preços</dt>
                                <dd class="col-sm-9" style="margin-bottom: 0px">
                                    <?php
                                    if ($empresa->preço == 0) {
                                        echo "";
                                    } elseif ($empresa->preço == 1) {
                                        echo '<i class="fas fa-dollar-sign"></i>';
                                    } elseif ($empresa->preço == 2) {
                                        echo '<i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i>';
                                    } elseif ($empresa->preço == 3) {
                                        echo '<i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i>';
                                    }
                                    ?>

                                </dd>
                                <?php } ?>
                                <dt class="col-sm-3">Pagamento</dt>                                                               
                                <dd class="col-sm-9">
                                    <ul class="lista-home" style="margin-bottom: 0px">
                                        <?php
                                        $pagamentos = explode(":", $empresa->pagamento);
                                        foreach ($pagamentos as $pagamento) {
                                            if ($pagamento != NULL) {
                                                echo "<li>" . $pagamento . "</li>";
                                            }
                                        }
                                        ?> 
                                    </ul>
                                </dd>
                                <!--<dt class="col-sm-3">Horários</dt>
                                <dd class="col-sm-9">
                                    <table class="table table-borderless tabela-horario">
                                        <tbody>
                                            <tr>
                                                <td>Segunda: </td>
                                                <td>08h30 - 19h30</td>
                                            </tr>
                                            <tr>
                                                <td>Terça: </td>
                                                <td>08h30 - 19h30</td>
                                            </tr>
                                            <tr>
                                                <td>Quarta:</td>
                                                <td>08h30 - 19h30</td>
                                            </tr>
                                            <tr>
                                                <td>Quinta:</td>
                                                <td>08h30 - 19h30</td>
                                            </tr>
                                            <tr>
                                                <td>Sexta:</td>
                                                <td>08h30 - 19h30</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </dd>-->
                                <dt class="col-sm-3">Redes Sociais</dt>
                                <dd class="col-sm-9 redes-view">
                                    <?php if ($empresa->facebook != null) { ?>
                                        <a href = "http://www.facebook.com/<?= $empresa->facebook ?>" target="_blank"><i class = "fab fa-facebook fa-2x" style="color: #3B5998"></i></a>
                                    <?php } ?>
                                    <?php if ($empresa->instagram != null) { ?>
                                        <a href="http://www.instagram.com/<?= $empresa->instagram ?>" target="_blank"><i class="fab fa-instagram fa-2x" style="color: #D5307D"></i> </a>
                                    <?php } ?>
                                    <?php if ($empresa->twitter != null) { ?>
                                        <a href="http://www.twitter.com/<?= $empresa->twitter ?>" target="_blank"><i class="fab fa-twitter-square fa-2x" style="color: #00ACED"></i> </a>
                                    <?php } ?>
                                </dd>
                            </dl>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <br>
            <div class="text-center">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Responsivo -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1536717510867925"
                     data-ad-slot="7539232763"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <br>
            <iframe width="100%" height="360" frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?q=<?= $empresa->endereco ?>, <?= $this->Number->format($empresa->numero) ?> - 
                    <?= $empresa->bairro->nomeBairro ?> - <?= $empresa->cidade ?>/SC - CEP <?= $empresa->cep ?>&key=AIzaSyAbeTC7_RJahGBI7eAaLmLAjDwqX1SP5Og" allowfullscreen></iframe>
                    <?php if (count($empresa->comentarios) > 0) { ?>            
                <div class="comentarios">
                    <?php $contador = 1 ?>
                    <?php foreach ($empresa->comentarios as $comentario): ?>
                        <?php if ($comentario->comentario != '') { ?>
                            <?php if ($contador == 1) { ?>
                                <h5 class = "titulo-comentario" style = "margin-top: 20px"><i class = "far fa-comment-dots"></i> Avaliações</h5>
                                <?php $contador++; ?>
                            <?php } ?>
                            <div class="item-comentario">
                                <p><b><?= $comentario->autor ?> 
                                        <?php $comentario->rating = round($comentario->rating); ?>
                                        <?php if ($comentario->rating == 1) { ?>
                                            <i class="fas fa-star"></i>
                                        <?php } elseif ($comentario->rating == 2) { ?>
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <?php } elseif ($comentario->rating == 3) { ?>
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <?php } elseif ($comentario->rating == 4) { ?>
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <?php } elseif ($comentario->rating == 5) { ?>
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <?php } elseif ($comentario->rating == 0) { ?>
                                            <!--<i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>-->
                                        <?php } ?>
                                    </b><span class="float-right" style="opacity: 0.5;"><small><i class="far fa-clock"></i> <?= $comentario->created->format('d/m/Y \à\s H:i') ?></small></span></p>           
                                <p style="padding-top: 7px"><?= $comentario->comentario ?></p>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>  
            <?php } ?>
            <br>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center" style="padding: 10px 4px 10px 4px;"><b>Avalie <?= $empresa->nomeempresa ?></b></div>
                <div class="card-body">
                    <h5 class="card-title text-center">Dê a sua nota:</h5>                    
                    <?= $this->Form->create($empresa, ['url' => ['action' => 'avaliar', $empresa->id], 'style' => 'margin-bottom: 0px']); ?>
                    <div class="form text-center">
                        <p class="card-text">       
                            <select id="rating" name="rating">
                                <option value="0"></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select></p>
                        <?= $this->Form->control('autor', ['type' => 'text', 'class' => 'form-control mb-2', 'placeholder' => 'Informe seu nome', 'label' => FALSE]); ?>
                        <?= $this->Form->control('comentario', ['type' => 'textarea', 'style' => 'height:176px', 'class' => 'form-control mb-2', 'placeholder' => 'Descreva sua experência no estabelecimento, informando detalhes sobre o atedimento, preço ou localização, por exemplo.', 'label' => FALSE]); ?>
                        <?= $this->Form->button('Publicar', ['type' => 'submit', 'class' => 'btn btn-default text-center']); ?>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
            <br>  
            <div class="card text-center">
                <div class="card-header text-center"><b>Compartilhe na Web</b></div>
                <div class="card-body">
                    <div id="share"></div> 
                </div>
            </div>
            <br>
        </div>
    </div>    
</div>
<br>
<br>
<!-- Modal - Sugerir Edição -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= $this->Form->create(null, ['url' => ['action' => 'sugeriredicao']]) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEnviar">Sugerir edição em <?= $empresa->nomeempresa ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('nome', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Nome']); ?>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'E-Mail']); ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('telefone', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Telefone']); ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('texto', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Mensagem', 'type' => 'textarea']); ?>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?= $this->Form->control('id', ['type' => 'hidden', 'value' => $empresa->id]) ?>
                <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Enviar E-mail -->
<div class="modal fade" id="enviarEmail" tabindex="-1" role="dialog" aria-labelledby="enviarEmail" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= $this->Form->create(null, ['url' => ['action' => 'enviaremail']]) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEnviar">Enviar email para <?= $empresa->nomeempresa ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('nome', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Nome']); ?>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'E-Mail']); ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('telefone', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Telefone']); ?>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php echo $this->Form->control('texto', ['class' => 'form-control', 'label' => FALSE, 'placeholder' => 'Mensagem', 'type' => 'textarea']); ?>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?= $this->Form->control('id', ['type' => 'hidden', 'value' => $empresa->id]) ?>
                <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
