<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Messagestatuses Controller
 *
 * @property \App\Model\Table\MessagestatusesTable $Messagestatuses
 * @method \App\Model\Entity\Messagestatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagestatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $messagestatuses = $this->paginate($this->Messagestatuses);

        $this->set(compact('messagestatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Messagestatus id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $messagestatus = $this->Messagestatuses->get($id, [
            'contain' => ['Announcements'=>['Users'], 'Messages'=>['Students', 'Users']],
        ]);

        $this->set(compact('messagestatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $messagestatus = $this->Messagestatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $messagestatus = $this->Messagestatuses->patchEntity($messagestatus, $this->request->getData());
            if ($this->Messagestatuses->save($messagestatus)) {
                $this->Flash->success(__('The messagestatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The messagestatus could not be saved. Please, try again.'));
        }
        $this->set(compact('messagestatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Messagestatus id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $messagestatus = $this->Messagestatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $messagestatus = $this->Messagestatuses->patchEntity($messagestatus, $this->request->getData());
            if ($this->Messagestatuses->save($messagestatus)) {
                $this->Flash->success(__('The messagestatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The messagestatus could not be saved. Please, try again.'));
        }
        $this->set(compact('messagestatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Messagestatus id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $messagestatus = $this->Messagestatuses->get($id);
        if ($this->Messagestatuses->delete($messagestatus)) {
            $this->Flash->success(__('The messagestatus has been deleted.'));
        } else {
            $this->Flash->error(__('The messagestatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
