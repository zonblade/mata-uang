<?php

namespace MataUang;

function mata_uang()
{
    $val        = func_get_args()[0];
    $pembulatan = false;
    $decs       = 0;
    if (isset(func_get_args()[2])) {
        $pembulatan = func_get_args()[2];
    }
    if (isset(func_get_args()[1])) {
        $decs = func_get_args()[1];
    }
    
    $val = (string)number_format((float)$val, 2, '.', ',');
    $val = explode('.', $val);
    $account = $val[0];
    $decimal = '00';
    if (isset($val[1])) {
        $decimal = $val[1];
    }
    $account   = explode(',', $account);
    $marking_a = array_reverse($account);
    $marking_b = count($marking_a);

    $num = 0;
    $mrk = '';

    if ($marking_b === 1) {
        $num = $account[0];
        $mrk = '';
    } elseif ($marking_b === 2) {
        $acc = $account[1];
        $subtr = substr($acc, 0, $decs);
        if ($pembulatan) {
            $subtr = substr($acc, 0, $decs);
            $subtr = str_split($subtr);
            $subtr = array_reverse($subtr);
            $subtr_1 = 0;
            $subtr_2 = 0;
            if ($decs > 1) {
                $subtr_1 = $subtr[0];
                $subtr_2 = $subtr[1];
                if ((float)$subtr_1 >= 5) {
                    $subtr_1 = 0;
                    $subtr_2 = (float)$subtr_2 + 1;
                }
            }
            $subtr = $subtr_2 . '0';
            $subtr = '.' . (float)$subtr;
        }
        $num = $account[0] . $subtr;
        $mrk = 'Ribu';
    } elseif ($marking_b === 3) {
        $acc = $account[1] . $account[2];
        $subtr = substr($acc, 0, $decs);
        if ($pembulatan) {
            $subtr = substr($acc, 0, $decs);
            $subtr = str_split($subtr);
            $subtr = array_reverse($subtr);
            $subtr_1 = 0;
            $subtr_2 = 0;
            if ($decs > 1) {
                $subtr_1 = $subtr[0];
                $subtr_2 = $subtr[1];
                if ((float)$subtr_1 >= 5) {
                    $subtr_1 = 0;
                    $subtr_2 = (float)$subtr_2 + 1;
                }
            }
            $subtr = $subtr_2 . '0';
            $subtr = '.' . (float)$subtr;
        }
        $num = $account[0] . $subtr;
        $mrk = 'Juta';
    } elseif ($marking_b === 4) {
        $acc = $account[1] . $account[2] . $account[3];
        $subtr = substr($acc, 0, $decs);
        if ($pembulatan) {
            $subtr = substr($acc, 0, $decs);
            $subtr = str_split($subtr);
            $subtr = array_reverse($subtr);
            $subtr_1 = 0;
            $subtr_2 = 0;
            if ($decs > 1) {
                $subtr_1 = $subtr[0];
                $subtr_2 = $subtr[1];
                if ((float)$subtr_1 >= 5) {
                    $subtr_1 = 0;
                    $subtr_2 = (float)$subtr_2 + 1;
                }
            }
            $subtr = $subtr_2 . '0';
            $subtr = '.' . (float)$subtr;
        }
        $num = $account[0] . $subtr;
        $mrk = 'Milliar';
    } elseif ($marking_b === 5) {
        $acc = $account[1] . $account[2] . $account[3] . $account[4];
        $subtr = substr($acc, 0, $decs);
        if ($pembulatan) {
            $subtr = substr($acc, 0, $decs);
            $subtr = str_split($subtr);
            $subtr = array_reverse($subtr);
            $subtr_1 = 0;
            $subtr_2 = 0;
            if ($decs > 1) {
                $subtr_1 = $subtr[0];
                $subtr_2 = $subtr[1];
                if ((float)$subtr_1 >= 5) {
                    $subtr_1 = 0;
                    $subtr_2 = (float)$subtr_2 + 1;
                }
            }
            $subtr = $subtr_2 . '0';
            $subtr = '.' . (float)$subtr;
        }
        $num = $account[0] . $subtr;
        $mrk = 'Triliun';
    }

    return [
        'num'    => $num,
        'mark'   => (string)$mrk,
        'res'    => $num . ' ' . $mrk
    ];
}
