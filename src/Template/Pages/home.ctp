<main role="main">
    <section class="jumbotron text-center pesquisa-inicial" >
        <br>
        <div class="container" style="max-width: 50rem;">
            <h1 class="jumbotron-heading" style="font-weight: 500">O que você está procurando em São José?</h1>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?= $this->Form->create(null, ['valueSources' => 'query', 'url' => ['controller' => 'empresas', 'action' => 'pesquisar']]); ?>

                    <div class="form-row align-items-center">
                        <div class="col-10">
                            <?= $this->Form->control('q', ['class' => 'form-control mb-2', 'placeholder' => 'Ex: Restaurante, Hotel ou Pizzaria', 'label' => FALSE]); ?>
                        </div>
                        <div class="col-2">
                            <?= $this->Form->button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-primary mb-2', 'escape' => false]); ?>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
                <div class="col-md-2"></div>
            </div>
    </section>
    <br>
</main>

<div class="container" style="position: relative;font-family: 'Open Sans'">
    <?php echo $this->Html->image('divulgue.jpg',['url' => ['controller' => 'empresas','action' => 'anuncie']]); ?>
    <div class="bottom-left">Divulgue seu negócio<br><span class="abaixo">no Vitrine São José</span></div>
    <?php echo $this->Html->image('comida.jpg',['url' => ['controller' => 'empresas','action' => 'pesquisar?q=comer',]]); ?>
    <div class="bottom-mid">Comer<br><span class="abaixo">em São José</span></div>
    <?php echo $this->Html->image('hotel.jpg',['url' => ['controller' => 'empresas','action' => 'pesquisar?categoria=Hotéis']]); ?>
    <div class="bottom-right">Hospedagem<br><span class="abaixo">em São José</span></div>
    <div style="vertical-align: middle; border-style: none;display: inline-flex;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Quadrado - Home -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:336px;height:280px"
             data-ad-client="ca-pub-1536717510867925"
             data-ad-slot="3811145245"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>
<br>
<div class="publicidade-topo" style="margin-top: 10px;">
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
    <?= $this->Flash->render() ?>
    <?php if ($totaldestaques > 0) { ?>
        <div class="destaques">
            <h5><i class="fas fa-star"></i> Empresas Destaques em São José
                <span class="float-right ver-todas"><?= $this->Html->link('Ver Todas <i class="fas fa-arrow-alt-circle-right"></i>', ['controller' => 'empresas', 'action' => 'destaques'], ['escape' => FALSE]) ?></span></h5>
            <hr> 
            <div id="carousel" class="carousel slide" data-ride="carousel" date-interval="300">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <?php foreach ($empresas as $empresa): ?>
                                <div class="col-md-3">
                                    <div class="card mb-3 shadow-sm text-center empresas-destaque">
                                        <?php if ($empresa->photo != null) { ?>
                                            <div class="col-md-12 mb-3">
                                                <?php
                                                $diretorio = str_replace('\\', '/', $empresa->dir);
                                                echo $this->Html->image('/' . $diretorio . $empresa->photo, ['style' => 'height:200px;display: block;padding-top:20px', 'class' => 'card-img-top']);
                                                ?>
                                            </div>                        
                                        <?php } ?>                                        
                                        <div class="card-body">
                                            <p class="card-text"><b><?= $this->Html->link($empresa->nomeempresa, ['controller' => 'empresas', 'action' => 'view', $empresa->slug]) ?></b></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <?php } ?>   
    <div class="categorias">
        <h5><i class="fas fa-grip-horizontal"></i> Categorias em São José
            <span class="float-right ver-todas"><?= $this->Html->link('Ver Todas <i class="fas fa-arrow-alt-circle-right"></i>', ['controller' => 'categorias'], ['escape' => FALSE]) ?></span></h5>
        <hr>
        <div class="row">
            <div class="col-3">
                <ul class="lista-home"> 
                    <?php $i = 0 ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <?php if ($i < 7) { ?>
                            <li><?= $this->Html->link($categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'categoria' => $categoria->nomecategoria]) ?></li>
                        <?php } ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-3">
                <ul class="lista-home">                
                    <?php $i = 0 ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <?php if ($i > 6 AND $i < 14) { ?>
                            <li><?= $this->Html->link($categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'categoria' => $categoria->nomecategoria]) ?></li>
                        <?php } ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-3">
                <ul class="lista-home">                
                    <?php $i = 0 ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <?php if ($i > 13 AND $i < 21) { ?>
                            <li><?= $this->Html->link($categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'categoria' => $categoria->nomecategoria]) ?></li>
                        <?php } ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-3">
                <ul class="lista-home">                
                    <?php $i = 0 ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <?php if ($i > 20 AND $i < 28) { ?>
                            <li><?= $this->Html->link($categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'categoria' => $categoria->nomecategoria]) ?></li>
                        <?php } ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="bairros" style="margin-top: 30px">
        <h5><i class="fas fa-home"></i> Bairros de São José
            <span class="float-right ver-todas"><?= $this->Html->link('Ver Todos <i class="fas fa-arrow-alt-circle-right"></i>', ['controller' => 'bairros'], ['escape' => FALSE]) ?></span></h5>
        <hr>
        <div class="row">
            <div class="col-3">
                <ul class="lista-home">                
                    <?php $i = 0 ?>
                    <?php foreach ($bairros as $bairro): ?>
                        <?php if ($i < 7) { ?>
                            <li><?= $this->Html->link($bairro->nomeBairro, ['controller' => 'empresas', 'action' => 'pesquisar', 'bairro' => $bairro->nomeBairro]) ?></li>
                        <?php } ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-3">
                <ul class="lista-home">
                    <?php $i = 0 ?>
                    <?php foreach ($bairros as $bairro): ?>
                        <?php if ($i > 6 AND $i < 14) { ?>
                            <li><?= $this->Html->link($bairro->nomeBairro, ['controller' => 'empresas', 'action' => 'pesquisar', 'bairro' => $bairro->nomeBairro]) ?></li>                       
                        <?php } ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-3">
                <ul class="lista-home">
                    <?php $i = 0 ?>
                    <?php foreach ($bairros as $bairro): ?>
                        <?php if ($i > 13 AND $i < 21) { ?>
                            <li><?= $this->Html->link($bairro->nomeBairro, ['controller' => 'empresas', 'action' => 'pesquisar', 'bairro' => $bairro->nomeBairro]) ?></li>                       
                        <?php } ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-3">
                <ul class="lista-home">
                    <?php $i = 0 ?>
                    <?php foreach ($bairros as $bairro): ?>
                        <?php if ($i > 20 AND $i < 28) { ?>
                            <li><?= $this->Html->link($bairro->nomeBairro, ['controller' => 'empresas', 'action' => 'pesquisar', 'bairro' => $bairro->nomeBairro]) ?></li>                       
                        <?php } ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <br>
</div>
<div class="publicidade-topo" style="margin-top: 15px;">
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