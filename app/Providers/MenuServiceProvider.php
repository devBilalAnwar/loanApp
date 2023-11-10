<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    View::composer('*', function ($view) {
      try {
        // Initialiser les données de menu avec des valeurs par défaut pour éviter null
        $verticalMenuData = [];
        $horizontalMenuData = [];

        // Charger le menu par défaut
        $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
        $horizontalMenuJson = file_get_contents(base_path('resources/menu/horizontalMenu.json'));

        // Décoder le JSON et vérifier si le décodage a réussi
        $verticalMenuData = json_decode($verticalMenuJson);
        $horizontalMenuData = json_decode($horizontalMenuJson);
        if (json_last_error() !== JSON_ERROR_NONE) {
          throw new \Exception('Erreur lors du décodage des menus JSON par défaut: ' . json_last_error_msg());
        }

        // Vérifier si l'utilisateur est connecté et charger le menu correspondant à son rôle
        if (Auth::check()) {
          $user = Auth::user();

          // Vérifier si l'utilisateur a un rôle d'admin
          if ($user->hasRole('admin')) {
            $verticalMenuJson = file_get_contents(base_path('resources/menu/adminVerticalMenu.json'));
            $horizontalMenuJson = file_get_contents(base_path('resources/menu/adminHorizontalMenu.json'));
          }
          // Vérifier si l'utilisateur a un rôle de leazer
          elseif ($user->hasRole('leazer')) {
            $verticalMenuJson = file_get_contents(base_path('resources/menu/leazerVerticalMenu.json'));
            $horizontalMenuJson = file_get_contents(base_path('resources/menu/leazerHorizontalMenu.json'));
          }
          // Vérifier si l'utilisateur a un rôle de client
          elseif ($user->hasRole('client')) {
            $verticalMenuJson = file_get_contents(base_path('resources/menu/clientVerticalMenu.json'));
            $horizontalMenuJson = file_get_contents(base_path('resources/menu/clientHorizontalMenu.json'));
          }

          // Décoder le JSON et vérifier si le décodage a réussi
          $verticalMenuData = json_decode($verticalMenuJson);
          $horizontalMenuData = json_decode($horizontalMenuJson);
          if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Erreur lors du décodage des menus JSON spécifiques au rôle: ' . json_last_error_msg());
          }
        }

        // Partager les données de menu avec toutes les vues
        $view->with('menuData', [$verticalMenuData, $horizontalMenuData]);
      } catch (\Exception $e) {
        // Journalisation de l'erreur
        Log::error('MenuServiceProvider - boot(): ' . $e->getMessage());
        // Continuer avec des menus vides pour éviter une erreur de vue
        $view->with('menuData', [[], []]);
      }
    });
  }
}
