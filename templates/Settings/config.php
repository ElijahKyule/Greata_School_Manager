<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setting $setting 
 */
?>

        <div class="row">
            <div class="col-md-3 col-xl-2">
              <div class="card border-primary"  style="margin-bottom:10px">
                <div class="card-header">
                  <h5 class="card-title mb-0 text-muted">System Configurations</h5>
                </div>

                <div class="list-group list-group-flush nav-tabs" id="mytabs" role="tablist">
                  <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account"role="tab">
                    <span><i class="fa fa-cog"></i></span> General
                  </a>
                  <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                    <span><i class="far fa-envelope-open"></i></span> Email Server
                  </a>
                  <a class="list-group-item list-group-item-action" data-toggle="list" href="#yourdata" role="tab">
                   <span><i class="fas fa-paper-plane"></i></span> SMS Server
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-9 col-xl-10">
              <div class="tab-content"> 
                <div class="tab-pane active" id="account" role="tabpanel">
                    <div class="card flex-fill border-primary"  style="margin-bottom:10px">
                        <div class="card-header info-box-text text-muted">
                            <span class="fa fa-cog"></span> General Settings
                        </div>
                        <div>
                            <div class="students form content">
                                <?= $this->Form->create($setting) ?>
                                <fieldset>
                                    <?php
                                        echo $this->Form->control('server_ip');
                                        echo $this->Form->control('institution_name');
                                        echo $this->Form->control('institution_short_name');
                                        echo $this->Form->control('phone_number');
                                        echo $this->Form->control('fax');
                                        echo $this->Form->control('email');
                                        echo $this->Form->control('postal_code');
                                        echo $this->Form->control('box');
                                        echo $this->Form->control('county');
                                        echo $this->Form->control('street');
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="card flex-fill border-primary"  style="margin-bottom:10px">
                        <div class="card-header info-box-text text-muted">
                            <span class="far fa-envelope-open"></span> Email Settings
                        </div>
                        <div>
                            <div class="students form content">
                                <?= $this->Form->create($setting) ?>
                                <fieldset>
                                    <?php
                                        echo $this->Form->control('email_provider');
                                        echo $this->Form->control('email_host');
                                        echo $this->Form->control('email_username');
                                        echo $this->Form->control('email_port');
                                        echo $this->Form->control('email_password');
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="tab-pane fade" id="yourdata" role="tabpanel">
                    <div class="card flex-fill border-primary" style="margin-bottom:10px">
                        <div class="card-header info-box-text text-muted">
                            <span class="fas fa-paper-plane"></span> SMS Gateway Settings
                        </div>
                        <div>
                           <div class="students form content">
                                <?= $this->Form->create($setting) ?>
                                <fieldset>
                                    <?php
                                        echo $this->Form->control('sms_balance');
                                        echo $this->Form->control('sms_provider');
                                        echo $this->Form->control('sms_Url');
                                        echo $this->Form->control('sms_API_Key');
                                        echo $this->Form->control('sms_username');
                                        echo $this->Form->control('sms_invoices');
                                        echo $this->Form->control('sms_receipts');
                                        echo $this->Form->control('sms_passwords');
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
