<?php
namespace App\Http\Controllers;
use App\VoucherClasses\SpecialOffer;
use App\VoucherClasses\Coupon;
use App\VoucherClasses\Recepient;


class WelcomeController extends Controller
{
    //
    public function index()
    {
      //initailize special offer
       $SpecialOffer = new SpecialOffer();
       //initialize coupons
       $Coupon = new Coupon();
       //initialize recepient info
       $Recepient = new Recepient();
       //returning data to view
     	 return view('welcome',['offer' =>  $SpecialOffer->getOfferData(),
                              'couponData' =>  $Coupon->getCouponData(),
                              'recepientData' =>  $Recepient->getrecepientData(),
                              'allCoupons' =>  $Coupon->getAllCoupons(),
                              'unusedCoupons' =>  $Coupon->getUnusedCoupons(),
                              'usedCoupons' =>  $Coupon->getUsedCoupons()]);
    }
}
