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
    <h3 style="margin-bottom: 40px"><i class="fas fa-grip-horizontal"></i> Categorias de São José</h3>
    <?php
    $letraas = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    $letrabs = ['I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'];
    $letracs = ['Q', 'R', 'S', 'T', 'U', 'V', 'X', 'W', 'Y', 'Z'];
    ?>

    <div class="row">
        <div class="col-4">
            <?php foreach ($letraas as $letraa): ?>
                <?php $i = 0 ?>
                <?php $hr = 0 ?>
                <?php foreach ($categorias as $categoria): ?>                                
                    <?php $nome = substr($categoria->nomecategoria, 0, 1); ?>
                    <?php if ($nome == $letraa) { ?>
                        <?php if ($i == 0) { ?>
                            <h5><?= $letraa ?></h5>
                            <?php $i++ ?>                           
                        <?php } ?>
                        <p style="margin-bottom: 0px"><?= $this->Html->link($categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'categoria' => $categoria->nomecategoria]) ?></p>
                        <?php $hr++ ?>
                    <?php } ?>
                <?php endforeach; ?>
                <?php if ($hr > 0) { ?>
                    <hr>
                <?php } ?>
            <?php endforeach; ?>
        </div>        
        <div class="col-4">
            <?php foreach ($letrabs as $letrab): ?>
                <?php $i = 0 ?>
                <?php $hr = 0 ?>
                <?php foreach ($categorias as $categoria): ?>                                
                    <?php $nome = substr($categoria->nomecategoria, 0, 1); ?>
                    <?php if ($nome == $letrab) { ?>
                        <?php if ($i == 0) { ?>
                            <h5><?= $letrab ?></h5>
                            <?php $i++ ?>                           
                        <?php } ?>
                        <p style="margin-bottom: 0px"><?= $this->Html->link($categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'categoria' => $categoria->nomecategoria]) ?></p>
                        <?php $hr++ ?>
                    <?php } ?>
                <?php endforeach; ?>
                <?php if ($hr > 0) { ?>
                    <hr>
                <?php } ?>
            <?php endforeach; ?>
        </div>
        <div class="col-4">
            <?php foreach ($letracs as $letrac): ?>
                <?php $i = 0 ?>
                <?php $hr = 0 ?>
                <?php foreach ($categorias as $categoria): ?>                                
                    <?php $nome = substr($categoria->nomecategoria, 0, 1); ?>
                    <?php if ($nome == $letrac) { ?>
                        <?php if ($i == 0) { ?>
                            <h5><?= $letrac ?></h5>
                            <?php $i++ ?>                           
                        <?php } ?>
                        <p style="margin-bottom: 0px"><?= $this->Html->link($categoria->nomecategoria, ['controller' => 'empresas', 'action' => 'pesquisar', 'categoria' => $categoria->nomecategoria]) ?></p>
                        <?php $hr++ ?>
                    <?php } ?>
                <?php endforeach; ?>
                <?php if ($hr > 0) { ?>
                    <hr>
                <?php } ?>
            <?php endforeach; ?>
            <br>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Lateral-Banner-Vitrine -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-1536717510867925"
                 data-ad-slot="2365991235"></ins>
            <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    <br>
</div>
