<?php

namespace App\Http\Controllers\Admin\Test;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\BoardSlot;
use App\Models\SellerSubcription;
use App\Services\BoardService;
use DB;
use Illuminate\Http\Request;

class ReCorrectionController extends Controller
{
    public function rollbackSubscriptionApprove(int $protected_board_id): string
    {
        DB::transaction(function () use ($protected_board_id) {
            $this->clearBoardSlots();
            $this->clearBoards([$protected_board_id]);
            $this->updateProtectedBoard(protected_board_id: $protected_board_id);
            $this->clearSubscriptions();
        });
        return "success";
    }

    public function startSubscriptionApprove(): string
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
                'seller_subcriptions.bank_ref',
                'seller_subcriptions.seller_id',
                'seller_subcriptions.id as sub_id'
            )
            ->get();

        foreach ($subs as $sub) {
            (new BoardService())->updateAvailableBoardAndAssign(
                subscription_id: $sub->id
            );
        }
        return "success";
    }

    private function clearBoardSlots(array $board_slot_id = []): bool
    {
        BoardSlot::whereNotIn('id', [1, 2, 3, 4])->delete();
        return true;
    }

    private function clearBoards(array $protected_board_id = []): bool
    {
        Board::whereNotIn('id', $protected_board_id)->delete();
        return true;
    }

    private function clearSubscriptions(array $subscr = []): bool
    {
        SellerSubcription::whereNotIn('id', [1, 2, 3, 4])->update(['status' => 0]);
        return true;
    }

    private function updateProtectedBoard(int $protected_board_id): bool
    {
        $board = Board::where('id', $protected_board_id)->first();
        $board->status = Status::BOARD_ACTIVE;
        $board->slot_five = null;
        $board->slot_six = null;
        $board->slot_seven = null;
        $board->slot_eight = null;
        $board->slot_nine = null;
        $board->slot_ten = null;
        $board->slot_eleven = null;
        $board->slot_twelve = null;
        $board->slot_thirteen = null;
        $board->save();
        return true;
    }
}
