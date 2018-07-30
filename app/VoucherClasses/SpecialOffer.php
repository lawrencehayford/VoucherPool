<?php
namespace App\VoucherClasses;
use DB;
class SpecialOffer {
  private $offerData;

  public function __construct()
  {
    $this->offerData=DB::table('special_offer')
                    ->get();
  }
  public function getOfferData()
  {
    return $this->offerData;
  }

  public function getOfferAmount($offerId)
  {
    return $this->offerData;
  }



  public function getOfferWithId($offerId)
  {
      $result=DB::table('special_offer')
                  ->where('offer_id','=',$offerId)
                  ->first();
      if(isset($result->offer_id)){
        return $result->discount;
      }


  }



}
