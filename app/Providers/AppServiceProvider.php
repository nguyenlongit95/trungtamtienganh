<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Paygates\PaygateRepositoryInterface::class,
            \App\Repositories\Paygates\PaygateEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Widgets\WidgetRepositoryInterface::class,
            \App\Repositories\Widgets\WidgetEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Users\UserRepositoryinterface::class,
            \App\Repositories\Users\UserEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Menus\MenusRepositoryInterface::class,
            \App\Repositories\Menus\MenusEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\CanhBao\CanhBaoRepositoryInterface::class,
            \App\Repositories\CanhBao\CanhBaoEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\GiangVien\GiangVienRepositoryInterface::class,
            \App\Repositories\GiangVien\GiangVienEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\HocPhi\HocPhiRepositoryInterface::class,
            \App\Repositories\HocPhi\HocPhiEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\HocVien\HocVienRepositoryInterface::class,
            \App\Repositories\HocVien\HocVienEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\LopHoc\LopHocRepositoryInterface::class,
            \App\Repositories\LopHoc\LopHocEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\MonHoc\MonHocRepositoryInterface::class,
            \App\Repositories\MonHoc\MonHocEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\QuaTrinhHoc\QuaTrinhHocRepositoryInterface::class,
            \App\Repositories\QuaTrinhHoc\QuaTrinhHocEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Voucher\VoucherRepositoryInterface::class,
            \App\Repositories\Voucher\VoucherEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
