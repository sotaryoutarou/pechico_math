<?php

$x = 0.1; // 1をスタートにしたいので初期化で調整
for ($i=1; $i<11; $i++) {
    $x *=10;
    print 'x=' . $x . str_repeat(' ', 11-$i) . formula($x) . "\n";
}

function formula($x)
{
    // 3x^3-x
    $numerator = 3*pow($x, 3) - $x;
    // 2x^3+x^2
    $denominator = 2*pow($x, 3) + pow($x, 2);

    return $numerator / $denominator;
}
