<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborator extends Model
{
    use HasFactory;

    // Definirea numelui tabelei asociate modelului
    protected $table = 'colaboratori'; // Presupunând că tabela se numește 'colaboratori'

    // Specificați coloanele care pot fi alocate în masă
    protected $fillable = [
        'nume',
        'email',
        'descriere',
        'poza',
        'telefon',
        'tip', // Tipul de colaborare
        // alte câmpuri specifice colaboratorului
    ];

    // Relația cu Evenimente - un colaborator poate lucra cu mai multe evenimente
    public function evenimente()
    {
        return $this->belongsToMany(Eveniment::class, 'contracts', 'colaborator_id', 'eveniment_id')
            ->withPivot(['id']); // Înlocuiește aceste valori cu coloanele reale ale tabelului pivot
    }
}
