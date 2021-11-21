<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FeeStudent $feeStudent
 */
?>
<div>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($feeStudent->receipt_number) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $feeStudent->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $feeStudent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeStudent->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="feeStudents view content">
            <table>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= h($feeStudent->student->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fee') ?></th>
                    <td><?= h($feeStudent->fee->fee_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paymentmode') ?></th>
                    <td><?= h($feeStudent->paymentmode->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Receipt Number') ?></th>
                    <td><?= h($feeStudent->receipt_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= h($feeStudent->user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fee Paid') ?></th>
                    <td><?= $this->Number->format($feeStudent->fee_paid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($feeStudent->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($feeStudent->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
