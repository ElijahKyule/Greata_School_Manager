<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FeeStructures Controller
 *
 * @property \App\Model\Table\FeeStructuresTable $FeeStructures
 * @method \App\Model\Entity\FeeStructure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeeStructuresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fees', 'FeeStructureParameters'],
        ]; 
        $feeStructures = $this->paginate($this->FeeStructures);

        $this->set(compact('feeStructures'));
    }

    /** 
     * View method
     *
     * @param string|null $id Fee Structure id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feeStructure = $this->FeeStructures->get($id, [
            'contain' => ['Fees', 'FeeStructureParameters'],
        ]);

        $this->set(compact('feeStructure'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $feeStructure = $this->FeeStructures->newEmptyEntity();
        if ($this->request->is('post')) {
            $fee_id = $id;
            $fee_structure_parameter_id = $this->request->getData('fee_structure_parameter_id');
            $fee_parameter_count = $this->FeeStructures->find()
                ->select(['id'])
                ->where(['fee_structure_parameter_id' => $fee_structure_parameter_id, 'fee_id'=> $fee_id])
                ->count();
            if ($fee_parameter_count == 0) {
                $feeStructure = $this->FeeStructures->patchEntity($feeStructure, $this->request->getData());
                if ($this->FeeStructures->save($feeStructure)) {
                    $this->Flash->success(__('The fee structure has been saved.'));

                    return $this->redirect(['controller'=>'Fees', 'action' => 'view', $id, '?'=>['tab'=>'feestructure']]);
                }
            }
            
            $this->Flash->error(__('The fee structure could not be saved. Please, try again.'));
        }
        $fees = $this->FeeStructures->Fees->find('list', ['limit' => 200]);
        $feeStructureParameters = $this->FeeStructures->FeeStructureParameters->find('list', ['limit' => 200]);
        $this->set(compact('feeStructure', 'fees', 'feeStructureParameters', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fee Structure id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $feeStructure = $this->FeeStructures->get($id, [
            'contain' => [],
        ]);
        $selected_fees = $this->FeeStructures->find()
                ->select(['fee_id'])
                ->where(['id' => $id])
                ->first();
        $selected_fee = $selected_fees->fee_id;
        $selected_fee_parameters = $this->FeeStructures->find()
                ->select(['fee_structure_parameter_id'])
                ->where(['id' => $id])
                ->first();
         $selected_fee_parameter =  $selected_fee_parameters->fee_structure_parameter_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feeStructure = $this->FeeStructures->patchEntity($feeStructure, $this->request->getData());
            if ($this->FeeStructures->save($feeStructure)) {
                $this->Flash->success(__('The fee structure has been saved.'));

                return $this->redirect(['controller'=>'Fees', 'action' => 'view', $selected_fee, '?'=>['tab'=>'feestructure']]);
            }
            $this->Flash->error(__('The fee structure could not be saved. Please, try again.'));
        }
        $fees = $this->FeeStructures->Fees->find('list', ['limit' => 200])->where(['id'=>$selected_fee]);
        $feeStructureParameters = $this->FeeStructures->FeeStructureParameters->find('list', ['limit' => 200])->where(['id'=>$selected_fee_parameter]);
        $this->set(compact('feeStructure', 'fees', 'feeStructureParameters', 'id', 'selected_fee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fee Structure id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feeStructure = $this->FeeStructures->get($id);
        $selected_fees = $this->FeeStructures->find()
                ->select(['fee_id'])
                ->where(['id' => $id])
                ->first();
        $selected_fee = $selected_fees->fee_id;
        if ($this->FeeStructures->delete($feeStructure)) 
        {
            $this->Flash->success(__('The fee structure has been deleted.'));
            return $this->redirect(['controller'=>'Fees', 'action' => 'view', $selected_fee, '?'=>['tab'=>'feestructure']]);
        } 
        else 
        {
            $this->Flash->error(__('The fee structure could not be deleted. Please, try again.'));
        }
    }
}
