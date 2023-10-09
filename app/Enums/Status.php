<?php


namespace App\Enums;

enum Status: int
{

   const REFERRAL_ACTIVE = 1;
   const REFERRAL_INACTIVE = 0;

   const SUBSCRIPTION_ACTIVE = 1;
   const SUBSCRIPTION_INACTIVE = 0;
   const SUBSCRIPTION_ACHIVED = 1;
}
