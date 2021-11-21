<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroom $classroom
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Classroom') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="classrooms form content">
            <?= $this->Form->create($classroom) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('level_id', ['options' => $levels , 'label'=>'Level', 'empty'=>'Select..']);
                    echo $this->Form->control('stream_id', ['empty'=>'Select..']);
                    echo $this->Form->control('user_id', ['options' => $users , 'label'=>'Class Teacher', 'empty'=>'Select..']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
