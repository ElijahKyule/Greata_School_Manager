<?php
declare(strict_types=1);
 
namespace App\Controller;

/**
 * Classroomstatuses Controller
 *
 * @property \App\Model\Table\ClassroomstatusesTable $Classroomstatuses
 * @method \App\Model\Entity\Classroomstatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassroomstatusesController extends AppController
{
    /**
     * Index method 
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $classroomstatuses = $this->paginate($this->Classroomstatuses);

        $this->set(compact('classroomstatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Classroomstatus id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classroomstatus = $this->Classroomstatuses->get($id, [
            'contain' => ['ClassroomStudents'=>['Classrooms', 'Students']],
        ]);

        $this->set(compact('classroomstatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classroomstatus = $this->Classroomstatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $classroomstatus = $this->Classroomstatuses->patchEntity($classroomstatus, $this->request->getData());
            if ($this->Classroomstatuses->save($classroomstatus)) {
                $this->Flash->success(__('The classroomstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classroomstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('classroomstatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classroomstatus id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classroomstatus = $this->Classroomstatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classroomstatus = $this->Classroomstatuses->patchEntity($classroomstatus, $this->request->getData());
            if ($this->Classroomstatuses->save($classroomstatus)) {
                $this->Flash->success(__('The classroomstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classroomstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('classroomstatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Classroomstatus id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classroomstatus = $this->Classroomstatuses->get($id);
        if ($this->Classroomstatuses->delete($classroomstatus)) {
            $this->Flash->success(__('The classroomstatus has been deleted.'));
        } else {
            $this->Flash->error(__('The classroomstatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
