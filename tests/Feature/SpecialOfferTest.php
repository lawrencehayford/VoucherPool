<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\VoucherClasses\SpecialOffer;

class SpecialOfferTest extends TestCase
{
    /**
     * get Special Offer with ID.
     *
     * @return void
     */
    private $SpecialOffer;

    public function testgetOfferWithId()
    {
      //testing offer with Id
        $this->SpecialOffer = new SpecialOffer();
      $this->assertNull($this->SpecialOffer->getOfferWithId("21324"));
    }
}
