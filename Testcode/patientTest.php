<?php
//namespace App\Models\patient;

//use Test;

class patientTest extends \PHPUnit\Framework\TestCase
{
	//protected function getpatientModel(){}

	protected $patient;

	public function setFirstName(): void
 {   
    parent::setFirstName();
    var_dump('1');
 }
 public function setLastName(): void
 {   
    parent::setLastName();
    var_dump('1');
 }
 

	public function GetTheFirstName()
	{
        parent::setFirstName();
		$this->patient->setFirstName('Barin');

		$this->assertEquals($this->patient->getFirstName(), 'Barin');
	}

	public function GetTheLastName()
	{
		$this->patient->setLastName('Tasni');

		$this->assertEquals($this->patient->getLastName(), 'Tasni');
	}

	public function testFullName()
	{
		$patient = new \App\Models\patient;

		$patient->setFirstName('Barin');

		$patient->setLastName('Tasni');

		$this->assertEquals($patient->getFullName(), 'Barin Tasni');
	}

	public function FirstAndLastNameAreTrimmed()
	{
		$patient = new \App\Models\patient;

		$patient->setFirstName('Barin     ');

		$patient->setLastName('     Tasni');

		$this->assertEquals($patient->getFirstName(), 'Barin');

		$this->assertEquals($patient->getLastName(), 'Tasni');
	}


	public function testEmailAddressCanBeSet()
	{
		$patient = new \App\Models\patient;

		$patient->setEmail('b3@gmail.com');

		$this->assertEquals($patient->getEmail(), 'b3@gmail.com');
	}

	public function testEmailVariablesContainCorrectValues()
	{
		$patient = new \App\Models\patient;

		$patient->setFirstName('Barin');

		$patient->setLastName('Tasni');

		$patient->setEmail('b3@gmail.com');

		$emailVariables = $patient->getEmailVariables();

		$this->assertArrayHasKey('full_name', $emailVariables);
		$this->assertArrayHasKey('email', $emailVariables);

		$this->assertEquals($emailVariables['full_name'], 'Barin Tasni');
		$this->assertEquals($emailVariables['email'], 'b3@gmail.com');

		
	}
}