<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Users', 'Messagestatuses'],
        ];
        $messages = $this->paginate($this->Messages);

        $this->set(compact('messages'));
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['Students', 'Users', 'Messagestatuses'],
        ]);

        $this->set(compact('message'));
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewMessage($id)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['Students', 'Users', 'Messagestatuses'],
        ]);
        $this->loadModel('ClassroomStudents');
        $auth_students = $this->Messages->find()
            ->select(['student_id'])
            ->where(['id' => $id])
            ->first();
        $auth_student = $auth_students->student_id;
        $auth_classrooms = $this->ClassroomStudents->find()
            ->select(['classroom_id'])
            ->where(['student_id' => $auth_student, 'classroomstatus_id'=>1])
            ->first();
        $auth_classroom = $auth_classrooms->classroom_id;

        $this->set(compact('message', 'auth_classroom'));
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewMsg($id)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['Students', 'Users', 'Messagestatuses'],
        ]);
        $auth_users = $this->Messages->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $auth_user = $auth_users->user_id;

        $this->set(compact('message', 'auth_user'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $message = $this->Messages->newEmptyEntity();
        if ($this->request->is('post')) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));
                return $this->redirect(['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'messages']]);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $students = $this->Messages->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $messagestatuses = $this->Messages->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('message', 'students', 'users', 'messagestatuses', 'id'));
    }

    public function message($id)
    {
        $message = $this->Messages->newEmptyEntity();
        $this->loadModel('ClassroomStudents');
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $students_count = $this->ClassroomStudents->find()
                ->select(['student_id'])
                ->where(['classroom_id'=>$id, 'classroomstatus_id'=>1])
                ->count();
            if ($students_count > 0) 
            {
                $code = $this->request->getData('code');
                $authenticate_msg = $this->Messages->find()
                    ->select(['id'])
                    ->where(['code'=>$code])
                    ->count();
                if ($authenticate_msg == 0) 
                {
                    $student_ids = $this->ClassroomStudents->find()
                        ->select(['student_id'])
                        ->where(['classroom_id'=>$id, 'classroomstatus_id'=>1])
                        ->toArray();
                    
                    foreach ($student_ids as $student_id) 
                    {
                        $message = $this->Messages->newEmptyEntity();
                        $message = $this->Messages->patchEntity($message, $this->request->getData());
                        $message->student_id = $student_id->student_id;
                        $sent = $this->Messages->save($message);
                    }
                    $students_count = $this->ClassroomStudents->find()
                        ->select(['student_id'])
                        ->where(['classroom_id'=>$id, 'classroomstatus_id'=>1])
                        ->count();
                    $sent_messages_count = $this->Messages->find()
                        ->select(['id'])
                        ->where(['code'=>$code])
                        ->count();
                    if ($students_count == $sent_messages_count) 
                    {
                        $this->Flash->success(__('The message has been sent to all class students.'));
                        return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $id, '?'=>['tab'=>'messages']]);
                    }
                    elseif (($sent_messages_count < $students_count) && ($sent_messages_count > 0)) 
                    {
                        $this->Flash->success(__('The message has been sent. A few class students might not have received it.'));
                        return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $id, '?'=>['tab'=>'messages']]);
                    }
                    elseif ($sent_messages_count == 0) 
                    {
                        $this->Flash->error(__('The message could not be sent. Please, try again.'));
                    }
                }
                elseif ($authenticate_msg > 0) 
                {
                    $this->Flash->error(__('The message could not be sent. Message code already exists.'));
                }
                else
                {
                    $this->Flash->error(__('The message could not be sent. Please, try again.'));  
                }
            }
            elseif ($students_count == 0)
            {
                $this->Flash->error(__('The message could not be sent. Class is empty.'));
            }
        }
        $classrooms = $this->loadModel('Classrooms')->find('list', ['limit' => 200])->where(['id'=>$id]); 
        $students = $this->Messages->Students->find('list', ['limit' => 200]); 
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $messagestatuses = $this->Messages->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('message', 'students', 'users', 'messagestatuses', 'id', 'classrooms'));
    }
 
    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $message = $this->Messages->get($id, [
            'contain' => [],
        ]);
        $student_ids = $this->Messages->find()
            ->select(['student_id'])
            ->where(['id'=>$id])
            ->first();
        $student_id = $student_ids->student_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'messages']]);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $students = $this->Messages->Students->find('list', ['limit' => 200])->where(['id'=>$student_id]);
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $messagestatuses = $this->Messages->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('message', 'students', 'users', 'messagestatuses', 'student_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editMessage($id)
    {
        $message = $this->Messages->get($id, [
            'contain' => [],
        ]);
        $this->loadModel('ClassroomStudents');
        $student_ids = $this->Messages->find()
            ->select(['student_id'])
            ->where(['id'=>$id])
            ->first();
        $student_id = $student_ids->student_id;
        $auth_classrooms = $this->ClassroomStudents->find()
            ->select(['classroom_id'])
            ->where(['student_id' => $student_id, 'classroomstatus_id'=>1])
            ->first();
        $auth_classroom = $auth_classrooms->classroom_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $auth_classroom, '?'=>['tab'=>'messages']]);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $students = $this->Messages->Students->find('list', ['limit' => 200])->where(['id'=>$student_id]);
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $messagestatuses = $this->Messages->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('message', 'students', 'users', 'messagestatuses', 'auth_classroom'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editMsg($id)
    {
        $message = $this->Messages->get($id, [
            'contain' => [],
        ]);
        $this->loadModel('ClassroomStudents');
        $student_ids = $this->Messages->find()
            ->select(['student_id'])
            ->where(['id'=>$id])
            ->first();
        $student_id = $student_ids->student_id;
        $user_ids = $this->Messages->find()
            ->select(['user_id'])
            ->where(['id'=>$id])
            ->first();
        $user_id = $user_ids->user_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['controller'=>'Users', 'action' => 'view', $user_id, '?'=>['tab'=>'messages']]);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $students = $this->Messages->Students->find('list', ['limit' => 200])->where(['id'=>$student_id]);
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $messagestatuses = $this->Messages->Messagestatuses->find('list', ['limit' => 200]);
        $this->set(compact('message', 'students', 'users', 'messagestatuses', 'user_id'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student_ids = $this->Messages->find()
            ->select(['student_id'])
            ->where(['id'=>$id])
            ->first();
        $student_id = $student_ids->student_id;
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'messages']]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteMessage($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('ClassroomStudents');
        $student_ids = $this->Messages->find()
            ->select(['student_id'])
            ->where(['id'=>$id])
            ->first();
        $student_id = $student_ids->student_id;
        $auth_classrooms = $this->ClassroomStudents->find()
            ->select(['classroom_id'])
            ->where(['student_id' => $student_id, 'classroomstatus_id'=>1])
            ->first();
        $auth_classroom = $auth_classrooms->classroom_id;
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $auth_classroom, '?'=>['tab'=>'messages']]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteMsg($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user_ids = $this->Messages->find()
            ->select(['user_id'])
            ->where(['id'=>$id])
            ->first();
        $user_id = $user_ids->user_id;
        
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Users', 'action' => 'view', $user_id, '?'=>['tab'=>'messages']]);
    }

}
