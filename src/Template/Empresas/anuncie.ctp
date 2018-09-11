<div style="margin-top: 100px"></div>
<div class="container">
    <h2>Anuncie no Vitrine <?= $titulo ?></h2>
    <hr>
    <p>Você pode cadastrar sua empresa no Vitrine <?= $titulo ?> de duas maneiras diferentes: através do cadastro gratuito ou assinando um <b>Plano Destaque</b>.</p>
    <h5>Cadastro Gratuito</h5>
    <p>O cadastro gratuito garante as informações básicas do negócio, como endereço e telefone, além de possibilitar a visualização através de mapa, bem como permitir que usuários do site possam avaliar a empresa.</p>
    <br>
    <h5>Plano Destaque</h5>
    <p>O Plano Destaque garante, além de todos recursos do cadastro gratuito, diversas outras funções para melhorar a experiência dos usuários do site quando visualizar o anúncio da sua empresa. 
        Dessa forma, poderá ser exibido, por exemplo, o logo, o e-mail e o site da empresa, bem como as formas de pagamento, as redes sociais e outros delalhes. </p>
    <p>Além disso, você terá acesso a um painel administrativo, onde poderá editar todas as informações do anúncio, assim como visualizar relatórios e estatísticas.</p>
    <p>No entanto, o mais importante recurso do Plano Destaque é o <strong>posicionamento otimizado.</strong>. 
        Com ele, o seu anúncio aparece nos primeiros resultados da busca, melhorando a possibilidade do cliente visualizar o anúncio e chegar a sua empresa.</p>
    <br>
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal"><b>Grátis</b></h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">R$ 0 <small class="text-muted">/ mês</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li style="text-decoration: underline"><b>Recursos</b></li>
                    <li>Endereço, Telefone</li>
                    <li>Mapa</li>
                </ul>
                <?php echo $this->Html->link('Cadastre Agora', ['controller' => 'empresas', 'action' => 'anunciegratis'], ['class' => 'btn btn-lg btn-block btn-outline-primary','style' => 'margin-top: 168px']); ?>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal"><b>Plano Destaque</b></h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">R$ 39,90 <small class="text-muted">/ mês</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li style="text-decoration: underline"><b>Recursos</b></li>
                    <li>Posicionamento Otimizado</li>
                    <li>Endereço, Telefone</li>
                    <li>Mapa</li>
                    <li>Logo da Empresa</li>
                    <li>E-mail, Site</li>
                    <li>Descrição Detalhada</li>
                    <li>Dados Adicionais</li>
                    <li>Redes Sociais</li>
                </ul>
                <?php echo $this->Html->link('Assine Agora', ['controller' => 'users', 'action' => 'assineagora'], ['class' => 'btn btn-lg btn-block btn-primary']); ?>
            </div>
        </div>

    </div>
    <br>
</div>
<br>
