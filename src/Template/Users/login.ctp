<div class="publicidade-topo" style="margin-top: 40px;">
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
    <?= $this->Flash->render() ?>
<div style="margin-top: 70px;margin-bottom: 220px">
    <?= $this->Form->create('null', ['class' => 'form-signin']) ?>
    <h1 class="h3 mb-3 font-weight-normal text-center">Central do Anunciante</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'E-mail', 'label' => false]); ?>
    <label for="inputEmail" class="sr-only">Email address</label>
    <?php echo $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Senha', 'label' => false]); ?>
    <?= $this->Form->button('Entrar', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
    <?= $this->Form->end() ?>
</div>    