<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessagestatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessagestatusesTable Test Case
 */
class MessagestatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MessagestatusesTable
     */
    protected $Messagestatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Messagestatuses',
        'app.Messages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Messagestatuses') ? [] : ['className' => MessagestatusesTable::class];
        $this->Messagestatuses = $this->getTableLocator()->get('Messagestatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Messagestatuses);

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
