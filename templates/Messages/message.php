<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('New Class Message') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['controller'=>'Classrooms', 'action' => 'view', $id, '?'=>['tab'=>'messages']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="messages form content">
            <?= $this->Form->create($message) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('classroom_id', ['options' => $classrooms, 'label'=>'Recipient Class']);
                    echo $this->Form->control('code', ['label'=>'Message Code']);
                    echo $this->Form->control('title');
                    echo $this->Form->control('body');
                    echo $this->Form->control('user_id', ['options' => $users, 'label'=>'Sender', 'empty'=>'Select..']);
                    echo $this->Form->control('messagestatus_id', ['value'=>1, 'type'=>'hidden']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
