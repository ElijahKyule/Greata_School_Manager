<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Exams Controller
 *
 * @property \App\Model\Table\ExamsTable $Exams
 * @method \App\Model\Entity\Exam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Examtypes', 'Levels', 'Terms', 'Users', 'Statuses'],
        ];
        $exams = $this->paginate($this->Exams);

        $this->set(compact('exams'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $tab = $this->request->getQuery('tab');
        $exam = $this->Exams->get($id, [
            'contain' => ['Examtypes', 'Levels', 'Terms', 'Users', 'ExamSubjects'=>['Subjects', 'Measures'], 'Statuses'],
        ]);

        $this->set(compact('exam', 'id', 'tab')); 
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exam = $this->Exams->newEmptyEntity();
        if ($this->request->is('post')) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $examtypes = $this->Exams->Examtypes->find('list', ['limit' => 200]);
        $levels = $this->Exams->Levels->find('list', ['limit' => 200]);
        $terms = $this->Exams->Terms->find('list', ['limit' => 200]);
        $users = $this->Exams->Users->find('list', ['limit' => 200]);
        $statuses = $this->Exams->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'examtypes', 'levels', 'terms', 'users', 'statuses'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addExam($id)
    {
        $exam = $this->Exams->newEmptyEntity();
        if ($this->request->is('post')) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['controller'=>'Users','action'=>'view',$id, '?'=>['tab'=>'exams']]);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $examtypes = $this->Exams->Examtypes->find('list', ['limit' => 200]);
        $levels = $this->Exams->Levels->find('list', ['limit' => 200]);
        $terms = $this->Exams->Terms->find('list', ['limit' => 200]);
        $users = $this->Exams->Users->find('list', ['limit' => 200])->where(['id'=>$id]);
        $statuses = $this->Exams->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'examtypes', 'levels', 'terms', 'users', 'statuses', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $examtypes = $this->Exams->Examtypes->find('list', ['limit' => 200]);
        $levels = $this->Exams->Levels->find('list', ['limit' => 200]);
        $terms = $this->Exams->Terms->find('list', ['limit' => 200]);
        $users = $this->Exams->Users->find('list', ['limit' => 200]);
        $statuses = $this->Exams->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'examtypes', 'levels', 'terms', 'users', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editExam($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => [],
        ]);
        $selected_users = $this->Exams->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $selected_user = $selected_users->user_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['controller'=>'Users','action'=>'view',$selected_user, '?'=>['tab'=>'exams']]);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $examtypes = $this->Exams->Examtypes->find('list', ['limit' => 200]);
        $levels = $this->Exams->Levels->find('list', ['limit' => 200]);
        $terms = $this->Exams->Terms->find('list', ['limit' => 200]);
        $users = $this->Exams->Users->find('list', ['limit' => 200]);
        $statuses = $this->Exams->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'examtypes', 'levels', 'terms', 'users', 'statuses', 'selected_user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exam = $this->Exams->get($id);
        if ($this->Exams->delete($exam)) {
            $this->Flash->success(__('The exam has been deleted.'));
        } else {
            $this->Flash->error(__('The exam could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteExam($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selected_users = $this->Exams->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $selected_user = $selected_users->user_id;
        $exam = $this->Exams->get($id);
        if ($this->Exams->delete($exam)) {
            $this->Flash->success(__('The exam has been deleted.'));
        } else {
            $this->Flash->error(__('The exam could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Users','action'=>'view',$selected_user, '?'=>['tab'=>'exams']]);
    }
}
