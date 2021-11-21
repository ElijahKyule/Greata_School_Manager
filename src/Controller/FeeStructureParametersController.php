<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FeeStructureParameters Controller
 *
 * @property \App\Model\Table\FeeStructureParametersTable $FeeStructureParameters
 * @method \App\Model\Entity\FeeStructureParameter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeeStructureParametersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $feeStructureParameters = $this->paginate($this->FeeStructureParameters);

        $this->set(compact('feeStructureParameters'));
    }

    /**
     * View method
     *
     * @param string|null $id Fee Structure Parameter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feeStructureParameter = $this->FeeStructureParameters->get($id, [
            'contain' => ['FeeStructures'=>['Fees', 'FeeStructureParameters']],
        ]);

        $this->set(compact('feeStructureParameter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feeStructureParameter = $this->FeeStructureParameters->newEmptyEntity();
        if ($this->request->is('post')) {
            $feeStructureParameter = $this->FeeStructureParameters->patchEntity($feeStructureParameter, $this->request->getData());
            if ($this->FeeStructureParameters->save($feeStructureParameter)) {
                $this->Flash->success(__('The fee structure parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee structure parameter could not be saved. Please, try again.'));
        }
        $this->set(compact('feeStructureParameter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fee Structure Parameter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feeStructureParameter = $this->FeeStructureParameters->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feeStructureParameter = $this->FeeStructureParameters->patchEntity($feeStructureParameter, $this->request->getData());
            if ($this->FeeStructureParameters->save($feeStructureParameter)) {
                $this->Flash->success(__('The fee structure parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fee structure parameter could not be saved. Please, try again.'));
        }
        $this->set(compact('feeStructureParameter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fee Structure Parameter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feeStructureParameter = $this->FeeStructureParameters->get($id);
        if ($this->FeeStructureParameters->delete($feeStructureParameter)) {
            $this->Flash->success(__('The fee structure parameter has been deleted.'));
        } else {
            $this->Flash->error(__('The fee structure parameter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
