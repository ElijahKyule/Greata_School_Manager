 <?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam[]|\Cake\Collection\CollectionInterface $exams
 */
?>
<div class="exams index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Exams') ?></h3>
</div>
<div class="exams index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exam_code') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('exam type') ?></th>
                    <th><?= $this->Paginator->sort('level_id') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('term_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th class="text-muted"><?= h('Assigned To') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exams as $exam): ?>
                <tr>
                    <td><?= $this->Number->format($exam->id) ?></td>
                    <td><?= $this->Html->link($exam->exam_code, ['action' => 'view', $exam->id]) ?></td>
                    <td><?= h($exam->title) ?></td>
                    <td><?= h($exam->examtype->name) ?></td>
                    <td><?= $this->Number->format($exam->level_id) ?></td>
                    <td><?= $this->Number->format($exam->year) ?></td>
                    <td><?= h($exam->term->name) ?></td>
                    <td><?= h($exam->status->name) ?></td>
                    <td><?= h($exam->user->name) ?></td>
                    <td><?= h($exam->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $exam->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $exam->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
