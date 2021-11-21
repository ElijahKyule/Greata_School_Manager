<?php
declare(strict_types=1);
  
namespace App\Controller;

/**
 * Fees Controller 
 *
 * @property \App\Model\Table\FeesTable $Fees
 * @method \App\Model\Entity\Fee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Levels', 'Statuses', 'Terms'],
        ];
        $fees = $this->paginate($this->Fees);

        $this->set(compact('fees'));
    }

    /**
     * View method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tab = $this->request->getQuery('tab');
        $fee = $this->Fees->get($id, [
            'contain' => ['Levels', 'FeeStudents'=>['Students', 'Paymentmodes', 'Users'], 'FeeStructures'=>['FeeStructureParameters'], 'Statuses', 'Terms'],
        ]);
        $this->paginate = [ 
            'contain' => ['Fees', 'FeeStructureParameters'],
            'conditions'=>['fee_id'=>$id]
        ];
        $FeeStructures = $this->loadModel('FeeStructures');
        $feeStructures = $this->paginate($this->FeeStructures);
        $this->set(compact('fee', 'id', 'feeStructures', 'tab'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fee = $this->Fees->newEmptyEntity();
        if ($this->request->is('post')) {
            $fee = $this->Fees->patchEntity($fee, $this->request->getData());
            if ($this->Fees->save($fee)) {
                $this->Flash->success(__('The fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee could not be saved. Please, try again.'));
        }
        $levels = $this->Fees->Levels->find('list', ['limit' => 200]);
        $terms = $this->Fees->Terms->find('list', ['limit' => 200]);
        $statuses = $this->Fees->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('fee', 'levels', 'terms', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fee = $this->Fees->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fee = $this->Fees->patchEntity($fee, $this->request->getData());
            if ($this->Fees->save($fee)) {
                $this->Flash->success(__('The fee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee could not be saved. Please, try again.'));
        }
        $levels = $this->Fees->Levels->find('list', ['limit' => 200]);
        $terms = $this->Fees->Terms->find('list', ['limit' => 200]);
        $statuses = $this->Fees->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('fee', 'levels', 'terms', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fee id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fee = $this->Fees->get($id);
        if ($this->Fees->delete($fee)) {
            $this->Flash->success(__('The fee has been deleted.'));
        } else {
            $this->Flash->error(__('The fee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
