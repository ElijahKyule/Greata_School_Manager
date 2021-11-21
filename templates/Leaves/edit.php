<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Leave Parameter') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
            <?= $this->Form->postLink(
                __(' Delete'),
                ['action' => 'delete', $leave->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $leave->id), 'class' => 'btn btn-success float-right fa fa-trash']
            ) ?>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="leaves form content">
            <?= $this->Form->create($leave) ?>
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