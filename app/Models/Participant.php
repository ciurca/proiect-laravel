<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Participant extends Authenticatable
{
    use HasFactory, Notifiable;

    // Definirea numelui tabelei asociate modelului
    protected $table = 'participanti'; // Presupunând că tabela se numește 'participanti'

    // Specificați coloanele care pot fi alocate în masă
    protected $fillable = [
        'username',
        'nume',
        'prenume',
        'poza',
        'email',
        'parola',
        'telefon',
        // alte câmpuri specifice participantului
    ];

    // Atributele care ar trebui ascunse pentru tablourile
    protected $hidden = [
        'parola', 'remember_token',
    ];

    // Atributele care ar trebui convertite la tipuri native
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relația cu BileteIndividuale - un participant poate avea mai multe bilete individuale
    public function bileteIndividuale()
    {
        return $this->hasMany(BiletIndividual::class, 'participant_id');
    }

    // Relația cu IstoricComenzi - un participant poate avea mai multe intrări în istoricul comenzilor
    public function istoricComenzi()
    {
        return $this->hasMany(IstoricComenzi::class, 'client_id');
    }

    // Dacă este necesar, se pot adăuga alte relații sau metode specifice
}
