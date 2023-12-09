<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IstoricComenzi extends Model
{
    use HasFactory;

    // Definirea numelui tabelei asociate modelului
    protected $table = 'istoric_comenzi'; // Presupunând că tabela se numește 'istoric_comenzi'

    // Specificați coloanele care pot fi alocate în masă
    protected $fillable = [
        'bilet_id', // ID-ul biletului adăugat în coș
        'client_id', // ID-ul clientului care a efectuat comanda
        'cantitate', // Cantitatea de bilete adăugate în coș
        // alte câmpuri specifice istoricului comenzilor
    ];

    // Relația cu Bilet - legătura fiecărei comenzi la un bilet specific
    public function bilet()
    {
        return $this->belongsTo(Bilet::class, 'bilet_id');
    }

    // Relația cu Participant - legătura fiecărei comenzi la participantul care a efectuat-o
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'client_id');
    }

    // Aici se pot adăuga alte metode, cum ar fi scope-uri pentru a filtra comenzile după diferite criterii, dacă este necesar
}
