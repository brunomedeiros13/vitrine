<br><br><br>
<div class="publicidade-topo" style="margin-top: 80px;">
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
<div class="categorias index large-9 medium-8 columns content">
    <h3 style="margin-bottom: 40px"><i class="fas fa-star"></i> Empresas Destaques em <?= $titulo ?></h3>
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
    <div class="jumbotron jumbotron-anuncio">
        <h2 class="display-5">Seja um Destaque em <?= $titulo ?></h2>
        <p class="lead"></p>
        <hr class="my-4">
        <p>No Vitrine <?= $titulo ?> você pode anunciar seu negócio e se tornar um destaque da região.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Saiba Mais</a>
    </div>
</div>
<br>

