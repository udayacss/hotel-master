<?php


namespace App\Enums;

enum Status: int
{

   const REFERRAL_ACTIVE = 1;
   const REFERRAL_INACTIVE = 0;

   const SUBSCRIPTION_ACTIVE = 1;
   const SUBSCRIPTION_INACTIVE = 0;
   const SUBSCRIPTION_ACHIEVED = 1;
   const SUBSCRIPTION_CHECKED = 1;

   const BOARD_ACTIVE = 1;
   const BOARD_COMPLETED = 2;

   const SELLER_ACTIVE = 1;
   const SELLER_INACTIVE = 0;
}
