<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    // Definirea numelui tabelei asociate modelului
    protected $table = 'speakers'; // Presupunând că tabela se numește 'speakers'

    // Specificați coloanele care pot fi alocate în masă
    protected $fillable = [
        'nume',
        'prenume',
        'poza',
        'email',
        'telefon',
        'created_by'
        // alte câmpuri specifice speakerului
    ];

    // Relația cu Evenimente - un speaker poate vorbi la mai multe evenimente
    public function evenimente()
    {
        return $this->belongsToMany(Eveniment::class, 'event_speaker')
                    ->withPivot('start_time', 'end_time')
                    ->withTimestamps();
    }

}
