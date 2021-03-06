<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Wallet extends Model
{
    //
    protected $table = 'wallets';

    protected $fillable = [
        'user_id', 'bonus_id', 'referred_id', 'orden_id', 'liquidation_id', 'amount',
        'description', 'status', 'type_transaction',
        'liquidated'
    ];

    /**
     * Permite obtener la orden de esta comision
     *
     * @return void
     */
    public function getWalletOrden()
    {
        return $this->belongsTo('App\Models\OrdenService', 'orden_id', 'id');
    }

    /**
     * Permite obtener al usuario de una comision
     *
     * @return void
     */
    public function getWalletUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Permite obtener al referido de una comision
     *
     * @return void
     */
    public function getWalletReferred()
    {
        return $this->belongsTo('App\Models\User', 'referred_id', 'id');
    }

    public function bonus(): BelongsTo
    {
        return $this->belongsTo(Bonus::class);
    }
}
