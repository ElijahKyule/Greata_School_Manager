 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FeeStudent[]|\Cake\Collection\CollectionInterface $feeStudents
 */
?>
<div class="feeStudents index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Students Fees Reports') ?></h3>
</div>
<div class="feeStudents index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('fee_id') ?></th>
                    <th><?= $this->Paginator->sort('fee_paid') ?></th>
                    <th><?= $this->Paginator->sort('paymentmode_id') ?></th>
                    <th><?= $this->Paginator->sort('receipt_number') ?></th>
                    <td><?= h('Authorized by') ?></td>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feeStudents as $feeStudent): ?>
                <tr>
                    <td><?= $this->Number->format($feeStudent->id) ?></td>
                    <td><?= h($feeStudent->student->name) ?></td>
                    <td><?= h($feeStudent->fee->fee_code) ?></td>
                    <td><?= $this->Number->format($feeStudent->fee_paid) ?></td>
                    <td><?= h($feeStudent->paymentmode->name) ?></td>
                    <td><?= h($feeStudent->receipt_number) ?></td>
                    <td><?= h($feeStudent->user->name) ?></td>
                    <td><?= h($feeStudent->created) ?></td>
                    <td><?= h($feeStudent->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $feeStudent->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $feeStudent->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $feeStudent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeStudent->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
