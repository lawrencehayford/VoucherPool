<?php
namespace App\VoucherClasses;
class Clean {

  public function Check($var)
  {
    /**
     * this cleans input values
     *
     * @return string
     */
    return strip_tags(trim($var));
  }
}
