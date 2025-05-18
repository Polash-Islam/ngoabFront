<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NgoTypeAndLanguage;
use DB;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if(\Illuminate\Support\Facades\Schema::hasTable('project_subjects')){

            $projectSubjectList = DB::table('project_subjects')->orderBy('id','desc')->get();

        }else{
            $projectSubjectList= 0;


        }

        view()->share('projectSubjectList', $projectSubjectList);


        if(\Illuminate\Support\Facades\Schema::hasTable('ngo_type_and_languages')){



             //compose all the views....
    view()->composer('*', function ($view)
    {
        if (Auth::check()) {
        $localNgoTypem = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
            ->where('ngo_type','দেশিও')->value('ngo_type_new_old');


            $foreignNgoType = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
            ->where('ngo_type','Foreign')->value('ngo_type_new_old');



        $view->with('localNgoTypem', $localNgoTypem );
        $view->with('foreignNgoType', $foreignNgoType );

        }else{
            $view->with('localNgoTypem', '1');
            $view->with('foreignNgoType','2');

        }
    });







        }else{

            $localNgoTypem = 0;


            $foreignNgoType = 0;

            view()->share('localNgoTypem', $localNgoTypem);
            view()->share('foreignNgoType',  $foreignNgoType);

        }

        //dd($foreignNgoType);


    }
}
