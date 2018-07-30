<?php

namespace App\Http\Controllers;
use App\VoucherClasses\Recepient;
use Request;

class RecepientController extends Controller
{
      private $inputs;
      private $Recepient;
      public function __construct()
      {

          $this->Recepient = new Recepient();
          $this->inputs = Request::all();

      }

      public function getAllVoucherCodes()
      {

          return json_encode($this->Recepient->getAllVoucherCodes($this->inputs));
      }
}
