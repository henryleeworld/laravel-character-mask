<?php

namespace App\Http\Controllers;

use Fuko\Masked\Redact;
use Fuko\Masked\Protect;

class MaskedController extends Controller
{
    public function redactData() 
    {
        $secretKey = 'b<{em7^.!U3"A5Sy';
        $infoAry = ['detail' => '秘密金鑰：' . $secretKey . '。'];

        Protect::hideValue($secretKey); 
        $redactedAry = Protect::protect($infoAry);
        echo '預設遮罩 - ' . $redactedAry['detail'] . '<br/>';

        Redact::setRedactCallback( [Redact::class, 'disguise'], ['*']);

        Protect::hideValue($secretKey); 
        $redactedAry = Protect::protect($infoAry);
        echo '調整遮罩 - ' . $redactedAry['detail'] . '<br/>';
    }
}
