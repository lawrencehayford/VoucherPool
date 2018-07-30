<?php
namespace App\VoucherClasses;
use DB;
class Recepient {
  private $recepientData;

  public function __construct()
  {
    $this->recepientData=DB::table('recipient')
                    ->get();
  }
  public function getrecepientData()
  {
    return $this->recepientData;
  }

  public function getAllVoucherCodes($input)
  {
    $UserData=DB::table('recipient')
                     ->where([
                            ['email', '=',  $input['email']]
                            ])
                     ->first();
    //check if user exist
    if(!isset($UserData->recipient_id))
    {
      return array('authCode'=>999,
                   'message'=>'Invalid Email Address');
    }
    //get voucher details and return data
    $AllVouchers=DB::table('voucher_codes')
             ->leftjoin('special_offer', 'special_offer.offer_id', '=', 'voucher_codes.special_offer_id')
             ->leftjoin('recipient', 'recipient.recipient_id', '=', 'voucher_codes.used_by_recipient_id')
              ->where([
                      ['used_by_recipient_id', '=', $UserData->recipient_id ]
                    ])
             ->get();

    //puuting details in an array
      $voucherDetails=array();
      foreach ($AllVouchers as $AllVouchersRow)
                        {
                            array_push( $voucherDetails,array(
                                'voucherCode' => $AllVouchersRow->voucher_code,
                                'offerName' => $AllVouchersRow->offer_name
                                ));

                        }
      return array('authCode'=>'000',
                    'message'=>count($AllVouchers).' Records Fetched Successfully',
                    'voucherDetails'=>$voucherDetails
                  );

  }



}
