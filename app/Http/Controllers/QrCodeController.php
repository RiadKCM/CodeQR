<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;



class QrCodeController extends Controller
{
    public function generate()
    {
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            $user = Auth::user(); // Obtenir l'utilisateur connecté
            $qrcode = QrCode::size(200)->generate('Texte ou URL à encoder');

            return view('qrcode', compact('qrcode'));
        }

        // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
        return redirect()->route('login');
    }
}
