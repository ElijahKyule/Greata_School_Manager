 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassroomStudent[]|\Cake\Collection\CollectionInterface $classroomStudents
 */
?>
<div class="classroomStudents index content-head">
    <?= $this->Html->link(__(' Classes'), ['controller'=>'Classrooms', 'action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
    <?= $this->Html->link(__(' New Student'), ['action' => 'add', $id], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <h3><?= $classroomStudentsName; ?></h3>
</div>