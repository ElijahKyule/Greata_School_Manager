<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamtypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamtypesTable Test Case
 */
class ExamtypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamtypesTable
     */
    protected $Examtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Examtypes',
        'app.Exams',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Examtypes') ? [] : ['className' => ExamtypesTable::class];
        $this->Examtypes = $this->getTableLocator()->get('Examtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Examtypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
