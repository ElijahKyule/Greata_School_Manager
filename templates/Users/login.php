<div class="form col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 loginform">
    <?= $this->Flash->render() ?>
    <h1>Sign In</h1>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password to access your account') ?></legend>
        <?= $this->Form->control('email', ['required' => true, 'placeholder'=>'Email']) ?>
        <?= $this->Form->control('password', ['required' => true, 'placeholder'=>'Password']) ?>
    </fieldset>
    <?= $this->Form->button(' Sign In', array('type'=>'submit', 'class'=> 'btn-primary fas fa-sign-in-alt')); ?>
    <br>
    <?= $this->Html->link(__('New User?'), ['action' => 'add']) ?>
    <?= $this->Form->end() ?>

</div>
<div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8 loginbg">
    <div class="text-center">
        <?=$this->Html->image('logo.png',["alt"=>"logo", "class"=>"img-responsive logo1"]) ?>
    </div>
</div>