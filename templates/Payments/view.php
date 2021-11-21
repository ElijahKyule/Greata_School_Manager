<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($payment->reference_number) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Students', 'action' => 'view', $payment->student->id, '?'=>['tab'=>'payments']], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="payments view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Payment Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Student:') ?></th>
                    <td><?= $payment->has('student') ? $this->Html->link($payment->student->name, ['controller' => 'Students', 'action' => 'view', $payment->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Reference Number:') ?></th>
                    <td><?= h($payment->reference_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paymentmode:') ?></th>
                    <td><?= $payment->has('paymentmode') ? $this->Html->link($payment->paymentmode->name, ['controller' => 'Paymentmodes', 'action' => 'view', $payment->paymentmode->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Authorized by:') ?></th>
                    <td><?= $payment->has('user') ? $this->Html->link($payment->user->name, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Debit:') ?></th>
                    <td><?= $this->Number->format($payment->debit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Credit:') ?></th>
                    <td><?= $this->Number->format($payment->credit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Balance:') ?></th>
                    <td><?= $this->Number->format($payment->balance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description:') ?></th>
                    <td><?= $this->Text->autoParagraph(h($payment->description)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($payment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($payment->modified) ?></td>
                </tr>
            </table>
            </div>
          </div>
       
        </div>
    </div>