<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Candidates extends Model
{
    use HasFactory;

    protected $table = 'candidates';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function getCandidateList($srchList)
    {
        $candidateList = $this->join('job_work', 'candidates.job_id', '=', 'job_work.id')
        ->select(
            'candidates.id',
            'candidates.first_name',
            'candidates.last_name',
            'candidates.date_of_birth',
            'candidates.gender',
            'candidates.email',
            'candidates.phone_number',
            'candidates.facebook_url',
            'candidates.address',
            'candidates.japanese_skill_id',
            'candidates.residence',
            'candidates.is_contacted',
            DB::raw('DATE_FORMAT(candidates.apply_date, "%d/%m/%Y") as apply_date'),
            'job_work.job_name'
        )->when(isset($srchList['name']), function($query) use ($srchList) {
            $query->where(DB::raw("CONCAT(candidates.first_name, ' ', candidates.last_name)"), 'LIKE', "%". $srchList['name'] ."%");
        })->when(isset($srchList['phone_number']), function($query) use ($srchList) {
            $query->where('candidates.phone_number', '=', $srchList['phone_number']);
        })->when(isset($srchList['email']), function($query) use ($srchList) {
            $query->where('candidates.email', '=', $srchList['email']);
        })->when(isset($srchList['contact_status']), function($query) use ($srchList) {
            $query->where('candidates.is_contacted', '=', $srchList['contact_status']);
        })
        ->orderBy('candidates.id', 'asc');

        return $candidateList;
    }
}
