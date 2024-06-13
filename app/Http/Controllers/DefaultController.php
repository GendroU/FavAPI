<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DefaultController extends Controller
{
    private function lurescape($limit) {
        $response = Http::get('https://lurescape.matlikofficial.com/api/fish?limit=' . $limit);

        return $response->json();
    } 

    private function song($limit) {
        $response = Http::get('https://api-ralf.tak21timofejev.itmajakas.ee/api/song?limit=' . $limit);

        return $response->json();
    } 

    private function mannicoon($limit) {
        $response = Http::get('https://mannicoon.com/api/cats?limit=' . $limit);

        return $response->json();
    }

     private function cars($limit) {
        $response = Http::get('https://freetestapi.com/api/v1/cars?limit=' . $limit);

        return $response->json();
    } 

    private function bmw($limit) {
        $response = Http::get('https://yl5.tak21karp.itmajakas.ee/api/bmw?limit=' . $limit);

        return $response->json();
    } 
    private function mercedes($limit) {
        $response = Http::get('https://yl5.tak21umber.itmajakas.ee/api/mercedes?limit=' . $limit);

        return $response->json();
    } 

    public function index() {
        
        $limit = request()->get('limit') ?? '';

        if ($limit == 0) {
            $limit = '';
        }

        if (request()->get('whatapi') == 'lurescape') {
            $response = $this->lurescape($limit);
        } else if (request()->get('whatapi') == 'mannicoon'){
            $response = $this->mannicoon($limit);
        } else if (request()->get('whatapi') == 'song'){
            $response = $this->song($limit); 
        } else if (request()->get('whatapi') == 'cars'){
            $response = $this->cars($limit);
        } else if (request()->get('whatapi') == 'bmw'){
            $response = $this->bmw($limit); 
        } else if (request()->get('whatapi') == 'mercedes'){
            $response = $this->mercedes($limit);                          
        } else {
            $response = response()->json('vali api palun', 400);
        }

        return $response;
    }
} 
