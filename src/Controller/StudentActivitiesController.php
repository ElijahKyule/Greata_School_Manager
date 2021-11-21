<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StudentActivities Controller
 *
 * @property \App\Model\Table\StudentActivitiesTable $StudentActivities
 * @method \App\Model\Entity\StudentActivity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentActivitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Activities', 'Statuses', 'Measures'],
        ];
        $studentActivities = $this->paginate($this->StudentActivities);

        $this->set(compact('studentActivities'));
    }

    /**
     * View method
     *
     * @param string|null $id Student Activity id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentActivity = $this->StudentActivities->get($id, [
            'contain' => ['Students', 'Activities', 'Statuses', 'Measures'],
        ]);

        $this->set(compact('studentActivity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id) 
    {
        $studentActivity = $this->StudentActivities->newEmptyEntity();
        if ($this->request->is('post')) {
            $studentActivity = $this->StudentActivities->patchEntity($studentActivity, $this->request->getData());
            if ($this->StudentActivities->save($studentActivity)) {
                $this->Flash->success(__('The student activity has been saved.'));

                return $this->redirect(['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'activities']]);
            }
            $this->Flash->error(__('The student activity could not be saved. Please, try again.'));
        }
        $students = $this->StudentActivities->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
        $activities = $this->StudentActivities->Activities->find('list', ['limit' => 200]);
        $statuses = $this->StudentActivities->Statuses->find('list', ['limit' => 200]);
        $measures = $this->StudentActivities->Measures->find('list', ['limit' => 200]);
        $this->set(compact('studentActivity', 'students', 'activities', 'statuses', 'measures','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Activity id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $studentActivity = $this->StudentActivities->get($id, [
            'contain' => [],
        ]);
        $selected_students = $this->StudentActivities->find()
                ->select(['student_id'])
                ->where(['id' => $id])
                ->first();
        $selected_student = $selected_students->student_id;
        $selected_activities = $this->StudentActivities->find()
                ->select(['activity_id'])
                ->where(['id' => $id])
                ->first();
        $selected_activity = $selected_activities->activity_id;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentActivity = $this->StudentActivities->patchEntity($studentActivity, $this->request->getData());
            if ($this->StudentActivities->save($studentActivity)) {
                $this->Flash->success(__('The student activity has been saved.'));

                return $this->redirect(['controller'=>'Students', 'action' => 'view', $selected_student, '?'=>['tab'=>'activities']]);
            }
            $this->Flash->error(__('The student activity could not be saved. Please, try again.'));
        }

        $students = $this->StudentActivities->Students->find('list', ['limit' => 200])->where(['id'=>$selected_student]);
        $activities = $this->StudentActivities->Activities->find('list', ['limit' => 200])->where(['id'=>$selected_activity]);
        $statuses = $this->StudentActivities->Statuses->find('list', ['limit' => 200]);
        $measures = $this->StudentActivities->Measures->find('list', ['limit' => 200]);
        $this->set(compact('studentActivity', 'students', 'activities', 'statuses', 'measures', 'selected_student'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Activity id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selected_students = $this->StudentActivities->find()
                ->select(['student_id'])
                ->where(['id' => $id])
                ->first();
        $selected_student = $selected_students->student_id;

        $studentActivity = $this->StudentActivities->get($id);
        if ($this->StudentActivities->delete($studentActivity)) {
            $this->Flash->success(__('The student activity has been deleted.'));
        } else {
            $this->Flash->error(__('The student activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Students', 'action' => 'view', $selected_student, '?'=>['tab'=>'activities']]);
    }
}