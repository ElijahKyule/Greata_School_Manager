<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grade $grade
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($grade->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $grade->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="grades view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Grade:') ?></th>
                    <td><?= h($grade->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Upper Bound:') ?></th>
                    <td><?= $this->Number->format($grade->upper_bound) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lower Bound:') ?></th>
                    <td><?= $this->Number->format($grade->lower_bound) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comments:') ?></th>
                    <td><?= $this->Number->format($grade->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($grade->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($grade->modified) ?></td>
                </tr>
            </table>
            </div>
          </div>
       
        </div>
    </div>