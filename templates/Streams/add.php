<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stream $stream
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('New Stream') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="streams form content">
            <?= $this->Form->create($stream) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
