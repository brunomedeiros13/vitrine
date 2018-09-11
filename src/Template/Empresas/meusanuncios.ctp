<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Meus Anúncios</h1>
</div>
<div class="meusanuncios">
    <div class="row">
        <?php foreach ($empresas as $empresa): ?>
            <div class="col-md-2">
                <div class="card mb-3 shadow-sm text-center empresas-destaque">
                     <?php if ($empresa->photo != null) { ?>
                            <?php
                            $diretorio = str_replace('\\', '/', $empresa->dir);
                            echo $this->Html->image('/' . $diretorio . $empresa->photo,['style' => 'width: 100%; display: block;','class' => 'card-img-top']);
                            ?>                      
                    <?php } ?>
                    <div class="card-body">
                        <p class="card-text" style="margin-bottom: 2px"><strong><?= $empresa->nomeempresa ?></strong></p>
                        <p class="card-text"><?php $empresa->rating = round($empresa->rating); ?>
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
                    <?php } ?></p>
                        <p class="card-text"><i class="far fa-eye"></i> Visualizações: <?= $empresa->views ?></p>
                       <?= $this->Html->link('Visualizar', ['controller' => 'empresas', 'action' => 'view', $empresa->slug],['class' => 'btn btn-secondary','role' => 'button','target' => '_blank']) ?>
                       <?= $this->Html->link('Editar', ['controller' => 'empresas', 'action' => 'edit', $empresa->slug],['class' => 'btn btn-secondary','role' => 'button']) ?>                       
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>    
</div>
<br>
