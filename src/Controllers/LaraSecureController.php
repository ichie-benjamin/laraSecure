<?php

namespace Ogbuechi\LaraSecure\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class LaraSecureController
{



    public function dxxss()
    {
        return [
            base64_decode('YWN0aXZl') => 1
        ];
        if (self::is_local()) {
            return [
                base64_decode('YWN0aXZl') => 1
            ];
        } else {
            try {
                $remove = array("http://", "https://", "www.");
                $url = str_replace($remove, "", url('/'));
                return Http::get(base64_decode('aHR0cHM6Ly9iYXNlLndlYnRyYWRlci5wbHVzL2NoZWNrLWRvbWFpbg=='),
                    array(base64_decode('dXJs') => $url));
            } catch (\Exception $exception) {
                return [
                    base64_decode('YWN0aXZl') => 1
                ];
            }

        }
    }

    public function actch()
    {
        return response()->json([
            'active' => 1
        ]);

        if (self::is_local()) {
            return response()->json([
                'active' => 1
            ]);
        }
        else {
            $remove = array("http://","https://","www.");
            $url= str_replace($remove,"",url('/'));

            $post = [
                base64_decode('dXNlcm5hbWU=') => env(base64_decode('QlVZRVJfVVNFUk5BTUU=')),//un
                base64_decode('cHVyY2hhc2Vfa2V5') => env(base64_decode('UFVSQ0hBU0VfQ09ERQ==')),//pk
                base64_decode('c29mdHdhcmVfaWQ=') => base64_decode(env(base64_decode('U09GVFdBUkVfSUQ='))),//sid
                base64_decode('ZG9tYWlu') => $url,
            ];
            try {
                $ch = curl_init(base64_decode('aHR0cHM6Ly9jaGVjay42YW10ZWNoLmNvbS9hcGkvdjEvYWN0aXZhdGlvbi1jaGVjaw=='));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                $response = curl_exec($ch);
                //$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                return response()->json([
                    'active' => (int)base64_decode(json_decode($response, true)['active'])
                ]);

            } catch (\Exception $exception) {
                return response()->json([
                    'active' => 1
                ]);
            }
        }
    }




    function is_local()
    {
        if ($_SERVER[base64_decode('UkVNT1RFX0FERFI=')] == base64_decode('MTI3LjAuMC4x')
            || $_SERVER[base64_decode('SFRUUF9IT1NU')] == base64_decode('bG9jYWxob3N0')
            || substr($_SERVER[base64_decode('SFRUUF9IT1NU')], 0, 3) == '10.'
            || substr($_SERVER[base64_decode('SFRUUF9IT1NU')], 0, 7) == base64_decode('MTkyLjE2OA==')) return true;
        return false;
    }
}
