<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eveniment extends Model
{
    use HasFactory;

    // Definirea numelui tabelei asociate modelului
    protected $table = 'evenimente';

    // Specificați coloanele care pot fi alocate în masă
    protected $fillable = [
        'titlu',
        'descriere',
        'data_inceput',
        'data_sfarsit',
        'agenda',
        'locatie',
        // alte câmpuri specifice evenimentului
    ];

    protected $casts = [
        'data_inceput' => 'datetime',
        'data_sfarsit' => 'datetime'
    ];
    // Relația cu Organizatorul - presupunem că evenimentul aparține unui singur organizator
    public function organizator()
    {
        return $this->belongsTo(Organizator::class, 'organizator_id');
    }

    // Relația cu Bilete - un eveniment poate avea mai multe bilete asociate
    public function bilete()
    {
        return $this->hasMany(Bilet::class, 'eveniment_id');
    }

    // Relația cu Speakeri - un eveniment poate avea mai mulți speakeri
    public function speakeri()
    {
        return $this->belongsToMany(Speaker::class, 'event_speaker', 'eveniment_id', 'speaker_id');
    }

    // Relația cu Colaboratori - un eveniment poate avea mai mulți colaboratori
    public function colaboratori()
    {
        return $this->belongsToMany(Colaborator::class, 'contracte', 'eveniment_id', 'colaborator_id');
    }

    // Relația cu Participanți, dacă este necesară
    // public function participanti()
    // {
    //     return $this->hasManyThrough(Participant::class, Bilet::class);
    // }
}
