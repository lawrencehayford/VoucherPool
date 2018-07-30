<?php

namespace App\Http\Controllers;
use App\VoucherClasses\Coupon;
use Request;


class CouponController extends Controller
{
    private $Coupon;
    private $inputs;
    public function __construct()
    {

        $this->Coupon = new Coupon();
        $this->inputs = Request::all();

    }
    public function create()
    {
      //save coupon

      return $this->Coupon->addCoupon($this->inputs);;

    }
    public function validateCoupon()
    {

        return json_encode($this->Coupon->validateCoupon($this->inputs));
    }
}
