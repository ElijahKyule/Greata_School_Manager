<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fee $fee
 */
?>
    <div class="content-head index" style="overflow: auto">
        <div class="pull-left">
            <h3><?= h($fee->fee_code) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $fee->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
 <?php
$tab_fee_details_status = 'active';
$tab_fee_structure_status = '';

if ($tab == 'feestructure') 
{
    $tab_fee_details_status = '';
    $tab_fee_structure_status = 'active';

}
?>
    <div class="fees view content" style="overflow: auto;">
      <div id="content" >
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#fee_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#fee_structure" data-toggle="tab"class="btn btn-link"  style="font-size: 13px;">
                <i class="far fa-file-alt" style="padding-right: 5px;"></i>Fee Structure
              </a>
            </li>
        </ul>
        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane <?= $tab_fee_details_status ?>" id="fee_details">
                <div class="flex-fill">
                <div class="card card-body d-flex table-responsive" style="padding-top: 0;"> 
                    <table>
                        <tr>
                            <th><?= __('Fee Code:') ?></th>
                            <td><?= h($fee->fee_code) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Level:') ?></th>
                            <td><?= h($fee->level->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Term:') ?></th>
                            <td><?= h($fee->term->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Year:') ?></th>
                            <td><?= $this->Number->format($fee->year) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status:') ?></th>
                            <td><?= h($fee->status->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created:') ?></th>
                            <td><?= h($fee->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified:') ?></th>
                            <td><?= h($fee->modified) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Description:') ?></th>
                            <td><?= $this->Text->autoParagraph(h($fee->description)); ?></td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_fee_structure_status ?>" id="fee_structure">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add Fee Structure Parameter to Fee:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'FeeStructures', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('fee_structure_parameter_id') ?></th>
                                        <th><?= $this->Paginator->sort('amount') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    $total = 0;
                                    foreach ($feeStructures as $feeStructure):
                                    $total = $total + $feeStructure->amount;
                                    ?>

                                    <tr>
                                        <td><?= $feeStructure->has('fee_structure_parameter') ? $this->Html->link($feeStructure->fee_structure_parameter->name, ['controller' => 'FeeStructures', 'action' => 'view', $feeStructure->id]) : '' ?></td>
                                        <td><?= $this->Number->format($feeStructure->amount) ?></td>
                                        <td><?= h($feeStructure->created) ?></td>
                                        <td><?= h($feeStructure->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'FeeStructures', 'action' => 'view', $feeStructure->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller'=>'FeeStructures', 'action' => 'edit', $feeStructure->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'FeeStructures', 'action' => 'delete', $feeStructure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeStructure->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                       <th><?= h('Total:') ?></th> 
                                       <th><?= $this->Number->format($total) ?></th> 
                                       <th><?= h('') ?></th> 
                                       <th><?= h('') ?></th> 
                                       <th><?= h('') ?></th> 
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