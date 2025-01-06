<?php

namespace App\Http\Controllers;

use Fuko\Masked\Protect;
use Fuko\Masked\Redact;

class MaskedController extends Controller
{
    public function redactData() 
    {
        $secretKey = 'b<{em7^.!U3"A5Sy';
        $infoAry = ['detail' => __('Secret key:') . $secretKey . '。'];

        Protect::hideValue($secretKey); 
        $redactedAry = Protect::protect($infoAry);
        echo __('Preset mask') . ' - ' . $redactedAry['detail'] . '<br/>';

        Redact::setRedactCallback( [Redact::class, 'disguise'], [4, '*']);

        Protect::hideValue($secretKey); 
        $redactedAry = Protect::protect($infoAry);
        echo __('Adjust mask') . ' - ' . $redactedAry['detail'] . '<br/>';
    }
}
