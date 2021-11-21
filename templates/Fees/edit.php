<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fee $fee
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Fee') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="fees form content">
            <?= $this->Form->create($fee) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('fee_code');
                    echo $this->Form->control('level_id', ['options' => $levels,'empty'=>'Select..']);
                    echo $this->Form->control('year');
                    echo $this->Form->control('term_id', ['options' => $terms, 'empty'=>'Select...', 'label'=>'Term / Program']);
                    echo $this->Form->control('description');
                    echo $this->Form->control('status_id', ['options' => $statuses, 'empty'=>'Select...']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
