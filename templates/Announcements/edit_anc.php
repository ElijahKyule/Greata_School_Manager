<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement $announcement
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Announcement') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['controller'=>'Users', 'action' => 'view', $auth_user, '?'=>['tab'=>'announcements']], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
           
    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="announcements form content">
            <?= $this->Form->create($announcement) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('title');
                    echo $this->Form->control('body');
                    echo $this->Form->control('user_id', ['options' => $users,'label'=>'Sender', 'empty'=>'Select..']);
                    echo $this->Form->control('messagestatus_id', ['options' => $messagestatuses,'label'=>'Status', 'empty'=>'Select..']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
