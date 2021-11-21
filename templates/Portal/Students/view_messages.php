<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubject $studentSubject
 */
?>
                    <div class="card flex-fill card-body col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding: 10px !important">
                        <div class = "pull-left">
                            <h4 class="heading info-box-text text-muted">
                              <i class="fas fa-comment-alt"></i>&nbsp;&nbsp;
                              <?= __(' My Messages') ?></h4>
                        </div>
                    </div>
    
                    <div class="content">
                        <div class="card flex-fill card-body">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('#') ?></th>
                                        <th><?= $this->Paginator->sort('title') ?></th>
                                        <th><?= $this->Paginator->sort('sender') ?></th>
                                        <th><?= $this->Paginator->sort('message_status') ?></th>
                                        <th><?= $this->Paginator->sort('date') ?></th>
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th><?= $this->Paginator->sort('read') ?></th>
                                        <th><?= $this->Paginator->sort('delete') ?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $counter = 0;  
                                    foreach ($student->messages as $message):
                                        $counter = $counter +1;
                                    ?>
                                    <tr>
                                        <td><?= h($counter) ?></td>
                                        <td><?= h($message->title) ?></td>
                                        <td><?= h($message->user->name) ?></td>
                                        <td><?= h($message->messagestatus->name) ?></td>
                                        <td><?= h($message->created) ?></td>
                                        <td><?= h($message->modified) ?></td>
                                        <td class="actions">
                                          <button href="#read_<?= h($message->id) ?>" data-toggle="modal" class="btn btn-xs btn-default" name=""><i class="far fa-envelope-open" title="Read Message"></i></button>
                                          <!-- <?= $this->Html->link('', [$message->id], ['class'=>'far fa-envelope-open btn btn-xs btn-default', 'title'=>'Read Message', 'data-toggle'=>'modal']) ?> --> 
                                          <!-- start message modal -->
                                          <div class="modal fade" id="read_<?= h($message->id) ?>" tabindex="-1" role="dialog" aria-labelledby="NewMessage" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header bg-light">
                                                  <h5 class="modal-title text-muted" id="NewMessage">From: <i><?= h($message->user->name) ?></i>.</h5>
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
                                                      <?= $this->Form->create($student,["url"=>['controller'=>'Students', "action"=>"readMessage", $id]]) ?>
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
                                            <?= $this->Form->postLink('', ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>