<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobWork;
use App\Models\Tag;
use App\Consts\ScreenConst;
use App\Libs\SessionManager;

class HomeController extends Controller
{
    private ?array $srchList;

    public function __construct(Request $request)
    {
        parent::__construct();

        $this->srchList = [];
    }

    public function index(Request $request)
    {
        $this->setSrchList($request);
        $param   = [];
        $jobWork = new JobWork();
        $param['tagList']        = Tag::all()->pluck('name', 'id');
        $param['jobWorkHotList'] = $this->getHtmlHotJobList();
        return view('layout.home.index', $param);
    }

    public function getDetailJob(Request $request)
    {
        try {
            $jobData = JobWork::where('id', $request->id)->first();
            $param['jobWork'] = $jobData;
            $param['jobId']   = $request->id ;
            return view('layout.home.detail', $param);
        } catch (\Exeption $ex) {
            return view('errors.index');
        }
    }

    public function getALlJob(Request $request)
    {
        try {
            $this->setSrchList($request);
            $jobWork     = new JobWork();
            $jobWorkList = $jobWork->getJobWorkList($this->srchList)->paginate(ScreenConst::MAX_PER_PAGE_HOME_LIST);
            $param = [];
            $param['jobWorkHotList'] = $jobWorkList;
            $param['jobBasicList']   = $jobWorkList;
            return view('layout.home.list', $param);
        } catch (\Exeption $ex) {
            return view('errors.index');
        }
    }

    private function getHtmlHotJobList()
    {
        $jobWork     = new JobWork();
        $jobWorkList = $jobWork->getJobWorkList($this->srchList)->get();
        return $jobWorkList;
    }

    private function setSrchList(Request $request)
    {
        $this->srchList['srchJobArea']        = $request->srchJobArea ?? null;
        $this->srchList['srchEmploymentType'] = $request->srchEmploymentType ?? null;
        $this->srchList['srchTag']            = $request->srchTag ?? null;
    }

    public function search(Request $request)
    {
        try {
            $this->setSrchList($request);
            $htmlTableArea = $this->getHtmlHotJobArea();
            $data = [
                'status'        => ScreenConst::PROCESS_STATUS_SUCCESS,
                'htmlTableArea' => $htmlTableArea,
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            $data = [
                'url'      => route('job_list'),
                'status'   => ScreenConst::PROCESS_STATUS_ERROR,
                'alertMsg' => __('messages.E0001', ['attribute' => 'Tìm kiếm job']),
            ];
            return response()->json($data);
        }
    }
}
