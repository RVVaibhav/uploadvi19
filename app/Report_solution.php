<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Report_solution extends Model
{
  use Notifiable;
   protected $table = 'report_solutions';
   protected $primaryKey = 'solution_id';

   protected $fillable = [

    'solution','reference','report_id','createdBy','adminId'

 ];
}
