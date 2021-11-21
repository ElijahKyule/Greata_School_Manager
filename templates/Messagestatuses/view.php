<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Messagestatus $messagestatus
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($messagestatus->name) ?></h3>
        </div>
        <div class="pull-right">
             <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $messagestatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messagestatus->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $messagestatus->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#messagestatus_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#messages_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-comment-alt" style="padding-right: 5px;"></i>Messages
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#announcements_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-bell" style="padding-right: 5px;"></i>Announcements
              </a>
            </li> 
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="messagestatus_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fa fa-flag" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table width="100%">
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($messagestatus->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($messagestatus->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($messagestatus->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="messages_related">
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
                                        <th><?= __('Student') ?></th>
                                        <th><?= __('Sender') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($messagestatus->messages as $messages) : ?>
                                    <tr>
                                        <td><?= h($messages->id) ?></td>
                                        <td><?= $this->Html->link($messages->code, ['controller' => 'Students', 'action' => 'view', $messages->student->id, '?'=>['tab'=>'messages']]) ?></td>
                                        <td><?= h($messages->title) ?></td>
                                        <td><?= h($messages->student->name) ?></td>
                                        <td><?= h($messages->user->name) ?></td>
                                        <td><?= h($messages->created) ?></td>
                                        <td><?= h($messages->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Students', 'action' => 'view', $messages->student->id, '?'=>['tab'=>'messages']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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

            <div class="tab-pane" id="announcements_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add announcement:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Announcements', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
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
                                        <th><?= __('Sender') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($messagestatus->announcements as $announcement) : ?>
                                    <tr>
                                        <td><?= h($announcement->id) ?></td>
                                        <td><?= $this->Html->link($announcement->code, ['controller' => 'Announcements', 'action' => 'view', $announcement->id]) ?></td>
                                        <td><?= h($announcement->title) ?></td>
                                        <td><?= h($announcement->user->name) ?></td>
                                        <td><?= h($announcement->created) ?></td>
                                        <td><?= h($announcement->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Announcements', 'action' => 'view', $announcement->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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
