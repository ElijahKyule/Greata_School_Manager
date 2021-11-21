<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentmodesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentmodesTable Test Case
 */
class PaymentmodesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentmodesTable
     */
    protected $Paymentmodes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Paymentmodes',
        'app.FeeStudents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Paymentmodes') ? [] : ['className' => PaymentmodesTable::class];
        $this->Paymentmodes = $this->getTableLocator()->get('Paymentmodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Paymentmodes);

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
