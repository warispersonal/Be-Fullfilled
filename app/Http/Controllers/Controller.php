<?php

namespace App\Http\Controllers;

use App\Http\Traits\Generic;
use App\Http\Traits\RemoveFilesTraits;
use App\Http\Traits\RespondsWithHttpStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use RespondsWithHttpStatus;

    use Generic;

    use RemoveFilesTraits;

}
