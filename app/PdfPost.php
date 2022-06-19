<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PdfPost extends Model
{
  use Notifiable;
  protected $table = 'study_materials';
  protected $primaryKey = 'id';

  protected $fillable = [
   'title','materials','start_date','admin_id','thumbimage','pdf_cat'

];



}
