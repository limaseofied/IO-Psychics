<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\HoroscopeSign;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class HoroscopeController extends Controller
{

    public function handle()
    {

       set_time_limit(600);

        $auth = "Basic NjQ3NTc5OjQ4OWU4ZTdmYzc5MjA4Njk4YWUxYThhYmNkMzczZTc5ODdmZTNhYTY=";

        $signs = HoroscopeSign::all();

        $types = [
            'previous' => Carbon::yesterday(),
            'today' => Carbon::today(),
            'next' => Carbon::tomorrow()
        ];

        foreach ($signs as $sign) {

                foreach ($types as $type => $date) {

                if ($type == 'today') {
                    $url = "https://json.astrologyapi.com/v1/sun_sign_prediction/daily/".$sign->slug;
                } else {
                    $url = "https://json.astrologyapi.com/v1/sun_sign_prediction/daily/".$type."/".$sign->slug;
                }

                $response = Http::withHeaders([
                    'Authorization' => $auth
                ])->post($url);

                $data = $response->json();

                if(isset($data['prediction'])){

                    DB::table('horoscope_daily')->updateOrInsert(

                        [
                            'sign_id'=>$sign->sign_id,
                            'horoscope_date'=>$date->format('Y-m-d')
                        ],

                        [
                            'personal_life'=>$data['prediction']['personal_life'] ?? null,
                            'profession'=>$data['prediction']['profession'] ?? null,
                            'health'=>$data['prediction']['health'] ?? null,
                            'emotions'=>$data['prediction']['emotions'] ?? null,
                            'travel'=>$data['prediction']['travel'] ?? null,
                            'luck'=>$data['prediction']['luck'] ?? null,
                            'updated_at'=>now(),
                            'created_at'=>now()
                        ]

                    );

                }

            }

            /** MONTHLY */

            $monthUrl = "https://json.astrologyapi.com/v1/horoscope_prediction/monthly/".$sign->slug;

            $response = Http::withHeaders([
                'Authorization' => $auth
            ])->post($monthUrl);

            $data = $response->json();

            DB::table('horoscope_monthly')->updateOrInsert(

                [
                    'sign_id'=>$sign->sign_id,
                    'month'=>date('m'),
                    'year'=>date('Y')
                ],

                [
                    'prediction' => isset($data['prediction']) ? json_encode($data['prediction']) : null,
                    'updated_at'=>now(),
                    'created_at'=>now()
                ]

            );

        }
    }

}