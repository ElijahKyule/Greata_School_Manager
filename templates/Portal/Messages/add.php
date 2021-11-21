<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('New') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="messages form content">
            <?= $this->Form->create($message) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('title');
                    echo $this->Form->control('body');
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('messagestatus_id', ['options' => $messagestatuses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
