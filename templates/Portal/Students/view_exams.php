<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubject $studentSubject
 */
?>
                    <div class="card flex-fill card-body col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding: 10px !important">
                        <div class = "pull-left">
                            <h4 class="heading info-box-text text-muted">
                              <i class="fas fa-book-reader"></i>&nbsp;&nbsp;
                              <?= __(' Exams') ?></h4>
                        </div>
                    </div>
    
                    <div class="content">
                        <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                            <div class="flex-fill" style="margin-top: 5px; position:relative;">
                                <div class="pull-left" style="margin-right: 5px">
                                    <?= $this->Form->create($student,["url"=>["action"=>"viewExams", $id]]) ?>
                                    <?php echo $this->Form->control('exam_id', ['options' => $exams, 'label'=>'Filter marks by exams:', 'style'=>'width: 150px', 'empty'=>'Select..', 'required'=>'required']); ?>
                                </div>
                                <div class="">
                                    <?= $this->Form->button(__(' Filter'), ['class'=>'btn btn-outline-secondary', 'style'=>'height:29px']) ?>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                        <div class="card flex-fill card-body" style="clear:left;">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('subject') ?></th>
                                        <th><?= $this->Paginator->sort('code') ?></th>
                                        <th><?= $this->Paginator->sort('marks (%)') ?></th>
                                        <th><?= $this->Paginator->sort('grade') ?></th>
                                        <th><?= $this->Paginator->sort('teacher') ?></th>
                                        <th><?= $this->Paginator->sort('comments') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    $totalMarks = 0;  
                                    foreach ($studentSubjectMarks as $student_subject_mark): 
                                    $count = $count + 1;
                                    $totalMarks = $totalMarks + $student_subject_mark->marks;
                                    ?>
                                    <tr>
                                        <td><?= h($count) ?></td>
                                        <td><?= h($student_subject_mark->subject) ?></td>
                                        <td><?= h($student_subject_mark->code) ?></td>
                                        <td><?= h($student_subject_mark->marks) ?></td>
                                        <td><?= h($student_subject_mark->grade) ?></td>
                                        <td><?= h($student_subject_mark->user) ?></td>
                                        <td><?= h($student_subject_mark->comments) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot> 
                                    <tr>
                                        <th><?= h('Class Position:') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= $level_posn.' / '.$current_level_count ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                    </tr>
                                </tfoot>
                                <tfoot> 
                                    <tr>
                                        <th><?= h('Totals:') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= $totalMarks.' / '.$count * 100 ?></th>
                                        <?php
                                        $avg_score = '';
                                        $mean_grade = '';
                                        if ($count>0) 
                                        {
                                            $avg_score = ceil($totalMarks/($count));
                                            foreach ($grades as $grade) 
                                            {
                                                if (($avg_score >= $grade->lower_bound)&&($avg_score<=$grade->upper_bound)) 
                                                {
                                                    $mean_grade = $grade->name;
                                                }
                                            }
                                        }
                                        ?>
                                        <th><?= h($mean_grade) ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                    </tr>
                                </tfoot>
                                 <tfoot> 
                                    <tr>
                                        <th><?= h('Stream Position:') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= $stream_posn.' / '.$current_stream_count ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                    </div>