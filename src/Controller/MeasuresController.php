<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Measures Controller
 *
 * @property \App\Model\Table\MeasuresTable $Measures
 * @method \App\Model\Entity\Measure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeasuresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $measures = $this->paginate($this->Measures);

        $this->set(compact('measures'));
    }

    /**
     * View method
     *
     * @param string|null $id Measure id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $measure = $this->Measures->get($id, [
            'contain' => ['ExamSubjects'=>['Subjects', 'Exams'], 'ClassroomActivities'=>['Activities', 'Classrooms', 'Statuses', 'Measures'], 'StudentActivities'=>['Activities', 'Students', 'Statuses', 'Measures'], 'EmployeeLeaves'=>['Employees', 'Leaves', 'Measures', 'Users']],
        ]);

        $this->set(compact('measure'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $measure = $this->Measures->newEmptyEntity();
        if ($this->request->is('post')) {
            $measure = $this->Measures->patchEntity($measure, $this->request->getData());
            if ($this->Measures->save($measure)) {
                $this->Flash->success(__('The measure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The measure could not be saved. Please, try again.'));
        }
        $this->set(compact('measure'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Measure id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $measure = $this->Measures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $measure = $this->Measures->patchEntity($measure, $this->request->getData());
            if ($this->Measures->save($measure)) {
                $this->Flash->success(__('The measure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The measure could not be saved. Please, try again.'));
        }
        $this->set(compact('measure'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Measure id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $measure = $this->Measures->get($id);
        if ($this->Measures->delete($measure)) {
            $this->Flash->success(__('The measure has been deleted.'));
        } else {
            $this->Flash->error(__('The measure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
