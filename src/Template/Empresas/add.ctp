<?= $this->Html->script(['tinymce/tinymce.min']); ?>
<script>
    tinymce.init({
        selector: 'textarea',
        language: 'pt_BR',
        menubar: false,
        statusbar: false,
        height: 200,
        theme: 'modern',
        plugins: 'print preview fullpage autolink directionality visualblocks visualchars fullscreen image link media template codesample pagebreak nonbreaking anchor lists textcolor contextmenu colorpicker textpattern',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat'
    });
</script>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo Anúncio</h1>
</div>   
<div class="add-empresa">
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <h4 class="mb-3">Dados Básicos</h4>
                <hr>
                <?= $this->Form->create($empresa) ?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nome da Empresa</label>
                        <?php echo $this->Form->control('nomeempresa', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Categoria</label>
                        <?php echo $this->Form->control('categorias_id', ['class' => 'form-control custom-select d-block w-100', 'label' => FALSE, 'options' => $categorias]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <label for="firstName">Endereço</label>
                        <?php echo $this->Form->control('endereco', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="lastName">Número</label>
                        <?php echo $this->Form->control('numero', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="firstName">Complemento</label>
                        <?php echo $this->Form->control('complemento', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Bairro</label>
                        <?php echo $this->Form->control('bairros_id', ['class' => 'form-control custom-select d-block w-100', 'label' => FALSE, 'options' => $bairros]); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">CEP</label>
                        <?php echo $this->Form->control('cep', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Cidade</label>
                        <?php echo $this->Form->control('cidade', ['class' => 'form-control', 'label' => FALSE, 'disabled' => true, 'value' => $titulo]); ?>
                        <?php echo $this->Form->control('cidade', ['type' => 'hidden', 'label' => FALSE, 'value' => $titulo]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Estado</label>
                        <?php echo $this->Form->control('estado', ['class' => 'form-control', 'label' => FALSE, 'disabled' => true, 'value' => 'Santa Catarina']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Telefone 1</label>
                        <?php echo $this->Form->control('telefone1', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Telefone 2</label>
                        <?php echo $this->Form->control('telefone2', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">E-mail (Opcional)</label>
                        <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => FALSE, 'required' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Website (Opcional)</label>
                        <?php echo $this->Form->control('site', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12" style="background-color: #e9ecef; padding: 20px;">
                <h4 class="mb-3">Dados Adicionais</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nome do Proprietário</label>
                        <?php echo $this->Form->control('nomeproprietario', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">E-mail para Contato</label>
                        <?php echo $this->Form->control('emailproprietario', ['class' => 'form-control', 'label' => FALSE]); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <br>