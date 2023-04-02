<?php

namespace Ferdiunal\History\Models\Uuid;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ferdiunal\History\Models\History as BaseHistory;
class History extends BaseHistory
{
    use HasUuids;
}