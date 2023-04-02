<?php

namespace Ferdiunal\History\Models\UlId;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Ferdiunal\History\Models\History as BaseHistory;

class History extends BaseHistory
{
    use HasUlids;
}