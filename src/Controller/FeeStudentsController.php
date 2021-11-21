<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FeeStudents Controller
 *
 * @property \App\Model\Table\FeeStudentsTable $FeeStudents
 * @method \App\Model\Entity\FeeStudent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeeStudentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fees', 'Students', 'Paymentmodes', 'Users'],
        ];
        $feeStudents = $this->paginate($this->FeeStudents);

        $this->set(compact('feeStudents'));
    }

    /**
     * View method
     *
     * @param string|null $id Fee Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feeStudent = $this->FeeStudents->get($id, [
            'contain' => ['Fees', 'Students', 'Paymentmodes', 'Users'],
        ]);

        $this->set(compact('feeStudent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $feeStudent = $this->FeeStudents->newEmptyEntity();

        if ($this->request->is('post')) {
            $this->loadModel('FeeStructures');
            $fee_id = $this->request->getData('fee_id');
            $authenticate_fee_structure = $this->FeeStructures->find()
                ->select(['id'])
                ->where(['fee_id' => $fee_id])
                ->count();
            if ($authenticate_fee_structure >=1) 
            {
                //check  if payments for the fee program are being done for the first time
                $other_initial_payments = $this->FeeStudents->find()
                    ->select(['id'])
                    ->where(['fee_id' => $fee_id, 'student_id'=>$id])
                    ->count();
                if ($other_initial_payments == 0) 
                { 
                    $fee_payable = $this->FeeStructures->find()
                        ->select(['sum'=>'SUM(amount)'])
                        ->where(['fee_id' => $fee_id])
                        ->toArray();
                    $fee_payable = $fee_payable[0]->sum;
                    $fee_paid = $this->request->getData('fee_paid');
    
                    $feeStudent = $this->FeeStudents->patchEntity($feeStudent, $this->request->getData());
                    $feeStudent->paymentmode_id = 4;
                    $feeStudent->fee_paid = 0.00;
                    $feeStudent->fee_balance = $fee_payable;
                    $feeStudent->receipt_number = "N/A";
                    $place_invoice = $this->FeeStudents->save($feeStudent);

                    $feeStudent = $this->FeeStudents->newEmptyEntity();
                    $fee_balance = $fee_payable - $fee_paid;
                    $feeStudent = $this->FeeStudents->patchEntity($feeStudent, $this->request->getData());
                    $feeStudent->fee_balance = $fee_balance; 
                    $pay_fees = $this->FeeStudents->save($feeStudent);
                        
                    if (($place_invoice) && ($pay_fees)) 
                    {
                        $this->Flash->success(__('The fee payment has been saved.'));
                        return $this->redirect(['controller'=>'Students', 'action' => 'view', $id]);
                    }
                }
                else
                {
                    $fee_balance = $this->FeeStudents->find()
                        ->select(['fee_balance'=>'MIN(fee_balance)'])
                        ->where(['fee_id' => $fee_id, 'student_id'=>$id])
                        ->toArray();
                    $fee_balance = $fee_balance[0]->fee_balance;
                    
                    if ($fee_balance == 0) 
                    {
                        # code...
                    }
                    $fee_paid = $this->request->getData('fee_paid');
                    if ($fee_paid <= $fee_balance) 
                    {
                        $fee_balance = $fee_balance - $fee_paid;
                        $feeStudent = $this->FeeStudents->patchEntity($feeStudent, $this->request->getData());
                        $feeStudent->fee_balance = $fee_balance; 
                        if ($this->FeeStudents->save($feeStudent)) 
                        {
                            $this->Flash->success(__('The fee payment has been saved.'));
                            return $this->redirect(['controller'=>'Students', 'action' => 'view', $id]);
                        }
                    }
                    else
                    {
                        $this->Flash->error(__('The fee payment could not be saved. Please, pay an amount of upto '.$fee_balance));
                    }
                }
            }
             else 
            {
                $this->Flash->error(__('The fee student could not be saved. Please, set fee structure and try again.'));
            }
            
        }

        $current_class_ids = $this->loadModel('ClassroomStudents')->find()
                ->select(['classroom_id'])
                ->where(['classroomstatus_id' => 1, 'student_id'=> $id])
                ->first();
        $current_class_id = $current_class_ids->classroom_id;
        $current_level_ids = $this->loadModel('Classrooms')->find()
                ->select(['level_id'])
                ->where(['id' => $current_class_id])
                ->first();
        $current_level_id = $current_level_ids->level_id;
        $fees = $this->FeeStudents->Fees->find('list', ['limit' => 200])->where(['level_id'=>$current_level_id, 'status_id'=>1]);
        $students = $this->FeeStudents->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
        $paymentmodes = $this->FeeStudents->Paymentmodes->find('list', ['limit' => 200]);
        $users = $this->FeeStudents->Users->find('list', ['limit' => 200]);
        $this->set(compact('feeStudent', 'fees', 'students', 'paymentmodes', 'users'));
    }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    //  */
    // public function add($id)
    // {
    //     $feeStudent = $this->FeeStudents->newEmptyEntity();

    //     if ($this->request->is('post')) {
    //         $this->loadModel('FeeStructures');
    //         $fee_id = $this->request->getData('fee_id');
    //         $authenticate_fee_structure = $this->FeeStructures->find()
    //             ->select(['id'])
    //             ->where(['fee_id' => $fee_id])
    //             ->count();
    //         if ($authenticate_fee_structure >=1) 
    //         {
    //             //check  if payments for the fee program are being done for the first time
    //             $other_initial_payments = $this->FeeStudents->find()
    //                 ->select(['id'])
    //                 ->where(['fee_id' => $fee_id, 'student_id'=>$id])
    //                 ->count();
    //             if ($other_initial_payments == 0) 
    //             { 
    //                 $fee_payable = $this->FeeStructures->find()
    //                     ->select(['sum'=>'SUM(amount)'])
    //                     ->where(['fee_id' => $fee_id])
    //                     ->toArray();
    //                 $fee_payable = $fee_payable[0]->sum;
    //                 $fee_paid = $this->request->getData('fee_paid');
    //                 if ($fee_paid <= $fee_payable) 
    //                 {
    //                     $feeStudent = $this->FeeStudents->patchEntity($feeStudent, $this->request->getData());
    //                     $feeStudent->paymentmode_id = 4;
    //                     $feeStudent->fee_paid = 0.00;
    //                     $feeStudent->fee_balance = $fee_payable;

    //                     $place_invoice = $this->FeeStudents->save($feeStudent);

    //                     $feeStudent = $this->FeeStudents->newEmptyEntity();
    //                     $fee_balance = $fee_payable - $fee_paid;
    //                     $feeStudent = $this->FeeStudents->patchEntity($feeStudent, $this->request->getData());
    //                     $feeStudent->fee_balance = $fee_balance; 


    //                     $pay_fees = $this->FeeStudents->save($feeStudent);
    //                     pr($feeStudent->getErrors());
    //                     exit();

    //                     if (($place_invoice) && ($pay_fees)) 
    //                     {
    //                         $this->Flash->success(__('The fee payment has been saved.'));
    //                         return $this->redirect(['controller'=>'Students', 'action' => 'view', $id]);
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $this->Flash->error(__('The fee payment could not be saved. Please, pay an amount of upto '.$fee_payable));
    //                 }
    //             }
    //             else
    //             {
    //                 $fee_balance = $this->FeeStudents->find()
    //                     ->select(['fee_balance'=>'MIN(fee_balance)'])
    //                     ->where(['fee_id' => $fee_id, 'student_id'=>$id])
    //                     ->toArray();
    //                 $fee_balance = $fee_balance[0]->fee_balance;
    //                 $fee_paid = $this->request->getData('fee_paid');
    //                 if ($fee_paid <= $fee_balance) 
    //                 {
    //                     $fee_balance = $fee_balance - $fee_paid;
    //                     $feeStudent = $this->FeeStudents->patchEntity($feeStudent, $this->request->getData());
    //                     $feeStudent->fee_balance = $fee_balance; 
    //                     if ($this->FeeStudents->save($feeStudent)) 
    //                     {
    //                         $this->Flash->success(__('The fee payment has been saved.'));
    //                         return $this->redirect(['controller'=>'Students', 'action' => 'view', $id]);
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $this->Flash->error(__('The fee payment could not be saved. Please, pay an amount of upto '.$fee_balance));
    //                 }
    //             }
    //         }
    //          else 
    //         {
    //             $this->Flash->error(__('The fee student could not be saved. Please, set fee structure and try again.'));
    //         }
            
    //     }

    //     $current_class_ids = $this->loadModel('ClassroomStudents')->find()
    //             ->select(['classroom_id'])
    //             ->where(['classroomstatus_id' => 1, 'student_id'=> $id])
    //             ->first();
    //     $current_class_id = $current_class_ids->classroom_id;
    //     $current_level_ids = $this->loadModel('Classrooms')->find()
    //             ->select(['level_id'])
    //             ->where(['id' => $current_class_id])
    //             ->first();
    //     $current_level_id = $current_level_ids->level_id;
    //     $fees = $this->FeeStudents->Fees->find('list', ['limit' => 200])->where(['level_id'=>$current_level_id, 'status_id'=>1]);
    //     $students = $this->FeeStudents->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
    //     $paymentmodes = $this->FeeStudents->Paymentmodes->find('list', ['limit' => 200]);
    //     $users = $this->FeeStudents->Users->find('list', ['limit' => 200]);
    //     $this->set(compact('feeStudent', 'fees', 'students', 'paymentmodes', 'users'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Fee Student id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feeStudent = $this->FeeStudents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feeStudent = $this->FeeStudents->patchEntity($feeStudent, $this->request->getData());
            if ($this->FeeStudents->save($feeStudent)) {
                $this->Flash->success(__('The fee student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee student could not be saved. Please, try again.'));
        }
        $fees = $this->FeeStudents->Fees->find('list', ['limit' => 200]);
        $students = $this->FeeStudents->Students->find('list', ['limit' => 200]);
        $paymentmodes = $this->FeeStudents->Paymentmodes->find('list', ['limit' => 200]);
        $users = $this->FeeStudents->Users->find('list', ['limit' => 200]);
        $this->set(compact('feeStudent', 'fees', 'students', 'paymentmodes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fee Student id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feeStudent = $this->FeeStudents->get($id);
        if ($this->FeeStudents->delete($feeStudent)) {
            $this->Flash->success(__('The fee student has been deleted.'));
        } else {
            $this->Flash->error(__('The fee student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
