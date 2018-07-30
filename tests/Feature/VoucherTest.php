<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\VoucherClasses\Recepient;

class VoucherTest extends TestCase
{
    /**
     * test getting all voucher for a particular email
     *
     * @return void
     */

     private $inputs;
     private $Recepient;

    public function testGetAllVoucherCodes()
    {
      //testing if it will return voucher details
      $this->Recepient = new Recepient();
      $this->inputs = array(
          'email' => "lawrencecaselyhayford@gmail.com",
        );
      $this->assertContains('voucherDetails', json_encode($this->Recepient->getAllVoucherCodes($this->inputs)));
    }
}
