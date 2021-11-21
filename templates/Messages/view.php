<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($message->title) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Students', 'action' => 'view', $message->student->id, '?'=>['tab'=>'messages'] ], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="messages view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Message Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Code:') ?></th>
                    <td><?= h($message->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title:') ?></th>
                    <td><?= h($message->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Body:') ?></th>
                    <td>
                    <?= $this->Text->autoParagraph(h($message->body)); ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Student:') ?></th>
                    <td><?= h($message->student->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sender:') ?></th>
                    <td><?= h($message->user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Message Status:') ?></th>
                    <td><?= h($message->messagestatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($message->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($message->modified) ?></td>
                </tr>
            </table>
            </div>
          </div>
        </div>
    </div>