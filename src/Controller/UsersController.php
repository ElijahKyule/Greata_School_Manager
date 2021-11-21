<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Genders'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method  
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $tab = $this->request->getQuery('tab');
        $user = $this->Users->get($id, [ 
            'contain' => ['Roles', 'Classrooms'=>['Levels', 'Streams'], 'Subjects', 'Exams'=>['Levels','Terms', 'Examtypes'], 'Payments'=>['Students', 'Paymentmodes'], 'Messages'=>['Students', 'Messagestatuses'], 'Announcements'=>['Messagestatuses'], 'Activities', 'Genders', 'EmployeeLeaves'=>['Employees', 'Measures', 'Leaves'] ],
        ]);
        $this->set(compact('user', 'tab', 'id'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'genders'));
    }

    public function uploadImage($id)
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (!$user->getErrors) 
            {
                $image = $this->request->getData('user_image');
                $name  = $image->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$name;

                if ($name) 
                {
                    $image->moveTo($targetPath);
                    $upload = $this->Users->query()
                        ->update()
                        ->set(['image' => $name])
                        ->where(['id' => $id])
                        ->execute();
                    if ($upload == true) 
                    {
                        $this->Flash->success(__('The user image has been uploaded.'));

                        return $this->redirect(['controller'=>'Users', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                    }
                    else
                    {
                        $this->Flash->error(__('The user image could not be uploaded. Please, try again.'));
                        return $this->redirect(['controller'=>'Users', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                    }
                }
                elseif(!$name)
                {
                    $this->Flash->error(__('The user image can not be empty.'));
                    return $this->redirect(['controller'=>'Users', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                }  
            }    
        }
    }

    public function changePassword($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $old_password = $this->request->getData('old_password');
            $new_password = $this->request->getData('new_password');
            $verify_password = $this->request->getData('verify_password');
            //pr($old_password);pr($new_password);pr($verify_password);exit;
            if ((new DefaultPasswordHasher)->check($old_password, $user->password)) 
            { 
                if ($new_password == $verify_password) {
                    $new_password =  (new DefaultPasswordHasher())->hash($new_password);
                    $changepass = $this->Users->query()
                        ->update()
                        ->set(['password' => $new_password])
                        ->where(['id'=> $id])
                        ->execute();
                    if ($changepass) 
                    {
                        $this->Flash->success(__('Password has been changed successfully. Login again'));
                        $this->Authentication->logout();
                        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                    }
                }
                else
                {
                    $this->Flash->error(__('Sorry! Password mismatch. Try again.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'view', $id, '?'=>['tab'=>'settings']]);
                }
            }  
            else
            {
                $this->Flash->error(__('Sorry! You provided the wrong password. Try again.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'view', $id, '?'=>['tab'=>'settings']]);
            }
            
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'genders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('welcome');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
