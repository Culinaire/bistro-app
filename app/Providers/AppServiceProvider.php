<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Menu\Menu;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $navbar = $this->registerNavbar();
      view()->share('navbar', $navbar );

      $sidebar = $this->registerSidebar();
      view()->share('sidebar', $sidebar );


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function registerNavbar()
    {
      $menu['pages'] = $this->registerNavMenu();
      $menu['auth'] = $this->registerAuthMenu();
      return $menu;
    }

    public function registerSidebar()
    {
      $menu['main'] = $this->registerSidebarMenu();
      return $menu;
    }

    public function registerSidebarMenu()
    {
      $menu = Menu::handler('sidebar');
      $menu->addClass('nav navbar-nav sidebar-nav');
      return $menu;
    }

    public function registerNavMenu()
    {
      $menu = Menu::handler('navmenu');
      $menu->addClass('nav navbar-nav navbar-left');
      $menu->add( url('#'), 'Page 1');
      $menu->add( url('#'), 'Page 2');
      $menu->add( url('#'), 'Page 3');

      return $menu;
    }

    public function registerAuthMenu()
    {
      $menuin = Menu::handler('authmenuin');
        $menuin->addClass('nav navbar-nav navbar-right');    
        $menuin->add( url('app/'), 'Dashboard');
        $menuin->add( url('app/settings'), 'Settings');
        $menuin->add( url('app/profile'), 'Profile');
        $menuin->add( url('logout'), 'Logout');

      $menuout = Menu::handler('authmenuout');
        $menuout->addClass('nav navbar-nav navbar-right');
        $menuout->add( url('login'), 'Login');

      $menu = [
        'loggedin' => $menuin,
        'loggedout' => $menuout
      ];

      return $menu;
    }


}
