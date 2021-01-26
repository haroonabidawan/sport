<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Appointment extends Model  implements Auditable
{
    use AuditingAuditable;

    //
    protected $fillable = [
        'home_team', 'away_team', 'grade','referee','referee_rate','touch_judge_one','touch_judge_two','touch_judge_rate','coach','coach_rate','file_id'
    ];

}
