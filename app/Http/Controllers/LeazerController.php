<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeazerController extends Controller
{
    public function dashboardLeazer() {
        return view('leazer.dashboardLeazer');
    }

    public function searchResults() {
        return view('leazer.search_results');
    }

    public function versements() {
        return view('leazer.versements');
    }

    public function visitesCalendrier() {
        return view('leazer.visitesCalendrier');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required',
            'about' => 'required',
            'home_description' => 'required',
            'interests' => 'required',
            'region' => 'required',
            'city' => 'required',
            'search_zones' => 'required',
            'languages' => 'nullable',
            'source' => 'required',
        ]);

        // Logique pour gérer la photo de profil, si elle est fournie.
        if ($request->hasFile('profile_photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $data['profile_photo_path'] = $path;
        }

        // Mettre à jour les informations de l'utilisateur
        $user->update($data);

        // Rediriger vers la page de profil avec un message de confirmation.
        return redirect()->route('leazer.dashboard')->with('success', 'Profil mis à jour avec succès.');
    }
}
