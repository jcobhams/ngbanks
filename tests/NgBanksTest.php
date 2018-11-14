<?php 
use PHPUnit\Framework\TestCase;
use jcobhams\NgBanks\NgBanks;

class NgBanksTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
		$this->ngbanks = new NgBanks();
	}

	public function testInitialCountOfBanksMatch()
	{
		$banks = $this->ngbanks->getBanks();
		$this->assertEquals(count($banks), 23);
	}

	public function testGetBankReturnsNullOnInvalidParam()
	{
		$bank = $this->ngbanks->getBank('007');
		$this->assertNull($bank);
	}

	public function testGetBankReturnsArrayOnValidParam()
	{
		$bank = $this->ngbanks->getBank('044');
		$this->assertNotNull($bank);
		$this->assertArrayHasKey('name', $bank);
		$this->assertArrayHasKey('code', $bank);
		$this->assertArrayHasKey('slug', $bank);
		$this->assertEquals($bank['code'], '044');
		$this->assertEquals($bank['slug'], 'ACC');
	}

	public function testAddBankMethodWorksOnValidInput()
	{
		$this->assertEquals(count($this->ngbanks->getBanks()), 23);

		$new_bank = $this->ngbanks->addBank('Cobhams Savings and Loans', '007', 'CSL', '*007#');

		$this->assertEquals(count($this->ngbanks->getBanks()), 24);
		$this->assertArrayHasKey('name', $new_bank);
		$this->assertArrayHasKey('code', $new_bank);
		$this->assertArrayHasKey('slug', $new_bank);
		$this->assertEquals($new_bank['code'], '007');
		$this->assertEquals($new_bank['slug'], 'CSL');
	}

	public function testAddBankMethodFailsOnInvalidInput()
	{
		$this->assertEquals(count($this->ngbanks->getBanks()), 23);

		$this->expectException(Exception::class);
		$new_bank = $this->ngbanks->addBank('Cobhams Savings and Loans', '044', 'CSL', '*007#');

	}
}
