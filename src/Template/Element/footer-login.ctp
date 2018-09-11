<footer class="text-muted bg-dark footer-site text-center">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h5>Vitrine <?= $titulo ?></h5>
                <ul class="lista-home"> 
                    <li><?= $this->Html->link('Destaques', ['controller' => 'empresas','action' => 'destaques']) ?></li>
                    <li><?= $this->Html->link('Categorias', ['controller' => 'categorias']) ?></li>
                    <li><?= $this->Html->link('Bairros', ['controller' => 'bairros']) ?></li>
                    <li><?= $this->Html->link('Fale Conosco', ['controller' => 'categorias']) ?></li>
                </ul>
            </div>
            <div class="col-4">
                <h5>Para sua Empresa</h5>
                <ul class="lista-home"> 
                     <li class="divulgue"><?= $this->Html->link('Divulgue seu Negócio', ['controller' => 'empresas', 'action' => 'anuncie']) ?></li>
                    <li><?= $this->Html->link('Central do Anunciante', ['controller' => 'users', 'action' => 'login']) ?></li>
                </ul>
            </div>
            <div class="col-4 siga-nos">
                <h5>Siga-nos!</h5>
                <p><?php echo $this->Html->image('facebook.png'); ?> <?php echo $this->Html->image('instagram.png'); ?></p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <p>Vitrine <?= $titulo ?> 2018 | Todos os direitos reservados.</p>
            </div>
        </div>
    </div>
</footer>