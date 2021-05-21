<?php

namespace App\Http\Traits;
trait ValidationTraits
{
    use RespondsWithHttpStatus;

    public function firstErrorMessage($validator)
    {
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            return false;
        }
    }
}
