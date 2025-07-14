<?php

namespace App\Providers;

use App\Repositories\Admin\ArticleRepository;
use App\Repositories\Admin\AssignUserRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\FaqRepository;
use App\Repositories\Admin\MitraRepository;
use App\Repositories\Admin\PermissionRepository;
use App\Repositories\Admin\ProductServiceRepository;
use App\Repositories\Admin\ProfileRepository;
use App\Repositories\Admin\RoleRepository;
use App\Repositories\Admin\SocialRepository;
use App\Repositories\Admin\WebSettingsRepository;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Interface\Admin\ArticleRepositoryInterface;
use App\Repositories\Interface\Admin\AssignUserInterRepositoryInterface;
use App\Repositories\Interface\Admin\CategoryRepositoryInterface;
use App\Repositories\Interface\Admin\FaqRepositoryInterface;
use App\Repositories\Interface\Admin\MitraRepositoryInterface;
use App\Repositories\Interface\Admin\PermissionRepositoryInterface;
use App\Repositories\Interface\Admin\ProductServiceRepositoryInterface;
use App\Repositories\Interface\Admin\ProfileRepositoryInterface;
use App\Repositories\Interface\Admin\RoleRepositoryInterface;
use App\Repositories\Interface\Admin\SocialRepositoryInterface;
use App\Repositories\Interface\Admin\WebSettingsRepositoryInterface;
use App\Repositories\Interface\Auth\AuthRepositoryInterface;
use App\Repositories\Interface\Web\FeedbackRepositoryInterface;
use App\Repositories\Web\FeedbackRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(WebSettingsRepositoryInterface::class, WebSettingsRepository::class);
        $this->app->bind(SocialRepositoryInterface::class, SocialRepository::class);
        $this->app->bind(MitraRepositoryInterface::class, MitraRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ProductServiceRepositoryInterface::class, ProductServiceRepository::class);
        $this->app->bind(FaqRepositoryInterface::class, FaqRepository::class);
        $this->app->bind(FeedbackRepositoryInterface::class, FeedbackRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(AssignUserInterRepositoryInterface::class, AssignUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
