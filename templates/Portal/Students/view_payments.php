<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubject $studentSubject
 */
?>
                    <div class="card flex-fill card-body col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding: 10px !important">
                        <div class = "pull-left">
                            <h4 class="heading info-box-text text-muted">
                              <i class="fa fa-money"></i>&nbsp;&nbsp;
                              <?= __(' My Payments') ?></h4>
                        </div>
                    </div>
    
                    <div class="content">
                        <div class="card flex-fill card-body">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('#') ?></th>
                                        <th><?= __('Reference NO') ?></th>
                                        <th><?= __('Date') ?></th>
                                        <th><?= __('Debit (Expected)') ?></th>
                                        <th><?= __('Credit (Paid)') ?></th>
                                        <th><?= __('Balance') ?></th>
                                        <th><?= __('Payment Mode') ?></th>
                                        <th><?= __('Description') ?></th>
                                        <th><?= __('Authorized by') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $counter = 0;
                                    foreach ($student->payments as $payment) : 
                                        $counter = $counter +1;
                                        ?>
                                    <tr>
                                        <td><?= $counter ?></td>
                                        <td><?= h($payment->reference_number) ?></td>
                                        <td><?= h($payment->created) ?></td>
                                        <td><?= h($payment->debit) ?></td>
                                        <td><?= h($payment->credit) ?></td>
                                        <td><?= h($payment->balance) ?></td>
                                        <td><?= h($payment->paymentmode->name) ?></td>
                                        <td><?= h($payment->description) ?></td>
                                        <td><?= h($payment->user->name) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>