<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Paymentmodes Controller
 *
 * @property \App\Model\Table\PaymentmodesTable $Paymentmodes
 * @method \App\Model\Entity\Paymentmode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentmodesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $paymentmodes = $this->paginate($this->Paymentmodes);

        $this->set(compact('paymentmodes'));
    }

    /**
     * View method
     *
     * @param string|null $id Paymentmode id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentmode = $this->Paymentmodes->get($id, [
            'contain' => ['Payments'=>['Students', 'Users']],
        ]);

        $this->set(compact('paymentmode'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentmode = $this->Paymentmodes->newEmptyEntity();
        if ($this->request->is('post')) {
            $paymentmode = $this->Paymentmodes->patchEntity($paymentmode, $this->request->getData());
            if ($this->Paymentmodes->save($paymentmode)) {
                $this->Flash->success(__('The paymentmode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paymentmode could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentmode'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paymentmode id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentmode = $this->Paymentmodes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentmode = $this->Paymentmodes->patchEntity($paymentmode, $this->request->getData());
            if ($this->Paymentmodes->save($paymentmode)) {
                $this->Flash->success(__('The paymentmode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paymentmode could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentmode'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paymentmode id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentmode = $this->Paymentmodes->get($id);
        if ($this->Paymentmodes->delete($paymentmode)) {
            $this->Flash->success(__('The paymentmode has been deleted.'));
        } else {
            $this->Flash->error(__('The paymentmode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
