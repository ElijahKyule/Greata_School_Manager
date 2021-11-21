<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paymentmode $paymentmode
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($paymentmode->name) ?></h3>
        </div>
        <div class="pull-right">            
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $paymentmode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentmode->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $paymentmode->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#paymentmode_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#payments_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-sliders-h" style="padding-right: 5px;"></i>Related Fee Structures
              </a>
            </li> 
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="paymentmode_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fas fa-sliders-h" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table>
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($paymentmode->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($paymentmode->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($paymentmode->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="payments_related">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <?php if (!empty($paymentmode->payments)) : ?>
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Reference Number') ?></th>
                                        <th><?= __('Student') ?></th>
                                        <th><?= __('Credit') ?></th>
                                        <th><?= __('Description') ?></th>
                                        <th><?= __('Authorized By') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($paymentmode->payments as $payment) : ?>
                                    <tr>
                                        <td><?= h($payment->id) ?></td>
                                        <td><?= $this->Html->link($payment->reference_number, ['controller' => 'Students', 'action' => 'view', $payment->student->id, '?'=>['tab'=>'payments']]) ?></td>
                                        <td><?= h($payment->student->name) ?></td>
                                        <td><?= h($payment->credit) ?></td>
                                        <td><?= h($payment->description) ?></td>
                                        <td><?= h($payment->user->name) ?></td>
                                        <td><?= h($payment->created) ?></td>
                                        <td><?= h($payment->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Students', 'action' => 'view', $payment->student->id, '?'=>['tab'=>'payments']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
