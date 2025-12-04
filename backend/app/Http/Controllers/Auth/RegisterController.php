<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\GeocodingService;

class RegisterController extends Controller
{
    public function __construct(protected GeocodingService $geocoding)
    {
    }

    public function store(Request $request)
    {
        $tipo = $request->input('type'); // pf ou pj

        if ($tipo === 'pf') {
            return $this->registrarPessoaFisica($request);
        }

        if ($tipo === 'pj') {
            return $this->registrarPessoaJuridica($request);
        }

        return redirect()
            ->back()
            ->withErrors(['type' => 'Tipo de cadastro inválido.'])
            ->withInput();
    }

    /**
     * Cadastro de CLIENTE - Pessoa Física
     */
    protected function registrarPessoaFisica(Request $request)
    {
        $validated = $request->validate([
            'type'       => 'required|in:pf,pj',
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email',
            'password'   => 'required|string|min:8|confirmed',

            'cpf'        => 'required|string|max:20|unique:users,cpf',
            'birth_date' => 'required|date',
            'gender'     => 'nullable|string|max:50',

            'phone'           => 'required|string|max:20',
            'phone_secondary' => 'nullable|string|max:20',

            'zip_code'   => 'required|string|max:20',
            'address'    => 'required|string|max:255',
            'number'     => 'required|string|max:20',
            'complement' => 'nullable|string|max:255',
            'district'   => 'required|string|max:100',
            'city'       => 'required|string|max:100',
            'state'      => 'required|string|max:2',
            'reference'  => 'nullable|string|max:255',
        ]);

        $data = $validated;
        $data['password'] = Hash::make($validated['password']);
        $data['role']     = 'user';
        $data['type']     = 'pf';

        User::create($data);

        return redirect()
            ->route('home')
            ->with('success', 'Cadastro de cliente realizado com sucesso! Faça login para continuar.');
    }

    /**
     * Cadastro de LOJISTA - Pessoa Jurídica
     */
    protected function registrarPessoaJuridica(Request $request)
{
    $validated = $request->validate([
        'type'       => 'required|in:pf,pj',

        // Dados da empresa
        'name'          => 'required|string|max:255',
        'fantasy_name'  => 'required|string|max:255',
        'state_registration_exempt' => 'nullable',
        'state_registration'        => 'nullable|string|max:50',
        'cnpj'          => 'required|string|max:20|unique:stores,cnpj',

        // Contato da empresa
        'contact_name'  => 'required|string|max:255',
        'contact_cpf'   => 'required|string|max:20',

        // Telefones
        'phone'           => 'required|string|max:20',
        'phone_secondary' => 'nullable|string|max:20',

        // Login
        'email'      => 'required|string|email|max:255|unique:users,email',
        'password'   => 'required|string|min:8|confirmed',

        // Endereço
        'zip_code'   => 'required|string|max:20',
        'address'    => 'required|string|max:255',
        'number'     => 'required|string|max:20',
        'complement' => 'nullable|string|max:255',
        'district'   => 'required|string|max:100',
        'city'       => 'required|string|max:100',
        'state'      => 'required|string|max:2',
        'reference'  => 'nullable|string|max:255',
    ]);

    // Monta endereço completo
    $fullAddress = sprintf(
        '%s, %s - %s, %s - %s, %s, Brasil',
        $validated['address'],
        $validated['number'],
        $validated['district'],
        $validated['city'],
        $validated['state'],
        $validated['zip_code']
    );

    // Executa o Geocoding
    $coords = $this->geocoding->geocode($fullAddress);

    $isentoIE = $request->boolean('state_registration_exempt');

    /**
     * 1) Criar USER
     */
    $userData = [
        'name'            => $validated['name'],
        'email'           => $validated['email'],
        'password'        => Hash::make($validated['password']),
        'type'            => 'pj',
        'role'            => 'store',

        'cpf'             => null,
        'birth_date'      => null,
        'gender'          => null,

        'phone'           => $validated['phone'],
        'phone_secondary' => $validated['phone_secondary'] ?? null,

        'zip_code'        => $validated['zip_code'],
        'address'         => $validated['address'],
        'number'          => $validated['number'],
        'complement'      => $validated['complement'] ?? null,
        'district'        => $validated['district'],
        'city'            => $validated['city'],
        'state'           => $validated['state'],
        'reference'       => $validated['reference'] ?? null,
    ];

    $user = User::create($userData);

    /**
     * 2) Criar STORE
     */
    $storeData = [
        'user_id'           => $user->id,
        'name'              => $validated['name'],
        'trade_name'        => $validated['fantasy_name'],
        'state_registration'=> $isentoIE ? null : $validated['state_registration'],
        'cnpj'              => $validated['cnpj'],
        'phone'             => $validated['phone'],
        'additional_phone'  => $validated['phone_secondary'] ?? null,

        // AQUI É A PARTE IMPORTANTE!
        'latitude'          => $coords['lat'] ?? null,
        'longitude'         => $coords['lng'] ?? null,

        'category'          => null,
        'image_url'         => null,
        'is_active'         => true,
    ];

    Store::create($storeData);

    return redirect()
        ->route('home')
        ->with('success', 'Cadastro de loja realizado com sucesso! Faça login para continuar.');
}

}
