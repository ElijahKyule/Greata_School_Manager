<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level $level
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($level->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete # {0}?', $level->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $level->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#level_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#classrooms_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-landmark" style="padding-right: 5px;"></i>Classrooms
              </a>
            </li> 
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#exams_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="far fa-file-alt" style="padding-right: 5px;"></i>Exams
              </a>
            </li>  
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#fees_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-money" style="padding-right: 5px;"></i>Fees
              </a>
            </li>
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="level_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fa fa-cubes" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                               <table>
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($level->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Level Numeric:') ?></th>
                                        <td><?= $this->Number->format($level->level_numeric) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($level->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($level->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="classrooms_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related classroom:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Classrooms', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Stream') ?></th>
                                        <th><?= __('Class Teacher') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($level->classrooms as $classrooms) : ?>
                                    <tr>
                                        <td><?= h($classrooms->id) ?></td>
                                        <td><?= $this->Html->link($classrooms->name, ['controller' => 'Classrooms', 'action' => 'view', $classrooms->id]) ?></td>
                                        <td><?= h($classrooms->stream->name) ?></td>
                                        <td><?= h($classrooms->user->name) ?></td>
                                        <td><?= h($classrooms->created) ?></td>
                                        <td><?= h($classrooms->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Classrooms', 'action' => 'view', $classrooms->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="exams_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related exam:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Exams', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Code') ?></th>
                                        <th><?= __('Title') ?></th>
                                        <th><?= __('Exam Type') ?></th>
                                        <th><?= __('Year') ?></th>
                                        <th><?= __('Term') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Assigned To') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($level->exams as $exam) : ?>
                                    <tr>
                                        <td><?= h($exam->id) ?></td>
                                        <td><?= $this->Html->link($exam->exam_code, ['controller' => 'Exams', 'action' => 'view', $exam->id]) ?></td>
                                        <td><?= h($exam->title) ?></td>
                                        <td><?= h($exam->examtype->name) ?></td>
                                        <td><?= h($exam->year) ?></td>
                                        <td><?= h($exam->term->name) ?></td>
                                        <td><?= h($exam->status->name) ?></td>
                                        <td><?= h($exam->user->name) ?></td>
                                        <td><?= h($exam->created) ?></td>
                                        <td><?= h($exam->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Exams', 'action' => 'view', $exam->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="fees_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related fee:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Fees', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Code') ?></th>
                                        <th><?= __('Year') ?></th>
                                        <th><?= __('Term') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($level->fees as $fee) : ?>
                                    <tr>
                                        <td><?= h($fee->id) ?></td>
                                        <td><?= $this->Html->link($fee->fee_code, ['controller' => 'Fees', 'action' => 'view', $fee->id]) ?></td>
                                        <td><?= h($fee->year) ?></td>
                                        <td><?= h($fee->term->name) ?></td>
                                        <td><?= h($fee->status->name) ?></td>
                                        <td><?= h($fee->created) ?></td>
                                        <td><?= h($fee->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Fees', 'action' => 'view', $fee->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>