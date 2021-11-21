<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EmployeeLeaves Controller
 *
 * @property \App\Model\Table\EmployeeLeavesTable $EmployeeLeaves
 * @method \App\Model\Entity\EmployeeLeave[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeLeavesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Leaves', 'Measures', 'Users'],
        ];
        $employeeLeaves = $this->paginate($this->EmployeeLeaves);

        $this->set(compact('employeeLeaves'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Leave id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeLeave = $this->EmployeeLeaves->get($id, [
            'contain' => ['Employees', 'Leaves', 'Measures', 'Users'],
        ]);

        $this->set(compact('employeeLeave'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Leave id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewEmployee($id = null)
    {
        $employeeLeave = $this->EmployeeLeaves->get($id, [
            'contain' => ['Employees', 'Leaves', 'Measures', 'Users'],
        ]);

        $this->set(compact('employeeLeave'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $employeeLeave = $this->EmployeeLeaves->newEmptyEntity();
        if ($this->request->is('post')) {
            $employeeLeave = $this->EmployeeLeaves->patchEntity($employeeLeave, $this->request->getData());
            if ($this->EmployeeLeaves->save($employeeLeave)) {
                $this->Flash->success(__('The employee leave has been saved.'));

                return $this->redirect(['controller'=>'Employees', 'action' => 'view', $id,'?'=>['tab'=>'leaves']]);
            }
            $this->Flash->error(__('The employee leave could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeLeaves->Employees->find('list', ['limit' => 200])->where(['id'=>$id]);
        $leaves = $this->EmployeeLeaves->Leaves->find('list', ['limit' => 200]);
        $measures = $this->EmployeeLeaves->Measures->find('list', ['limit' => 200]);
        $users = $this->EmployeeLeaves->Users->find('list', ['limit' => 200]);
        $this->set(compact('employeeLeave', 'employees', 'leaves', 'measures', 'users', 'id'));
    }

     /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addEmployee($id)
    {
        $employeeLeave = $this->EmployeeLeaves->newEmptyEntity();
        if ($this->request->is('post')) {
            $employeeLeave = $this->EmployeeLeaves->patchEntity($employeeLeave, $this->request->getData());
            if ($this->EmployeeLeaves->save($employeeLeave)) {
                $this->Flash->success(__('The employee leave has been saved.'));

                return $this->redirect(['controller'=>'Users', 'action' => 'view', $id,'?'=>['tab'=>'leaves']]);
            }
            $this->Flash->error(__('The employee leave could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeLeaves->Employees->find('list', ['limit' => 200]);
        $leaves = $this->EmployeeLeaves->Leaves->find('list', ['limit' => 200]);
        $measures = $this->EmployeeLeaves->Measures->find('list', ['limit' => 200]);
        $users = $this->EmployeeLeaves->Users->find('list', ['limit' => 200])->where(['id'=>$id]);
        $this->set(compact('employeeLeave', 'employees', 'leaves', 'measures', 'users', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Leave id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeLeave = $this->EmployeeLeaves->get($id, [
            'contain' => [],
        ]);
        $selected_employees = $this->EmployeeLeaves->find()
            ->select(['employee_id'])
            ->where(['id' => $id])
            ->first();
        $selected_employee = $selected_employees->employee_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeLeave = $this->EmployeeLeaves->patchEntity($employeeLeave, $this->request->getData());
            if ($this->EmployeeLeaves->save($employeeLeave)) {
                $this->Flash->success(__('The employee leave has been saved.'));

                return $this->redirect(['controller'=>'Employees', 'action' => 'view', $selected_employee,'?'=>['tab'=>'leaves']]);
            }
            $this->Flash->error(__('The employee leave could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeLeaves->Employees->find('list', ['limit' => 200])->where(['id'=>$selected_employee]);
        $leaves = $this->EmployeeLeaves->Leaves->find('list', ['limit' => 200]);
        $measures = $this->EmployeeLeaves->Measures->find('list', ['limit' => 200]);
        $users = $this->EmployeeLeaves->Users->find('list', ['limit' => 200]);
        $this->set(compact('employeeLeave', 'employees', 'leaves', 'measures', 'users', 'selected_employee'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Leave id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editEmployee($id = null)
    {
        $employeeLeave = $this->EmployeeLeaves->get($id, [
            'contain' => [],
        ]);
        $selected_employees = $this->EmployeeLeaves->find()
            ->select(['employee_id'])
            ->where(['id' => $id])
            ->first();
        $selected_employee = $selected_employees->employee_id;
        $selected_users = $this->EmployeeLeaves->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $selected_user = $selected_users->user_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeLeave = $this->EmployeeLeaves->patchEntity($employeeLeave, $this->request->getData());
            if ($this->EmployeeLeaves->save($employeeLeave)) {
                $this->Flash->success(__('The employee leave has been saved.'));

                return $this->redirect(['controller'=>'Users', 'action' => 'view', $selected_user,'?'=>['tab'=>'leaves']]);
            }
            $this->Flash->error(__('The employee leave could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeLeaves->Employees->find('list', ['limit' => 200])->where(['id'=>$selected_employee]);
        $leaves = $this->EmployeeLeaves->Leaves->find('list', ['limit' => 200]);
        $measures = $this->EmployeeLeaves->Measures->find('list', ['limit' => 200]);
        $users = $this->EmployeeLeaves->Users->find('list', ['limit' => 200]);
        $this->set(compact('employeeLeave', 'employees', 'leaves', 'measures', 'users', 'selected_user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Leave id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selected_employees = $this->EmployeeLeaves->find()
            ->select(['employee_id'])
            ->where(['id' => $id])
            ->first();
        $selected_employee = $selected_employees->employee_id;
        $employeeLeave = $this->EmployeeLeaves->get($id);
        if ($this->EmployeeLeaves->delete($employeeLeave)) {
            $this->Flash->success(__('The employee leave has been deleted.'));
        } else {
            $this->Flash->error(__('The employee leave could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Employees', 'action' => 'view', $selected_employee,'?'=>['tab'=>'leaves']]);
    }

     /**
     * Delete method
     *
     * @param string|null $id Employee Leave id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteEmployee($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selected_users = $this->EmployeeLeaves->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $selected_user = $selected_users->user_id;
        $employeeLeave = $this->EmployeeLeaves->get($id);
        if ($this->EmployeeLeaves->delete($employeeLeave)) {
            $this->Flash->success(__('The employee leave has been deleted.'));
        } else {
            $this->Flash->error(__('The employee leave could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Users', 'action' => 'view', $selected_user,'?'=>['tab'=>'leaves']]);
    }
}
