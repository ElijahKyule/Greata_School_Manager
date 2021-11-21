<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($setting->id) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $setting->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="settings view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Server Ip') ?></th>
                    <td><?= h($setting->server_ip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Institution Name') ?></th>
                    <td><?= h($setting->institution_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Institution Short Name') ?></th>
                    <td><?= h($setting->institution_short_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($setting->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fax') ?></th>
                    <td><?= h($setting->fax) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($setting->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postal Code') ?></th>
                    <td><?= h($setting->postal_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Box') ?></th>
                    <td><?= h($setting->box) ?></td>
                </tr>
                <tr>
                    <th><?= __('County') ?></th>
                    <td><?= h($setting->county) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($setting->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Provider') ?></th>
                    <td><?= h($setting->email_provider) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Host') ?></th>
                    <td><?= h($setting->email_host) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Username') ?></th>
                    <td><?= h($setting->email_username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Port') ?></th>
                    <td><?= h($setting->email_port) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Password') ?></th>
                    <td><?= h($setting->email_password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms Balance') ?></th>
                    <td><?= h($setting->sms_balance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms Provider') ?></th>
                    <td><?= h($setting->sms_provider) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms Url') ?></th>
                    <td><?= h($setting->sms_Url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms API Key') ?></th>
                    <td><?= h($setting->sms_API_Key) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms Username') ?></th>
                    <td><?= h($setting->sms_username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms Invoices') ?></th>
                    <td><?= h($setting->sms_invoices) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms Receipts') ?></th>
                    <td><?= h($setting->sms_receipts) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sms Passwords') ?></th>
                    <td><?= h($setting->sms_passwords) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($setting->id) ?></td>
                </tr>
            </table>
        </div>
    </div>