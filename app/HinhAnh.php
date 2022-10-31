<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    public    $timestamps   = false; //created_at, updated_at

    protected $table        = 'cusc_hinhanh';
    protected $fillable     = ['ha_ten'];
    protected $guarded      = ['sp_ma', 'ha_stt'];

    protected $primaryKey   = ['sp_ma', 'ha_stt'];
    public    $incrementing = false;

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}