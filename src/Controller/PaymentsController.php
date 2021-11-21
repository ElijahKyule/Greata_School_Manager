<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Paymentmodes', 'Users'],
        ];
        $payments = $this->paginate($this->Payments);

        $this->set(compact('payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['Students', 'Paymentmodes', 'Users'],
        ]);

        $this->set(compact('payment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $payment = $this->Payments->newEmptyEntity();

        if ($this->request->is('post'))
        {
            $student_id = $this->request->getData('student_id');
            $authenticate_payments = $this->Payments->find()
                ->select(['id'])
                ->where(['student_id' => $student_id])
                ->count();
            if ($authenticate_payments == 0) 
            {
                $payment = $this->Payments->patchEntity($payment, $this->request->getData());
                $payment->debit = 0.00;
                $payment->balance = $payment->debit - $payment->credit; 

                if ($this->Payments->save($payment)) 
                {
                    $this->Flash->success(__('The payment has been saved.'));

                    return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'payments']]);
                }
            }
            else
            {
                $ids = $this->Payments->find()
                    ->select(['id'=>'MAX(id)'])
                    ->where(['student_id'=>$student_id])
                    ->toArray();
                $id = $ids[0]->id;
                $fee_balance = $this->Payments->find()
                    ->select(['balance'])
                    ->where(['id'=>$id])
                    ->first();
                $fee_balance = $fee_balance->balance;
                $payment = $this->Payments->patchEntity($payment, $this->request->getData());
                $payment->debit = 0.00;
                $payment->balance = $fee_balance - $payment->credit; 

                if ($this->Payments->save($payment)) 
                {
                    $this->Flash->success(__('The payment has been saved.'));

                    return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'payments']]);
                }
                
            }
            
            
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }

        $students = $this->Payments->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
        $paymentmodes = $this->Payments->Paymentmodes->find('list', ['limit' => 200]);
        $users = $this->Payments->Users->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'students', 'paymentmodes', 'users', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $payment = $this->Payments->get($id, [
            'contain' => [],
        ]);
        $student_id = $this->Payments->find()
            ->select(['student_id'])
            ->where(['id'=>$id])
            ->first();
        $student_id = $student_id->student_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $balance = $this->Payments->find()
                ->select(['balance'])
                ->where(['id'=>$id])
                ->first();
            $balance = $balance->balance;

            $initial_credit = $this->Payments->find()
                ->select(['credit'])
                ->where(['id'=>$id])
                ->first();
            $initial_credit = $initial_credit->credit;
            $new_credit = $this->request->getData('credit');
            $change = $new_credit - $initial_credit;
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            $payment->debit = 0.00;
            $payment->balance = $balance - $change;
            
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'payments']]);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }

        $students = $this->Payments->Students->find('list', ['limit' => 200])->where(['id'=>$student_id]);
        $paymentmodes = $this->Payments->Paymentmodes->find('list', ['limit' => 200]);
        $users = $this->Payments->Users->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'students', 'paymentmodes', 'users', 'student_id'));
    }

    public function invoiceStudent($id)
    {
        $this->loadModel('FeeStructures');
        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $student_id = $id;
            $fee_id = $this->request->getData('fee_id');
            $authenticate_fee = $this->FeeStructures->find()
                ->select(['id'])
                ->where(['fee_id' => $fee_id])
                ->count();
            if ($authenticate_fee > 0) 
            {
                $fee_payable = $this->FeeStructures->find()
                    ->select(['sum'=>'SUM(amount)'])
                    ->where(['fee_id' => $fee_id])
                    ->toArray();
                $fee_payable = $fee_payable[0]->sum;
                $authenticate_payments = $this->Payments->find()
                    ->select(['id'])
                    ->where(['student_id' => $student_id])
                    ->count();
                
                if ($authenticate_payments == 0) 
                {
                    $payment = $this->Payments->patchEntity($payment, $this->request->getData());
                    $payment->student_id = $student_id;
                    $payment->debit = $fee_payable;
                    $payment->credit = 0.00;
                    $payment->balance = $fee_payable;

                    if ($this->Payments->save($payment)) 
                    {
                        $this->Flash->success(__('The payment has been saved.'));

                        return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'payments']]);
                    }
               
                    $this->Flash->error(__('The invoice adjustment could not be saved. Please, try again.'));
                } 
                else
                {
                    $ids = $this->Payments->find()
                        ->select(['id'=>'MAX(id)'])
                        ->where(['student_id'=>$student_id])
                        ->toArray();
                    $id = $ids[0]->id;
                    $fee_balance = $this->Payments->find()
                        ->select(['balance'])
                        ->where(['id'=>$id])
                        ->first();
                    $fee_balance = $fee_balance->balance;
                    $payment = $this->Payments->patchEntity($payment, $this->request->getData());
                    $payment->student_id = $student_id;
                    $payment->debit = $fee_payable;
                    $payment->credit = 0.00;
                    $payment->balance = $fee_balance + $fee_payable;

                    if ($this->Payments->save($payment)) 
                    {
                        $this->Flash->success(__('The payment has been saved.'));

                        return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'payments']]);
                    }
               
                    $this->Flash->error(__('The invoice adjustment could not be saved. Please, try again.'));
                }
            } 
            elseif ($authenticate_fee == 0) 
            {
                $this->Flash->error(__('The invoice adjustment could not be saved. Set up the fee structure first.'));
                return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'payments']]);
            }          
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
 