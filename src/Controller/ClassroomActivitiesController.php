<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ClassroomActivities Controller
 *
 * @property \App\Model\Table\ClassroomActivitiesTable $ClassroomActivities
 * @method \App\Model\Entity\ClassroomActivity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassroomActivitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Classrooms', 'Activities', 'Statuses', 'Measures'],
        ];
        $classroomActivities = $this->paginate($this->ClassroomActivities);

        $this->set(compact('classroomActivities'));
    }

    /**
     * View method
     *
     * @param string|null $id Classroom Activity id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classroomActivity = $this->ClassroomActivities->get($id, [
            'contain' => ['Classrooms', 'Activities', 'Statuses', 'Measures'],
        ]);

        $this->set(compact('classroomActivity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $classroomActivity = $this->ClassroomActivities->newEmptyEntity();
        if ($this->request->is('post')) {
            $classroomActivity = $this->ClassroomActivities->patchEntity($classroomActivity, $this->request->getData());
            if ($this->ClassroomActivities->save($classroomActivity)) {
                $this->Flash->success(__('The classroom activity has been saved.'));

                return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $id, '?'=>['tab'=>'activities']]);
            }
            $this->Flash->error(__('The classroom activity could not be saved. Please, try again.'));
        }
        $classrooms = $this->ClassroomActivities->Classrooms->find('list', ['limit' => 200])->where(['id'=>$id]);
        $activities = $this->ClassroomActivities->Activities->find('list', ['limit' => 200]);
        $statuses = $this->ClassroomActivities->Statuses->find('list', ['limit' => 200]);
        $measures = $this->ClassroomActivities->Measures->find('list', ['limit' => 200]);
        $this->set(compact('classroomActivity', 'classrooms', 'activities', 'statuses', 'measures', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classroom Activity id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $classroomActivity = $this->ClassroomActivities->get($id, [
            'contain' => [],
        ]);
        $selected_classrooms = $this->ClassroomActivities->find()
                ->select(['classroom_id'])
                ->where(['id' => $id])
                ->first();
        $selected_classroom = $selected_classrooms->classroom_id;
        $selected_activities = $this->ClassroomActivities->find()
                ->select(['activity_id'])
                ->where(['id' => $id])
                ->first();
        $selected_activity = $selected_activities->activity_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classroomActivity = $this->ClassroomActivities->patchEntity($classroomActivity, $this->request->getData());
            if ($this->ClassroomActivities->save($classroomActivity)) {
                $this->Flash->success(__('The classroom activity has been saved.'));

                return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $selected_classroom, '?'=>['tab'=>'activities']]);
            }
            $this->Flash->error(__('The classroom activity could not be saved. Please, try again.'));
        }
        $classrooms = $this->ClassroomActivities->Classrooms->find('list', ['limit' => 200])->where(['id'=>$selected_classroom]);
        $activities = $this->ClassroomActivities->Activities->find('list', ['limit' => 200])->where(['id'=>$selected_activity]);
        $statuses = $this->ClassroomActivities->Statuses->find('list', ['limit' => 200]);
        $measures = $this->ClassroomActivities->Measures->find('list', ['limit' => 200]);
        $this->set(compact('classroomActivity', 'classrooms', 'activities', 'statuses', 'measures', 'selected_classroom'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Classroom Activity id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selected_classrooms = $this->ClassroomActivities->find()
            ->select(['classroom_id'])
            ->where(['id' => $id])
            ->first();
        $selected_classroom = $selected_classrooms->classroom_id;
        $classroomActivity = $this->ClassroomActivities->get($id);
        if ($this->ClassroomActivities->delete($classroomActivity)) {
            $this->Flash->success(__('The classroom activity has been deleted.'));
        } else {
            $this->Flash->error(__('The classroom activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $selected_classroom, '?'=>['tab'=>'activities']]);
    }
}