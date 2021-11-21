 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting[]|\Cake\Collection\CollectionInterface $settings
 */
?>
<div class="settings index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Settings') ?></h3>
</div>
<div class="settings index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('server_ip') ?></th>
                    <th><?= $this->Paginator->sort('institution_name') ?></th>
                    <th><?= $this->Paginator->sort('institution_short_name') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('fax') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('postal_code') ?></th>
                    <th><?= $this->Paginator->sort('box') ?></th>
                    <th><?= $this->Paginator->sort('county') ?></th>
                    <th><?= $this->Paginator->sort('street') ?></th>
                    <th><?= $this->Paginator->sort('email_provider') ?></th>
                    <th><?= $this->Paginator->sort('email_host') ?></th>
                    <th><?= $this->Paginator->sort('email_username') ?></th>
                    <th><?= $this->Paginator->sort('email_port') ?></th>
                    <th><?= $this->Paginator->sort('email_password') ?></th>
                    <th><?= $this->Paginator->sort('sms_balance') ?></th>
                    <th><?= $this->Paginator->sort('sms_provider') ?></th>
                    <th><?= $this->Paginator->sort('sms_Url') ?></th>
                    <th><?= $this->Paginator->sort('sms_API_Key') ?></th>
                    <th><?= $this->Paginator->sort('sms_username') ?></th>
                    <th><?= $this->Paginator->sort('sms_invoices') ?></th>
                    <th><?= $this->Paginator->sort('sms_receipts') ?></th>
                    <th><?= $this->Paginator->sort('sms_passwords') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($settings as $setting): ?>
                <tr>
                    <td><?= $this->Number->format($setting->id) ?></td>
                    <td><?= h($setting->server_ip) ?></td>
                    <td><?= h($setting->institution_name) ?></td>
                    <td><?= h($setting->institution_short_name) ?></td>
                    <td><?= h($setting->phone_number) ?></td>
                    <td><?= h($setting->fax) ?></td>
                    <td><?= h($setting->email) ?></td>
                    <td><?= h($setting->postal_code) ?></td>
                    <td><?= h($setting->box) ?></td>
                    <td><?= h($setting->county) ?></td>
                    <td><?= h($setting->street) ?></td>
                    <td><?= h($setting->email_provider) ?></td>
                    <td><?= h($setting->email_host) ?></td>
                    <td><?= h($setting->email_username) ?></td>
                    <td><?= h($setting->email_port) ?></td>
                    <td><?= h($setting->email_password) ?></td>
                    <td><?= h($setting->sms_balance) ?></td>
                    <td><?= h($setting->sms_provider) ?></td>
                    <td><?= h($setting->sms_Url) ?></td>
                    <td><?= h($setting->sms_API_Key) ?></td>
                    <td><?= h($setting->sms_username) ?></td>
                    <td><?= h($setting->sms_invoices) ?></td>
                    <td><?= h($setting->sms_receipts) ?></td>
                    <td><?= h($setting->sms_passwords) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $setting->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $setting->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
