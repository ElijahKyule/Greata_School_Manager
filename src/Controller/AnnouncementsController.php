<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Announcements Controller
 *
 * @property \App\Model\Table\AnnouncementsTable $Announcements
 * @method \App\Model\Entity\Announcement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnnouncementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Messagestatuses'],
            'conditions'=>['messagestatus_id'=>5],
        ];
        $announcements = $this->paginate($this->Announcements);

        $this->set(compact('announcements'));
    }

    /**
     * View method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => ['Users', 'Messagestatuses'],
        ]);

        $this->set(compact('announcement'));
    }

    /**
     * View method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewAnc($id)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => ['Users', 'Messagestatuses'],
        ]);
        $auth_users = $this->Announcements->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $auth_user = $auth_users->user_id;

        $this->set(compact('announcement', 'auth_user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $announcement = $this->Announcements->newEmptyEntity();
        if ($this->request->is('post')) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->getData());
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $users = $this->Announcements->Users->find('list', ['limit' => 200]);
        $messagestatuses = $this->Announcements->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('announcement', 'users', 'messagestatuses'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addAnc($id)
    {
        $announcement = $this->Announcements->newEmptyEntity();
        if ($this->request->is('post')) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->getData());
            if ($this->Announcements->save($announcement))
            {
                $this->Flash->success(__('The announcement has been saved.'));

                return $this->redirect(['controller'=>'Users', 'action' => 'view', $id, '?'=>['tab'=>'announcements']]);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $users = $this->Announcements->Users->find('list', ['limit' => 200])->where(['id'=>$id]);
        $messagestatuses = $this->Announcements->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('announcement', 'users', 'messagestatuses', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->getData());
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $users = $this->Announcements->Users->find('list', ['limit' => 200]);
        $messagestatuses = $this->Announcements->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('announcement', 'users', 'messagestatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editAnc($id)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => [],
        ]);
        $auth_users = $this->Announcements->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $auth_user = $auth_users->user_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->getData());
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));

                return $this->redirect(['controller'=>'Users', 'action' => 'view', $auth_user, '?'=>['tab'=>'announcements']]);
            }
            $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
        }
        $users = $this->Announcements->Users->find('list', ['limit' => 200]);
        $messagestatuses = $this->Announcements->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('announcement', 'users', 'messagestatuses', 'auth_user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $this->Flash->success(__('The announcement has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteAnc($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $auth_users = $this->Announcements->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $auth_user = $auth_users->user_id;
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $this->Flash->success(__('The announcement has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Users', 'action' => 'view', $auth_user, '?'=>['tab'=>'announcements']]);
    }
}
