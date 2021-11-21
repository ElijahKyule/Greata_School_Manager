<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
        <div class="card flex-fill card-body col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding: 10px !important; margin-left: -6px">
            <div class = "pull-left">
                <h4 class="heading info-box-text text-muted">
                <i class="fa fa-user"></i>&nbsp;&nbsp;
                <?= __(' My Profile') ?></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xl-2">
              <div class="card border-primary"  style="margin-bottom:10px">
                <div class="card-header">
                  <h5 class="card-title mb-0 text-muted">My Profile</h5>
                </div>

                <div class="list-group list-group-flush nav-tabs" id="mytabs" role="tablist">
                  <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account"role="tab">
                    <span><i class="far fa-user-circle"></i></span> Account
                  </a>
                  <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                    <span><i class="fa fa-lock"></i></span> Manage Password
                  </a>
                  <a class="list-group-item list-group-item-action" data-toggle="list" href="#yourdata" role="tab">
                   <span><i class="fa fa-user-edit"></i></span> Update Info
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-9 col-xl-10">
              <div class="tab-content"> 
                <div class="tab-pane active" id="account" role="tabpanel">
                    <div class="card flex-fill border-primary"  style="margin-bottom:10px">
                        <div class="card-header info-box-text text-muted">
                            <span class="far fa-user-circle"></span> Account Info
                        </div>
                        <div class="row"  style="overflow-x:scroll">
                            <div class="card-body d-flex">
                                <div class="col-md-3 card" style="padding: 10px; margin: 20px; align-items: center; position: relative;">
                                    <?= @$this->Html->image($student->image, ['alt'=>'student Image']) ?> 
                                    <span class="info-box-text text-muted">Student Image</span>
                                </div>
                                <div class="col-md-8">
                                    <div class="table-responsive" >
                                    <table class='table table-striped table-condensed' width="100%">
                                        <tr>
                                            <th><?= __('Name:') ?></th>
                                            <td><?= h($student->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Email:') ?></th>
                                            <td><?= h($student->email) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Phone Number:') ?></th>
                                            <td><?= h($student->phone_number) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Admission Number:') ?></th>
                                            <td><?= h($student->admission_number) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Gender:') ?></th>
                                            <td><?= h($student->gender->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Address:') ?></th>
                                            <td><?= h($student->address) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Date Of Birth:') ?></th>
                                            <td><?= h($student->date_of_birth) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Student Status:') ?></th>
                                            <td><?= h($student->status->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Admission Date:') ?></th>
                                            <td><?= h($student->admission_date) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Created:') ?></th>
                                            <td><?= h($student->created) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Modified:') ?></th>
                                            <td><?= h($student->modified) ?></td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="card flex-fill border-primary"  style="margin-bottom:10px">
                        <div class="card-header info-box-text text-muted">
                            <span class="fa fa-lock"></span> Manage Password
                        </div>
                        <div>
                            <div class="students form content">
                                <?= $this->Form->create($student) ?>
                                <fieldset>
                                    <?php
                                        echo $this->Form->control('email');
                                        echo $this->Form->control('old_password', ['type'=>'password', 'required'=>'required']);
                                        echo $this->Form->control('new_password', ['type'=>'password', 'required'=>'required']); 
                                        echo $this->Form->control('verify_password', ['type'=>'password', 'required'=>'required']);
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
                            <span class="fa fa-user-edit"></span> Update Info
                        </div>
                        <div>
                           <div class="students form content">
                                <?= $this->Form->create($edit,["url"=>["controller"=>"Students", "action"=>"editDetails", $id]]) ?>
                                <fieldset>
                                    <?php
                                        echo $this->Form->control('phone_number', ['required'=>'required']);
                                        echo $this->Form->control('address', ['required'=>'required']);
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