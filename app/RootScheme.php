<?php

namespace App;
use App\Scheme;

use Illuminate\Database\Eloquent\Model;

class RootScheme extends Model
{
   protected $table='rootschemes';
   protected $primaryKey = 'rootschemeid';
    protected $fillable = [
        'rootschemeid','rootschemename','description','status',
    ];
    
    public function scheme()
{
  return $this->HasMany('Scheme::class');
}
}
