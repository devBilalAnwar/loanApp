<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Spatie\Permission\Models\Role;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
      Registered::class => [
          SendEmailVerificationNotification::class,
          'App\Listeners\AssignRoleToNewUser', // Assurez-vous d'inclure la virgule ici
      ],
        // Autres événements et listeners...
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        // Vous pouvez également utiliser une Closure directement ici si vous préférez
        Event::listen(
            Registered::class,
            function (Registered $event) {
                $clientRole = Role::firstOrCreate(['name' => 'client']);
                $event->user->assignRole($clientRole);
            }
        );

        // Supprimez l'écouteur pour l'événement de connexion si vous ne voulez l'utiliser que pour l'inscription
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
