<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function cahierDesCharges() {
        return view('client.cahier_des_charges');
    }

    public function dashboardClient() {
        return view('client.dashboardClient');
    }

    public function propositionsLogement() {
        return view('client.propositionslogement');
    }

    public function visites() {
        return view('client.visites');
    }

    public function chatClient() {
        return view('client.chatclient');
    }

    public function contratClient() {
        return view('client.contratClient');
    }

    public function depotDossier() {
        return view('client.depotdossier');
    }
}
