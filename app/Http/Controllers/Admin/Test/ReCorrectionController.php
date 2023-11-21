<?php

namespace App\Http\Controllers\Admin\Test;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\BoardSlot;
use App\Models\SellerSubcription;
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
