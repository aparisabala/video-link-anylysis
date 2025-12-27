<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\IBaseRepository;
use Illuminate\Support\ServiceProvider;
//vpx_imports
use App\Repositories\Admin\UserHistory\Dt\UserVisitHistory\IUserVisitHistoryDtRepository;
use App\Repositories\Admin\UserHistory\Dt\UserVisitHistory\UserVisitHistoryDtRepository;
use App\Repositories\Admin\LinkManagement\Crud\IVideoLinkCrudRepository;
use App\Repositories\Admin\LinkManagement\Crud\VideoLinkCrudRepository;
use App\Repositories\Site\Landing\ISiteLandingRepository;
use App\Repositories\Site\Landing\SiteLandingRepository;
class RepositoryServiceProvider extends ServiceProvider
{
        /**
         * Register any application services.
         */
        public function register(): void
        {
            $this->app->bind(abstract: IBaseRepository::class, concrete: BaseRepository::class);
            //vpx_attach
            $this->app->bind(abstract: IUserVisitHistoryDtRepository::class, concrete: UserVisitHistoryDtRepository::class);
            $this->app->bind(abstract: IVideoLinkCrudRepository::class, concrete: VideoLinkCrudRepository::class);
            $this->app->bind(abstract: ISiteLandingRepository::class, concrete: SiteLandingRepository::class);
        }
}
