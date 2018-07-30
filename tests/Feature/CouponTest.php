<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\VoucherClasses\Coupon;

class CouponTest extends TestCase
{
    /**
     * test creating coupons
     *
     * @return void
     */
     private $Coupon;
     private $Details;

    public function testCouponCreation()
    {
      //checking if coupon creating will return array of key success
      $this->Details=array( 'recipient_id' => "13245245",
                            'offerType' => "4534234",
                            'expringdate' => date("Y-m-d H:i:s")
                          );
      $this->Coupon = new Coupon();
      $this->assertContains('success', $this->Coupon->addCoupon($this->Details));

    }


    public function testCouponGeneration()
    {
        //testing if coupon is 8 characters
        $this->Coupon = new Coupon();
        $this->assertEquals(8, strlen($this->Coupon->generateCouponCode(8)));

    }
}
