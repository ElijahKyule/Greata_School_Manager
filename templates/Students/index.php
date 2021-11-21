 <?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student[]|\Cake\Collection\CollectionInterface $students
 */
?>
<div class="students index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Students') ?></h3>
</div>
<div class="students index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed'>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th class="text-muted"><?= h('Classroom') ?></th>
                    <th class="text-muted"><?= h('AdmNO.') ?></th>
                    <th class="text-muted"><?= h('AdmDate') ?></th>
                     <th class="text-muted"><?= h('Status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): 
                    ?>
                <tr>
                    <td><?= $this->Number->format($student->id) ?></td>
                    <td><?= $this->Html->link(__($student->name), ['action' => 'view', $student->id]) ?></td>
                    <td><?= h($student->email) ?></td>
                    <td><?= h($student->gender) ?></td>
                    <td><?= h($student->class ? $student->class : 'Not Admitted') ?></td>
                    <td><?= h($student->admission_number) ?></td>
                    <td><?= h($student->admission_date) ?></td>
                    <td><?= $this->Html->link($student->status, ['controller'=>'Statuses', 'action' => 'view', $student->status_id]) ?></td>
                    <td><?= h($student->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $student->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $student->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

