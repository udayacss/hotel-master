<?php

namespace App\Services;

use App\Enums\Status;
use App\Models\Board;
use App\Models\BoardSlot;
use App\Models\Referral;
use App\Models\Seller;
use App\Models\SellerEarning;
use App\Models\SellerSubcription;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BoardService
{
    private  $new_board_ids = [];
    private  $refuge_seller_ids = [];

    public function assignToBoard($ref)
    {
        return Referral::where('ref_no', $ref)->first()->id;
    }

    public function createNewBoard($owner_id, $from = 0)
    {
        // Log::info('ERR :'.$owner_id);
        $board =  Board::create([
            'code' => $this->generateBoardCode($owner_id),
            'name' => $this->generateBoardCode($owner_id),
            'owner_seller_id' => $owner_id,
            'slot_one' => $owner_id,
            'from_board_id' => $from
        ]);

        $this->createBoardSlot(
            boardId: $board->id,
            sellerId: $owner_id,
            refSellerId: 0
        );

        return $board->id;
    }

    public function generateBoardCode($owner_id)
    {
        $key = 'HMB';
        $number = mt_rand(100, 1000); // better than rand()

        $unique = $key . $owner_id . '-' . $number;
        return $unique;
    }

    function uniqueIdExists($number, $table, $column)
    {
        return DB::table($table)->where($column, $number)->exists();
    }

    function updateAvailableBoardAndAssign(
        int $subscription_id,
    ) {
        DB::transaction(function () use ($subscription_id) {


            $subscription = SellerSubcription::where('id', $subscription_id)->first();

            $seller = Seller::whereId($subscription->seller_id)->first();

            $ref_user = User::whereId($seller->referrer_id)->first();

            $ref_seller = Seller::where('user_id', $ref_user->id)->first();

            $available_board = BoardSlot::join('boards', 'boards.id', 'board_slots.board_id')
                ->where('board_slots.seller_id', $ref_seller->id)
                // ->where('boards.level_id', $subscription->level_id)
                ->where('boards.status', Status::BOARD_ACTIVE)
                ->first();

            $board_closed = false;
            $available_board = Board::whereId($available_board->board_id)->first();

            if (!isset($available_board->slot_two)) {
                $available_board->slot_two = $seller->id;
            } else if (!isset($available_board->slot_three)) {
                $available_board->slot_three = $seller->id;
            } else if (!isset($available_board->slot_four)) {
                $available_board->slot_four = $seller->id;
            } else if (!isset($available_board->slot_five)) {
                $available_board->slot_five = $seller->id;
            } else if (!isset($available_board->slot_six)) {
                $available_board->slot_six = $seller->id;
            } else if (!isset($available_board->slot_seven)) {
                $available_board->slot_seven = $seller->id;
            } else if (!isset($available_board->slot_eight)) {
                $available_board->slot_eight = $seller->id;
            } else if (!isset($available_board->slot_nine)) {
                $available_board->slot_nine = $seller->id;
            } else if (!isset($available_board->slot_ten)) {
                $available_board->slot_ten = $seller->id;
            } else if (!isset($available_board->slot_eleven)) {
                $available_board->slot_eleven = $seller->id;
            } else if (!isset($available_board->slot_twelve)) {
                $available_board->slot_twelve = $seller->id;
            } else if (!isset($available_board->slot_thirteen)) {
                $available_board->slot_thirteen = $seller->id;
                $board_closed = true;
                $available_board->status = Status::BOARD_COMPLETED;
            }

            $available_board->save();

            $seller->is_active = Status::SELLER_ACTIVE;
            $seller->save();

            $subscription->status = Status::SUBSCRIPTION_CHECKED;
            $subscription->save();

            $this->createBoardSlot(
                boardId: $available_board->id,
                sellerId: $seller->id,
                refSellerId: $ref_seller->id,
                subscriptionId: $subscription_id,
                sellerEarningType: SellerEarning::DIRECT_SALE
            );

            if ($board_closed) {
                $this->closeBoard($available_board->id);
            }
        });

        if (sizeof($this->refuge_seller_ids) > 0) {

            foreach ($this->refuge_seller_ids as $key => $seller_id) {

                $this->assignNoRefsToNewBoard($seller_id);
            }
        }
    }

    public function closeBoard($board_id)
    {
        $board = Board::whereId($board_id)->first();

        $owner = SellerSubcription::where('seller_id', $board->owner_seller_id)->first();
        $owner->achieved = status::SUBSCRIPTION_ACHIEVED;
        $owner->save();

        $board_members = BoardSlot::where('seller_id', '!=', $board->owner_seller_id)
            ->where('board_id', $board->id)
            ->pluck('seller_id')
            ->toArray();

        $board_sales = BoardSlot::where('seller_id', '!=', $board->owner_seller_id)
            // ->where('ref_seller_id', '!=', $board->owner_seller_id)
            ->where('board_id', $board->id)
            ->whereIn('seller_id', $board_members)
            ->pluck('ref_seller_id')
            ->toArray();

        $newBoardSales = [];
        foreach ($board_sales as $bSale) {
            if (in_array($bSale, $board_members)) {
                array_push($newBoardSales, $bSale);
            }
        }

        $sales = array_count_values($newBoardSales);

        /* 
            creating new boards starts
        */

        $board_owners = [];

        //check sales up to 3
        $round = 0;
        foreach ($sales as $key => $sale) {
            if ($sale >= 3) {
                if ($round < 3) {
                    if ($key != $board->owner_seller_id) {

                        array_push($this->new_board_ids, $this->createNewBoard($key, $board->id));
                        array_push($board_owners, $key);
                        $round++;
                    }
                }
            }
        }

        //check sales up to 2
        if ($round != 3) {
            foreach ($sales as $key => $sale) {
                if ($sale == 2) {
                    if ($round < 3) {
                        if ($key != $board->owner_seller_id) {
                            array_push($this->new_board_ids, $this->createNewBoard($key, $board->id));
                            array_push($board_owners, $key);
                            $round++;
                        }
                    }
                }
            }
        }


        if ($round != 3) {
            foreach ($sales as $key => $sale) {
                if ($sale == 1) {
                    if ($round < 3) {
                        if ($key != $board->owner_seller_id) {
                            array_push($this->new_board_ids, $this->createNewBoard($key, $board->id));
                            array_push($board_owners, $key);
                            $round++;
                        }
                    }
                }
            }
        }

        /* 
            creating new boards ends
        */


        $sales = BoardSlot::where('seller_id', '!=', $board->owner_seller_id)
            ->where('board_id', $board->id)
            ->pluck('seller_id')->toArray();
        foreach ($sales as $key => $sale) {
            if (!in_array($sale, $board_owners)) {
                if ($sale != $board->owner_seller_id) {
                    $this->assignToNewBoard($sale);
                }
            }
        }
    }

    public function assignToNewBoard($sller_id)
    {
        $seller = Seller::find($sller_id);

        $ref_user = User::whereId($seller->referrer_id)->first();
        $ref_seller = Seller::where('user_id', $ref_user->id)->first();

        $available_board = BoardSlot::join('boards', 'boards.id', 'board_slots.board_id')
            ->where('board_slots.seller_id', $ref_seller->id)
            // ->where('boards.level_id', $subscription->level_id)
            ->where('boards.status', Status::BOARD_ACTIVE)
            ->first();

        if (!isset($available_board)) {
            array_push($this->refuge_seller_ids, $seller->id);
            return;
        } else {

            $available_board = Board::whereId($available_board->board_id)->first();
        }

        $this->udpateAvailableBoard(
            available_board: $available_board,
            seller: $seller,
            ref_seller: $ref_seller
        );
    }

    /*
    **assign sellers who don't hava available boards
    */
    public function assignNoRefsToNewBoard($seller_id)
    {
        $seller = Seller::find($seller_id);

        $ref_user = User::whereId($seller->referrer_id)->first();
        $ref_seller = Seller::where('user_id', $ref_user->id)->first();

        $available_board = Board::where('status', Board::BOARD_ACTIVE)
            ->whereIn('id', $this->new_board_ids)
            ->where(function ($q) {
                $q->orWhereNull('slot_two')
                    ->orWhereNull('slot_three')
                    ->orWhereNull('slot_four');
            })
            ->first();

        // if (!isset($available_board)) {
        //     $available_board = Board::where('status', Board::BOARD_ACTIVE)->first();
        // }

        $this->udpateAvailableBoard(
            available_board: $available_board,
            seller: $seller,
            ref_seller: $ref_seller
        );
    }

    private function udpateAvailableBoard(Board $available_board, Seller $seller, Seller $ref_seller)
    {
        if (!isset($available_board->slot_two)) {
            $available_board->slot_two = $seller->id;
        } else if (!isset($available_board->slot_three)) {
            $available_board->slot_three = $seller->id;
        } else if (!isset($available_board->slot_four)) {
            $available_board->slot_four = $seller->id;
        } else if (!isset($available_board->slot_five)) {
            $available_board->slot_five = $seller->id;
        } else if (!isset($available_board->slot_six)) {
            $available_board->slot_six = $seller->id;
        } else if (!isset($available_board->slot_seven)) {
            $available_board->slot_seven = $seller->id;
        } else if (!isset($available_board->slot_eight)) {
            $available_board->slot_eight = $seller->id;
        } else if (!isset($available_board->slot_nine)) {
            $available_board->slot_nine = $seller->id;
        } else if (!isset($available_board->slot_ten)) {
            $available_board->slot_ten = $seller->id;
        } else if (!isset($available_board->slot_eleven)) {
            $available_board->slot_eleven = $seller->id;
        } else if (!isset($available_board->slot_twelve)) {
            $available_board->slot_twelve = $seller->id;
        } else if (!isset($available_board->slot_thirteen)) {
            $available_board->slot_thirteen = $seller->id;
        }

        $available_board->save();

        $this->createBoardSlot(
            boardId: $available_board->id,
            sellerId: $seller->id,
            refSellerId: $ref_seller->id
        );
    }

    // public function assignToBoard($referrer_id, $seller_id)
    // {
    //     $active_board = Board::where('owner_seller_id', $seller_id)
    //         ->where('status', Status::BOARD_ACTIVE)
    //         ->first();
    // }

    public function getPendingSubscriptions()
    {

        $subs = SellerSubcription::with('seller')
            ->join('sellers', 'sellers.id', 'seller_subcriptions.seller_id')
            ->where('seller_subcriptions.status', Status::SUBSCRIPTION_INACTIVE)
            ->select(
                'sellers.id',
                'sellers.first_name',
                'sellers.last_name',
                'seller_subcriptions.level_id',
                'seller_subcriptions.created_at',
                'seller_subcriptions.id as sub_id'
            )
            ->get();

        foreach ($subs as $sub) {
            $sub->sub_id = (new EncryptService())->encryptUsingRandom($sub->sub_id);
        }

        return $subs;
    }

    private function createBoardSlot(
        int $boardId,
        int $sellerId,
        int $refSellerId,
        ?int $subscriptionId = null,
        ?string $sellerEarningType = null
    ) {
        $slot = BoardSlot::create([
            'board_id' => $boardId,
            'seller_id' => $sellerId,
            'ref_seller_id' => $refSellerId,
            'subscription_id' => $subscriptionId,
        ]);

        if (isset($sellerEarningType)) {
            if ($sellerEarningType == SellerEarning::DIRECT_SALE) {

                SellerEarning::create([
                    'board_slot_id' => $slot->id,
                    'type' => SellerEarning::DIRECT_SALE,
                    'points' => SellerEarning::DIRECT_SALE_VALUE,
                    'seller_id' => $refSellerId,
                    'status' => SellerEarning::NOT_PAID
                ]);
            }
        }
    }
}
