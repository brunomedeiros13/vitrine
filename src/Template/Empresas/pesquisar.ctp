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
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <p class="card-text"><b>Ordenar por:</b></p>
                <ul class="ordenar-lista">
                    <li><?php echo $this->Paginator->sort('rating', 'Melhores Avaliados', ['lock' => true, 'direction' => 'desc']); ?></li>
                    <li><?php echo $this->Paginator->sort('views', 'Mais Visualizados', ['lock' => true, 'direction' => 'desc']); ?></li>
                    <li><?php echo $this->Paginator->sort('nomeempresa', 'Ordem Alfabética (A-Z)', ['lock' => true, 'direction' => 'asc']); ?></li>
                    <li><?php echo $this->Paginator->sort('nomeempresa', 'Ordem Alfabética (Z-A)', ['lock' => true, 'direction' => 'desc']); ?></li>
                </ul>
            </div>
        </div>
        <br>
        <div  class="card">
            <div class="card-body">
                <p class="card-text"><b>Categorias</b></p>
                <ul id="categorias" class="ordenar-lista">
                    <?php foreach ($categorias as $categoria): ?>
                        <li><?= $this->Html->link($categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'q' => $this->request->getQuery('q'), 'categoria' => $categoria->nomecategoria]); ?>  </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><b>Bairros</b></p>
                <ul id="bairros" class="ordenar-lista">
                    <?php foreach ($bairros as $bairro): ?>
                        <li><?= $this->Html->link($bairro->nomeBairro, ['controller' => 'empresas', 'action' => 'pesquisar', 'q' => $this->request->getQuery('q'), 'bairro' => $bairro->nomeBairro]); ?>  </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <br>
    </div>
    <div class="col-9">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $this->Html->link('Vitrine São José', ['controller' => 'pages', 'action' => 'home']) ?></li>
                <?php if ($this->request->getQuery('q') != NULL AND $this->request->getQuery('categoria') == NULL AND $this->request->getQuery('bairro') == NULL) { ?><?= '<li class="breadcrumb-item active" aria-current="page">Pesquisa por: <span style="text-transform: capitalize">"' . $this->request->getQuery('q') . '"</span> em São José</li>'; ?>
                <?php } elseif ($this->request->getQuery('q') == NULL AND $this->request->getQuery('categoria') != NULL) { ?><?= '<li class="breadcrumb-item active" aria-current="page">' . $this->request->getQuery('categoria') . "</li>"; ?>
                <?php } elseif ($this->request->getQuery('q') == NULL AND $this->request->getQuery('bairro') != NULL) { ?><?= '<li class="breadcrumb-item active" aria-current="page">' . $this->request->getQuery('bairro') . "</li>"; ?>
                    <?php } elseif ($this->request->getQuery('q') != NULL AND $this->request->getQuery('categoria') != NULL) { ?><li class="breadcrumb-item active" aria-current="page"><?= $this->Html->link($this->request->getQuery('categoria'), ['action' => 'pesquisar', 'categoria' => $this->request->getQuery('categoria')]) ?></li><li class="breadcrumb-item active" aria-current="page"><?= 'Pesquisa por: "' . $this->request->getQuery('q').'"'; ?></li>
                <?php } elseif ($this->request->getQuery('q') != NULL AND $this->request->getQuery('bairro') != NULL) { ?><li class="breadcrumb-item active" aria-current="page"><?= $this->Html->link($this->request->getQuery('bairro'), ['action' => 'pesquisar', 'bairro' => $this->request->getQuery('bairro')]) ?></li><li class="breadcrumb-item active" aria-current="page"><?= 'Pesquisa por: "' . $this->request->getQuery('q').'"'; ?></li><?php } ?>
            </ol>
        </nav>
        <div class="empresas index large-9 medium-8 columns content">
            <?php if (count($empresas) == 0 AND $totaldestaques == 0) { ?>

                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Nada foi encontrado!</h4>
                    <p>Sua pesquisa não retornou nenhum resultado.</p>
                    <hr>
                    <p class="mb-0">Sugestões para melhorar os resultados:</p>
                    <ul>
                        <li>Verifique se o termo digitado está correto e refaça a busca.</li>
                        <li>Modifique os termos buscados.</li>
                        <li>Utilize nomes mais genéricos.</li>
                    </ul>
                    <p class="mb-0">Se você conhece alguma empresa que não está sendo apresentada, <?= $this->Html->link('inclua gratuitamente no Guia São José', ['action' => 'add']) ?>.</p>
                </div>
            <?php } ?>
            <?php $cont = 0; ?>
            <?php foreach ($destaques as $empresa): ?>
                <?php if ($cont == 5) { ?>
                <?php } ?>
                <div class="card">
                    <div class="card-body item-empresa">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <?php if ($empresa->photo != null AND $empresa->destaque == 1) { ?>
                                        <?php
                                        $diretorio = str_replace('\\', '/', $empresa->dir);
                                        echo $this->Html->image('/' . $diretorio . $empresa->photo, ['style' => 'max-height: 120px; margin-right:15px', 'class' => 'float-right rounded']);
                                        ?>                      
                                    <?php } ?>
                                    <p class="card-text"><b><?= $this->Html->link(__($empresa->nomeempresa), ['action' => 'view', $empresa->slug]) ?></b> 
                                        <small>
                                            <?php $empresa->rating = round($empresa->rating); ?>
                                            <?php if ($empresa->rating == 1) { ?>
                                                <i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 2) { ?>
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 3) { ?>
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 4) { ?>
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 5) { ?>
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 0) { ?>
                                                <!--<i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>-->
                                            <?php } ?></small><?php if ($empresa->destaque == '1'){ ?> <span class="badge badge-warning">Destaque</span><?php } ?></p>

                                    <p class="card-text"><b> <i class="fas fa-map-marker-alt"></i> Endereço: </b><?= h($empresa->endereco) ?>, <?= $empresa->numero ?> - <?= h($empresa->bairro->nomeBairro) ?> - <?= h($empresa->cidade) ?></p>
                                    <?php
                                    $telefone = substr($empresa->telefone1, 0, 12);
                                    ?>
                                    <p class="card-text"><b> <i class="fas fa-phone-square"></i> Telefone: </b><?= $telefone ?>... <small><?= $this->Html->link(__("ver telefone"), ['action' => 'view', $empresa->id]) ?></small></p>                                              
                                    <?php if ($empresa->desccurta != ''){ ?>
                                    <p class="card-text"><i class="fas fa-info-circle"></i><small> <?= $empresa->desccurta ?></small></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <?php $cont++ ?>
            <?php endforeach; ?>
            <?php foreach ($empresas as $empresa): ?>
                <?php if ($cont == 5) { ?>
                <?php } ?>
                <div class="card">
                    <div class="card-body item-empresa">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <p class="card-text"><b><?= $this->Html->link(__($empresa->nomeempresa), ['action' => 'view', $empresa->slug]) ?></b> 
                                        <small>
                                            <?php $empresa->rating = round($empresa->rating); ?>
                                            <?php if ($empresa->rating == 1) { ?>
                                                <i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 2) { ?>
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 3) { ?>
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 4) { ?>
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 5) { ?>
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <?php } elseif ($empresa->rating == 0) { ?>
                                                <!--<i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>-->
                                            <?php } ?></small><?php if ($empresa->destaque == '1'){ ?> <span class="badge badge-warning">Destaque</span><?php } ?></p>

                                    <p class="card-text"><b> <i class="fas fa-map-marker-alt"></i> Endereço: </b><?= h($empresa->endereco) ?>, <?= $empresa->numero ?> - <?= h($empresa->bairro->nomeBairro) ?> - <?= h($empresa->cidade) ?></p>
                                    <?php
                                    $telefone = substr($empresa->telefone1, 0, 12);
                                    ?>
                                    <p class="card-text"><b> <i class="fas fa-phone-square"></i> Telefone: </b><?= $telefone ?>... <small><?= $this->Html->link(__("ver telefone"), ['action' => 'view', $empresa->id]) ?></small></p>                                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <?php $cont++ ?>
            <?php endforeach; ?>
            <?php if (count($empresas) > 0) { ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php
                        $this->Paginator->setTemplates([
                            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                        ]);
                        ?>
                        <?= $this->Paginator->prev('Anterior') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('Próximo') ?>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    </div>
</div>
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


