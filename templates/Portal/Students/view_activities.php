<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubject $studentSubject
 */
?>
                    <div class="card flex-fill card-body col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding: 10px !important">
                        <div class = "pull-left">
                            <h4 class="heading info-box-text text-muted">
                              <i class="fa fa-wheelchair"></i>&nbsp;&nbsp;
                              <?= __(' My Activities') ?></h4>
                        </div>
                    </div>
    
                    <div class="content">
                        <div class="card flex-fill card-body">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('#') ?></th>
                                        <th><?= $this->Paginator->sort('activity_id') ?></th>
                                        <th><?= $this->Paginator->sort('status_id') ?></th>
                                        <th><?= $this->Paginator->sort('start') ?></th>
                                        <th><?= $this->Paginator->sort('end') ?></th>
                                        <th><?= $this->Paginator->sort('achieved') ?></th>
                                        <th><?= $this->Paginator->sort('unit_of_measure') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th><?= $this->Paginator->sort('actions') ?></th>
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
                                        <td><?= h($student_activity->status->name) ?></td>
                                        <td><?= h($student_activity->start) ?></td>
                                        <td><?= h($student_activity->end) ?></td>
                                        <td><?= h($student_activity->achieved) ?></td>
                                        <td><?= h($student_activity->measure->name) ?></td>
                                        <td><?= h($student_activity->created) ?></td>
                                        <td><?= h($student_activity->modified) ?></td>
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