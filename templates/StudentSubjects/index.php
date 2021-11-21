 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubject[]|\Cake\Collection\CollectionInterface $studentSubjects
 */
?>
<div class="studentSubjects index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Student Subjects') ?></h3>
</div>
<div class="studentSubjects index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('subject_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentSubjects as $studentSubject): ?>
                <tr>
                    <td><?= $this->Number->format($studentSubject->id) ?></td>
                    <td><?= $studentSubject->has('student') ? $this->Html->link($studentSubject->student->name, ['controller' => 'Students', 'action' => 'view', $studentSubject->student->id]) : '' ?></td>
                    <td><?= $studentSubject->has('subject') ? $this->Html->link($studentSubject->subject->name, ['controller' => 'Subjects', 'action' => 'view', $studentSubject->subject->id]) : '' ?></td>
                    <td><?= h($studentSubject->created) ?></td>
                    <td><?= h($studentSubject->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $studentSubject->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $studentSubject->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $studentSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSubject->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
