<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examtype $examtype
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Examtype') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
            <?= $this->Form->postLink(
                __(' Delete'),
                ['action' => 'delete', $examtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examtype->id), 'class' => 'btn btn-success float-right fa fa-trash']
            ) ?>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="examtypes form content">
            <?= $this->Form->create($examtype) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('score_out_of');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
