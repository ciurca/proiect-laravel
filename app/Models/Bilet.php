<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilet extends Model
{
    use HasFactory;

    // Definirea numelui tabelei asociate modelului
    protected $table = 'bilete'; // Presupunând că tabela se numește 'bilete'

    // Specificați coloanele care pot fi alocate în masă
    protected $fillable = [
        'tip', // Tipul biletului, de exemplu, VIP, General, etc.
        'pret', // Prețul biletului
        'eveniment_id', // ID-ul evenimentului pentru care este biletul
        // alte câmpuri specifice biletului
    ];

    // Relația cu Eveniment - fiecare bilet aparține unui eveniment
    public function eveniment()
    {
        return $this->belongsTo(Eveniment::class, 'eveniment_id');
    }

    // Relația cu BiletIndividual - un bilet poate fi achiziționat de mai multe ori ca bilete individuale
    public function bileteIndividuale()
    {
        return $this->hasMany(BiletIndividual::class, 'bilet_id');
    }

    // Relația cu Participant - presupunând că vrem să știm cine a achiziționat biletul
    public function participanti()
    {
        return $this->belongsToMany(Participant::class, 'bilet_individual', 'bilet_id', 'participant_id');
    }
}
