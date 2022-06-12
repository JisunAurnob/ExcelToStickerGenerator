<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excelfiledata extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = [
        'Hoist_Label',
        'Hoist_Type',
        'Function',
        'Total_Point_Load',
        'X',
        'Y',
        'LAYER',
        'NAME',
        'SYMBOL_USED',
        'File_Id',
    ];
}
