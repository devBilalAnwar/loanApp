<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request)
    {
       // Rediriger vers le formulaire de recherche si aucun paramètre de recherche n'est fourni
    if (!$request->has('query')) {
      return view('leazer.search');
  }
        // Assure-toi que l'API Key est définie dans le fichier .env
        $apiKey = env('API_KEY');
        $baseUrl = 'https://preprod-api.notif.immo';

        // Collecte les paramètres de recherche de la requête
        $searchParameters = $this->collectSearchParameters($request);

        // Envoie la requête à l'API
        $response = Http::withHeaders([
            'X-API-KEY' => $apiKey,
            'Content-Type' => 'application/json',
        ])->get($baseUrl . '/documents/properties', $searchParameters);


    // Utilise dd() pour afficher la réponse brute de l'API.
   

        // Traite la réponse de l'API
        if ($response->successful()) {
            $data = $response->json();
            $properties = $data['hydra:member'] ?? [];

            // Si aucune propriété n'est trouvée, renvoie un message d'erreur à la page de recherche
            if (empty($properties)) {
                return redirect()->route('property.search')->with('message', 'Aucun résultat trouvé. Veuillez affiner votre recherche.');
            }

            // Si des propriétés sont trouvées, renvoie la vue de résultats avec les propriétés
            return view('leazer.search_results', ['properties' => $properties]);
        } else {
            // Si la réponse de l'API n'est pas un succès, renvoie un message d'erreur à la page de recherche
            return redirect()->route('property.search')->withErrors(['message' => 'Problème de communication avec l’API.']);
        }
    }

    private function collectSearchParameters(Request $request)
    {
        // Collecte et filtre les paramètres de recherche non vides
        return array_filter($request->only([
            'query',
            'bedroomMin',
            'bedroomMax',
            'budgetMin',
            'budgetMax',
            'transactionType',
            'energyCategories',
            // Ajoute d'autres paramètres de recherche ici si nécessaire...
        ]), function($value) {
            return ($value !== null && $value !== '');
        });
    }

}
