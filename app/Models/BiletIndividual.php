<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiletIndividual extends Model
{
    use HasFactory;

    // Definirea numelui tabelei asociate modelului
    protected $table = 'bilete_individuale'; // Presupunând că tabela se numește 'bilete_individuale'

    // Specificați coloanele care pot fi alocate în masă
    protected $fillable = [
        'bilet_id', // ID-ul biletului general
        'participant_id', // ID-ul participantului care a achiziționat biletul
        // alte câmpuri specifice biletului individual
    ];

    // Relația cu Bilet - fiecare bilet individual este asociat cu un bilet general
    public function bilet()
    {
        return $this->belongsTo(Bilet::class, 'bilet_id');
    }

    // Relația cu Participant - fiecare bilet individual este asociat cu un participant
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    // Pot exista și alte relații necesare în funcție de structura și necesitățile bazei de date
}
