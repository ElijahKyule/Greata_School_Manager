<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement $announcement
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($announcement->title) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Users', 'action' => 'view', $auth_user, '?'=>['tab'=>'announcements']], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="announcements view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Announcement Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Code:') ?></th>
                    <td><?= h($announcement->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title:') ?></th>
                    <td><?= h($announcement->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Body:') ?></th>
                    <td><?= $this->Text->autoParagraph(h($announcement->body)); ?></td>
                </tr>
                <tr>
                    <th><?= __('User:') ?></th>
                    <td><?= h($announcement->user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($announcement->messagestatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($announcement->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($announcement->modified) ?></td>
                </tr>
            </table>
            </div>
          </div>
       
        </div>
    </div>