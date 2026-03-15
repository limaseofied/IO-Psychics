<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {

            // Top Attractions
            $top_attractions = Cache::remember('top_attractions', 3600, function () {
                return DB::table('attraction_master as am')
                    ->leftJoin('product_attractions as pa', 'pa.attraction_id', '=', 'am.id')
                    ->leftJoin('tour_products as tp', function ($join) {
                        $join->on('tp.id', '=', 'pa.product_id')
                             ->where('tp.deleted_flag', 0)
                             ->where('tp.status', 1);
                    })
                    ->where('am.status', 1)
                    ->where('am.top_rated', 1)
                    ->select(
                        'am.id',
                        'am.attraction_name',
                        'am.image',
                        'am.attraction_url',
                        DB::raw('COUNT(tp.id) as total_tours')
                    )
                    ->groupBy('am.id', 'am.image', 'am.attraction_name', 'am.attraction_url')
                    ->get();
            });

            // Top Destinations
            $top_destinations = Cache::remember('top_destinations', 3600, function () {
                return DB::table('destination_master as dm')
                    ->join('country_master as cm', 'cm.id', '=', 'dm.country_id')
                    ->leftJoin('product_destinations as pd', 'pd.destination_id', '=', 'dm.id')
                    ->leftJoin('tour_products as tp', function ($join) {
                        $join->on('tp.id', '=', 'pd.product_id')
                             ->where('tp.deleted_flag', 0)
                             ->where('tp.status', 1);
                    })
                    ->where('dm.status', 1)
                    ->where('dm.top_rated', 1)
                    ->where('cm.status', 1)
                    ->select(
                        'dm.id',
                        'dm.destination_name',
                        'dm.destination_url',
                        'dm.image',
                        'cm.country_name',
                        'cm.country_url',
                        DB::raw('COUNT(tp.id) as total_tours')
                    )
                    ->groupBy(
                        'dm.id',
                        'dm.destination_name',
                        'dm.destination_url',
                        'cm.country_name',
                        'dm.image',
                        'cm.country_url'
                    )
                    ->get();
            });

            // Top Countries
            $top_countries = Cache::remember('top_countries', 3600, function () {
                return DB::table('country_master')
                    ->where('status', 1)
                    ->where('top_rated', 1)
                    ->get();
            });

            // Share all with every view
            $view->with(compact('top_attractions', 'top_destinations', 'top_countries'));
        });
    }

    public function register() {}
}
