<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam 
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Exam') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['controller'=>'Users','action'=>'view',$selected_user, '?'=>['tab'=>'exams']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="exams form content">
            <?= $this->Form->create($exam) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('exam_code');
                    echo $this->Form->control('examtype_id', ['empty'=>'Select..']);
                    echo $this->Form->control('level_id', ['empty'=>'Select..']);
                    echo $this->Form->control('year');
                    echo $this->Form->control('term_id', ['options' => $terms, 'empty'=>'Select..']);
                    echo $this->Form->control('description');
                    echo $this->Form->control('status_id', ['options' => $statuses, 'empty'=>'Select..']);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty'=>'Select..', 'label'=>'Assigned To']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
