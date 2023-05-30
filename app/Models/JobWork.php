<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobWork extends Model
{
    use HasFactory;

    protected $table = 'job_work';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function getJobWorkList($srchList)
    {
        $jobWorkList = $this->when($srchList['srchJobArea'], function($query) use ($srchList) {
            $query->where('workplace_prefecture', '=', $srchList['srchJobArea']);
        })->when($srchList['srchEmploymentType'], function($query) use ($srchList) {
            $query->where('employment_type_id', '=', $srchList['srchEmploymentType']);
        })->select(
            'id',
            'job_name',
            'employment_type_id',
            'company_name',
            'salary',
            'work_time_from',
            'work_time_to',
            'workplace_prefecture',
            'workplace_city'
        )->orderBy('id', 'asc');

        return $jobWorkList;
    }
}
