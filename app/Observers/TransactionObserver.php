<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use App\Models\Transaction;
use App\Models\Donation;

class TransactionObserver
{
    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
        Log::info('TRANSAKSI MASUK', [
            'donasi_id' => $transaction->donasi_id,
            'jumlah' => $transaction->jumlah
        ]);
        Donation::where('id', $transaction->donasi_id)
            ->increment('jumlahsaatini', $transaction->jumlah);
    }

    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        if ($transaction->isDirty('jumlah')) {
            $selisih = $transaction->jumlah - $transaction->getOriginal('jumlah');

            Donation::where('id', $transaction->donasi_id)
                ->increment('jumlahsaatini', $selisih);
        }
    }

    /**
     * Handle the Transaction "deleted" event.
     */
    public function deleted(Transaction $transaction): void
    {
        Donation::where('id', $transaction->donasi_id)
            ->decrement('jumlahsaatini', $transaction->jumlah);
    }

    /**
     * Handle the Transaction "restored" event.
     */
    public function restored(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "force deleted" event.
     */
    public function forceDeleted(Transaction $transaction): void
    {
        //
    }
}
