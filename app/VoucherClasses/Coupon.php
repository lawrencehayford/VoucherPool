<?php
namespace App\VoucherClasses;
use App\VoucherClasses\Clean;
use DB;

class Coupon {
  private $couponData;
  private $allCoupons;
  private $unusedCoupons;
  private $usedCoupons;
  private $coupon;

  public function __construct()
  {
    /**
     * this rprocesses coupons
     *
     * @return void
     */

    try
    {
      $this->offerData=DB::table('voucher_codes')
                      ->get();
      $this->CountCoupon();
    }
    catch(Exception $ex)
    {
      throw new \Exception("Error Processing Request ".$ex->getMessage(), 1);

    }

  }
  public function getCouponData()
  {
    /**
     * this
     *generate coupon data
     * @return array
     */
    $this->GenerateCouponData();
    return $this->couponData;
  }

  public function getAllCoupons()
  {
    /**
     * this return all Coupons
     *
     * @return string
     */
    return $this->allCoupons;
  }

  public function getUsedCoupons()
  {
    /**
     * this return usedCoupons
     *
     * @return string
     */
    return $this->usedCoupons;
  }

  public function getUnusedCoupons()
  {
    /**
     * this return unusedCoupons
     *
     * @return string
     */
    return $this->unusedCoupons;
  }

  public function getCoupon()
  {
    /**
     * this return unusedCoupons
     *
     * @return string
     */
    return $this->coupon;
  }

  public function setCoupon($coupon)
  {
    /**
     * setting coupon
     *
     */
     $this->coupon=$coupon;
  }

  public function CountCoupon()
  {
    /**
     * this counts coupon
     *
     * @return void
     */

    try
    {
      $this->unusedCoupons = DB::table('voucher_codes')
                       ->where([
                              ['usage_try', '=', 0]
                              ])
                       ->count();

      $this->usedCoupons = DB::table('voucher_codes')
                        ->where([
                               ['usage_try', '=', 1]
                               ])
                        ->count();

      $this->allCoupons=$this->unusedCoupons+$this->usedCoupons;

    }
    catch(Exception $ex)
    {
      throw new \Exception("Error Processing Request ".$ex->getMessage(), 1);

    }


  }

  public function GenerateCouponData()
  {
    /**
     * this generate couponDate
     *
     * @return bool
     */
    try
    {
      $this->couponData = DB::table('voucher_codes')
               ->leftjoin('special_offer', 'special_offer.offer_id', '=', 'voucher_codes.special_offer_id')
               ->leftjoin('recipient', 'recipient.recipient_id', '=', 'voucher_codes.used_by_recipient_id')
               ->get();
    }
    catch(Exception $ex)
    {
      throw new \Exception("Error Processing Request ".$ex->getMessage(), 1);

    }

  }


  public function addCoupon($inputs)
  {
    /**
     * this adds new  coupon
     *
     * @return true
     */
     try
     {
       $CleanClass = new Clean();
       $recipient_id = $CleanClass->Check($inputs['recipient_id']);
       $offerType = $CleanClass->Check($inputs['offerType']);
       $expringdate = $CleanClass->Check($inputs['expringdate']);
       $isSaved=DB::table('voucher_codes')->insert(
      array(
              'voucher_id'     =>   time(),
              'used_by_recipient_id'     => $recipient_id,
              'voucher_code'   =>   $this->generateCouponCode(8),
              'special_offer_id'   =>   $offerType,
              'date_created'   =>   date("Y-m-d h:m:i"),
              'expiring_date'   =>   $expringdate,
              'usage_try'   =>   0,

              ));

      if($isSaved)
      {
        return array('success'=>0,
                      'message'=>'Coupon Added Successfully');
      }
      else
      {
        return array('success'=>1,
                     'message'=>'Error Processing Request');

      }

     }
     catch(Exception $ex)
     {
       throw new \Exception("Error Processing Request ".$ex->getMessage(), 1);

     }


  }


  public function generateCouponCode($size)
  {
    /**
     * this generate coupon
     *
     * @return string
     */
     return strtoupper(substr(md5(time().rand(10000,99999)),0,$size));

  }


  public function validateCoupon($coupon)
  {
      if($this->checkLength($coupon['voucher'])==1)
      {

        return $this->getCouponDiscount($coupon);
      }
      else
      {
        return array('authCode'=>999,
                            'message'=>'Voucher Number less than Required Length');
      }
  }

  public function getCouponDiscount($coupon)
  {
    $this->setCoupon($coupon);
    /**
     * this gets the coupon discount. it also checks if coupon is not used
     *
     * @return string
     */
     //doing a transaction to query discount and update user
     try
     {
       return DB::transaction(function(){
         //validating email of reciepient
         $coupon=$this->getCoupon();

         $UserValidCount=DB::table('recipient')
                           ->where([
                                     ['email', '=', $coupon['email']]
                                   ])
                         ->count();

          if($UserValidCount<1)
          {
            return array('authCode'=>999,
                         'message'=>'Invalid Email Address');
          }

          //validating voucher

          $voucherData = DB::table('voucher_codes')
                        ->leftjoin('special_offer', 'special_offer.offer_id', '=', 'voucher_codes.special_offer_id')
                             ->where([
                                       ['voucher_code', '=', $coupon['voucher']],
                                       ['usage_try', '=', 0]
                                     ])
                            ->first();

            //updating voucher used try
            DB::table('voucher_codes')
                       ->where('voucher_code', $coupon['voucher'])
                       ->update(array(
                                       'usage_try' =>  1,
                                       'date_used' =>  date("Y-m-d h:m:i")
                                     ));
          //checking if it returned discount
           if(isset($voucherData->discount))
            {
             return array('authCode'=>000,
                          'message'=>'This voucher is valid',
                          'discount'=>$voucherData->discount);
            }
            else
            {
              return array('authCode'=>999,
                           'message'=>'This voucher is invalid Or has been used');
            }

       });



     }
     catch(Exception $ex)
     {
       throw new \Exception("Error Processing Request ".$ex->getMessage(), 1);

     }


  }

  public function checkLength($coupon)
  {
    /**
     * thischecks coupon lenght
     *
     * @return true
     */

    if(strlen($coupon)==8)
    {
        return true;
    }
    else
    {
      return false;
    }

  }


}
