<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Organizator extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Tabela specificată pentru modelul Organizator
    protected $table = 'organizatori';

    // Atributele care pot fi atribuite în masă
    protected $fillable = [
        'email',
        'username',
        'nume',
        'password',
        'telefon',
        // alte câmpuri specifice organizatorului
    ];

    // Atributele care ar trebui ascunse pentru tablourile
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Atributele care ar trebui convertite la tipuri native
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relația între Organizator și Evenimente
    public function events()
    {
        return $this->hasMany(Eveniment::class, 'organizator_id');
    }

    // Relația între Organizator și Bilete
    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class, Event::class);
    }

    // Relația între Organizator și Speakeri
    public function speakers()
    {
        return $this->hasManyThrough(Speaker::class, Event::class);
    }

    // Relația între Organizator și Colaboratori
    public function colaboratori()
    {
        return $this->belongsToMany(Colaborator::class, 'contracte', 'organizator_id', 'collaborator_id');
    }
}
