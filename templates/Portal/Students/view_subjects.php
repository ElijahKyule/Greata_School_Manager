<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubject $studentSubject
 */
?>
                    <div class="card flex-fill card-body col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding: 10px !important">
                        <div class = "pull-left">
                            <h4 class="heading info-box-text text-muted">
                              <i class="fas fa-file-alt"></i>&nbsp;&nbsp;
                              <?= __(' My Subjects') ?></h4>
                        </div>
                    </div>
    
                    <div class="content">
                        <div class="card flex-fill card-body">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Paginator->sort('#') ?></th>
                                            <th><?= $this->Paginator->sort('subject_id') ?></th>
                                            <th><?= $this->Paginator->sort('subject_code') ?></th>
                                            <th><?= $this->Paginator->sort('subject_teacher') ?></th>
                                            <th><?= $this->Paginator->sort('created') ?></th>
                                            <th><?= $this->Paginator->sort('modified') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $counter = 0;
                                        foreach ($student->student_subjects as $studentSubject): 
                                            $counter = $counter +1;
                                        ?>
                                        <tr>
                                            <td><?= h($counter) ?></td>
                                            <td><?= h($studentSubject->subject->name) ?></td>
                                            <td><?= h($studentSubject->subject->code) ?></td>
                                            <td><?= h($studentSubject->subject->user->name) ?></td>
                                            <td><?= h($studentSubject->created) ?></td>
                                            <td><?= h($studentSubject->modified) ?></td>
                                        </tr> 
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>