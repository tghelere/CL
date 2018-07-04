<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Orcamento;

class OrcamentoController extends Controller
{
    protected $data;

    public function post(Request $request){

        $this->data = [
            'title' => 'Solicitação de Orçamento',
            'segment' => $request->json('segment.name'),
            'contributors' => $request->json('contributors'),
            'modality' => $request->json('modality'),
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'phone' => $request->json('phone'),
            'state' => $request->json('state.name'),
            'city' => $request->json('city.name'),
        ];

        try {
            Mail::to(config('app.dev_mail'))->send(new Orcamento($this->data));
            echo 'Mail send successfully';
        } catch (\Exception $e) {
            echo 'Error - '.$e;
        }

    }
}
