<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FeeStructureParameter $feeStructureParameter
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($feeStructureParameter->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $feeStructureParameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeStructureParameter->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $feeStructureParameter->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#feestructureparameter_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#feestructures_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-ellipsis-v" style="padding-right: 5px;"></i>Related Fee Structures
              </a>
            </li> 
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="feestructureparameter_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fas fa-ellipsis-v" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table>
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($feeStructureParameter->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Code:') ?></th>
                                        <td><?= h($feeStructureParameter->code) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($feeStructureParameter->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($feeStructureParameter->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="feestructures_related">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Fee Structure Parameter') ?></th>
                                        <th><?= __('Amount') ?></th>
                                        <th><?= __('Fee') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $total = 0;
                                    foreach ($feeStructureParameter->fee_structures as $fee_structures) : 
                                    $total = $total + $fee_structures->amount;
                                    ?>
                                    <tr>
                                        <td><?= h($fee_structures->id) ?></td>
                                        <td><?= $this->Html->link($fee_structures->fee_structure_parameter->name, ['controller' => 'Fees', 'action' => 'view', $fee_structures->fee->id, '?'=>['tab'=>'feestructure']]) ?></td>
                                        <td><?= h($fee_structures->amount) ?></td>
                                        <td><?= h($fee_structures->fee->fee_code) ?></td>
                                        <td><?= h($fee_structures->created) ?></td>
                                        <td><?= h($fee_structures->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Fees', 'action' => 'view', $fee_structures->fee->id, '?'=>['tab'=>'feestructure']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><?= __('Total') ?></th>
                                        <th><?= __('') ?></th>
                                        <th><?= h($total) ?></th>
                                        <th><?= __('') ?></th>
                                        <th><?= __('') ?></th>
                                        <th><?= __('') ?></th>
                                        <th class="actions"><?= __('') ?></th>
                                    </tr>    
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
