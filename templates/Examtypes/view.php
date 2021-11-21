<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examtype $examtype
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($examtype->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $examtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examtype->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $examtype->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#examtype_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#exams_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-file-alt" style="padding-right: 5px;"></i>Related Exams
              </a>
            </li> 
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="examtype_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fas fa-file-alt" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table>
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($examtype->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Score Out Of:') ?></th>
                                        <td><?= $this->Number->format($examtype->score_out_of) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($examtype->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($examtype->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="exams_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add exam:
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
                                        <th><?= __('Exam Code') ?></th>
                                        <th><?= __('Title') ?></th>
                                        <th><?= __('Level') ?></th>
                                        <th><?= __('Year') ?></th>
                                        <th><?= __('Term') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($examtype->exams as $exams) : ?>
                                    <tr>
                                        <td><?= h($exams->id) ?></td>
                                        <td><?= $this->Html->link($exams->exam_code, ['controller' => 'Exams', 'action' => 'view', $exams->id]) ?></td>
                                        <td><?= h($exams->title) ?></td>
                                        <td><?= h($exams->level->name) ?></td>
                                        <td><?= h($exams->year) ?></td>
                                        <td><?= h($exams->term->name) ?></td>
                                        <td><?= h($exams->status->name) ?></td>
                                        <td><?= h($exams->created) ?></td>
                                        <td><?= h($exams->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Exams', 'action' => 'view', $exams->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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
