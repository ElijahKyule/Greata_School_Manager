    <div>  
      <div class="content-head" style="margin-right: 10px; margin-left: 10px;">
        <div class = "pull-left">
            <h4 class="heading">
              <i class="fa fa-home"></i>
              <?= __(' Home') ?>
            </h4>
        </div>
      </div>

      <div style="margin-left: 10px !important; margin-top: 10px !important;">
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-3" style=" padding-right: 0px;">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="far fa-file-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Subjects</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link($subjectsTotal, ['controller'=>'Students', 'action' => 'viewSubjects', $this->Identity->get('id')]) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-3" style="padding-right: 0px;">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fas fa-comment-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Messages</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link($unreadmsgsTotal.' unread', ['controller'=>'Students', 'action' => 'viewMessages', $this->Identity->get('id')]) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-3" style=" padding-right: 0px;">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fas fa-wheelchair"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Activities</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link($activitiesTotal, ['controller'=>'Students', 'action' => 'viewActivities', $this->Identity->get('id')]) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-3" style=" padding-right: 0px;">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-landmark"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Current Class</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $currentClass ?>
                </small>
              </span>
            </div>
          </div>
        </div>
      </div>
      </div>
      
      <div style="margin-left: 25px !important; margin-right: 10px !important;">
        <div class="row">
          <div class=" col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
            <div class="card border-primary flex-fill"  style="overflow-x: auto; margin-right: 5px;">
              <div class="card-header info-box-text text-muted"style="color:blue"><span class="far fa-comment-alt"></span> Message Box</div>
              <div class="card-body">
                            <div class="table-responsive">
                              <table class='' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('#') ?></th>
                                        <th><?= $this->Paginator->sort('title') ?></th>
                                        <th><?= $this->Paginator->sort('sender') ?></th>
                                        <th><?= $this->Paginator->sort('status') ?></th>
                                        <th><?= $this->Paginator->sort('date') ?></th>
                                        <th><?= $this->Paginator->sort('read') ?></th>
                                        <th><?= $this->Paginator->sort('delete') ?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $counter = 0;  
                                    foreach ($messages as $message):
                                        $counter = $counter +1;
                                    ?>
                                    <tr>
                                        <td><?= h($counter) ?></td>
                                        <td><?= h($message->title) ?></td>
                                        <td><?= h($message->sender) ?></td>
                                        <td><?= h($message->status) ?></td>
                                        <td><?= h($message->created) ?></td>
                                        <td class="actions">
                                          <button href="#read_<?= h($message->id) ?>" data-toggle="modal" class="btn btn-xs btn-default" name=""><i class="far fa-envelope-open" title="Read Message"></i></button>
                                          <!-- <?= $this->Html->link('', [$message->id], ['class'=>'far fa-envelope-open btn btn-xs btn-default', 'title'=>'Read Message', 'data-toggle'=>'modal']) ?> --> 
                                          <!-- start message modal -->
                                          <div class="modal fade" id="read_<?= h($message->id) ?>" tabindex="-1" role="dialog" aria-labelledby="NewMessage" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                  <h5 class="modal-title text-muted" id="NewMessage">From: <i><?= h($message->sender) ?></i>.</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <p class="text-center"><strong>Subject:</strong> <i><?= h($message->title) ?></i></p>
                                                  <p class="text-center"><?= h($message->body) ?></p>
                                                  <p class="text-center"><strong>Time:</strong> <i><?= h($message->created) ?></i>.</p>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                  <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                                                    <div class="flex-fill" style="position:relative;">
                                                      <?= $this->Form->create($student,["url"=>['controller'=>'Students', "action"=>"readMsg", $id]]) ?>
                                                      <?php echo $this->Form->control('msg', ['default' => $message->id, 'type'=>'hidden']); ?>
                                                      <?= $this->Form->button(__(' Close'), ['class'=>'btn btn-danger']) ?>
                                                    </div>
                                                    <?= $this->Form->end() ?>
                                                </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div><!-- end message modal -->
                                        </td>
                                        <td class="actions">
                                            <?= $this->Form->postLink('', ['controller'=>'Students', 'action' => 'deleteMsg', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>
              </div>
            </div>
          </div>

          <div class=" col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 20px">
            <div class="card border-primary flex-fill"  style="overflow-x: auto; margin-left: 5px;">
              <div class="card-header info-box-text text-muted"><span class="fas fa-wheelchair"></span> My Activities</div>
              <div class="card-body">
                            <div class="table-responsive">
                                <table class='' width="100%" style="background-color: ">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('#') ?></th>
                                        <th><?= $this->Paginator->sort('activity_id') ?></th>
                                        <th><?= $this->Paginator->sort('start') ?></th>
                                        <th><?= $this->Paginator->sort('end') ?></th>
                                        <th><?= $this->Paginator->sort('achieved') ?></th>
                                        <th><?= $this->Paginator->sort('measure') ?></th>
                                        <th><?= $this->Paginator->sort('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $counter = 0;  
                                    foreach ($student->student_activities as $student_activity): 
                                      $counter = $counter +1;
                                    ?>
                                    <tr>
                                        <td><?= h($counter) ?></td>
                                        <td><?= h($student_activity->activity->name) ?></td>
                                        <td><?= h($student_activity->start) ?></td>
                                        <td><?= h($student_activity->end) ?></td>
                                        <td><?= h($student_activity->achieved) ?></td>
                                        <td><?= h($student_activity->measure->name) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'StudentActivities', 'action'=>'view', $student_activity->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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
      
      <div style="margin-left: 25px !important; margin-right: 10px !important;">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px">
            <div class="card border-primary flex-fill">
              <div class="card-header info-box-text text-muted"><span class="far fa-calendar-alt"></span> Calendar</div>
              <div class="card-body d-flex">
                <div class="w-100">
                  <div id='calendar'></div>
                </div>
              </div>
             </div>
          </div>
        </div>
      </div>
      </div>