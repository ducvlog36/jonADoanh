@extends('layout.base')

@section('content')
    <section class="fv relative -mt-[50px] md:mt-0">
        <div class="fv-slider relative h-[260px]">
        <img src="{{ asset('image/jobsempai_layer.jpg') }}" class="w-full h-full object-cover">
        </div>
        <div class="fv-title bg-white">
            <h1 class="font-bold text-base leading-[46px] text-40381F text-center pt-5 pb-2.5">Tổng hợp các job đang tuyển dụng</h1>
        </div>
    </section>
    <section class="popular pt-7.5 mx-2 md:mx-auto mb-9.5 md:mb-11 md:max-w-[1240px]">
        <div class="popularInner bg-CBE3FF py-4 px-1 md:px-8">
            <div class="sectionTitle text-center">
                <h2 class="font-serif font-medium text-base md:text-xl text-center text-4E4A40 my-2.5">
                    <span class="relative inline-block pt-6 pl-[12.5px] lg:pl-[26.18px]">Thông tin tuyển dụng<br
                            class="md:hidden"> đang hot</span>
                </h2>
            </div>
            <wee-slider data-loop="true" data-align="center" data-buttons-on-hover="true">
                <div class="wee-slider">
                  <ul class="wee-slider__slides">
                    @foreach ($jobWorkHotList as $job)
                        <li class="wee-slider__slide">
                            <div class="slide-content">
                                <a href="{{ route('detail', ['id' => $job['id']]) }}"
                                    class="popularCard block px-1 slick-slide slick-current slick-active">
                                    <div class="popularCard_inner flex-col p-0 lg:bg-white">
                                        <div class="popularCard_inner_photo w-full mb-2 lg:mb-0">
                                            <figure class="aspect-[143/100] mb-2">
                                                <img class="h-full object-cover"
                                                    src="{{ $job->image_url ? $job->image_url : asset('image/uploaded/job_1.jpg') }}"
                                                    width="100%" alt="">
                                            </figure>
                                            <p class="company-tit text-[11px] leading-4 text-888 mb-1 truncate lg:px-2">
                                                {{ $job->company_name ?? '' }}</p>
                                            <h3 class="title font-bold text-xs text-40381F lg:px-2 truncate">
                                                {{ $job->job_name ?? 'Tuyển dụng nhân viên' }}</h3>
                                        </div>
                                        <div
                                            class="popularCard_inner_info w-full font-light text-[11px] leading-5 text-333 lg:p-2">
                                            <ul class="popularCard_inner_place flex">
                                                <li class="item w-3.5 flex items-center">
                                                    <i class="icon-location-on-fill-blue w-3.5 h-3.5"></i>
                                                </li>
                                                <li class="item-text pl-1 self-center truncate">
                                                    <span class="block">{{ $job->workplace_city }}</span>
                                                </li>
                                            </ul>
                                            <ul class="recommendCard_inner_occupation flex">
                                                <li class="item w-3.5 flex items-center">
                                                    <i class="icon-business-center-blue w-3.5 h-3.5"></i>
                                                </li>
                                                <li class="item-text pl-1 self-center truncate">
                                                    {{ ScreenConst::JOB_TYPE_NAME[$job['employment_type_id']] }}</li>
                                            </ul>
                                            <ul class="popularCard_inner_salary flex items-start">
                                                <li class="item w-3.5 flex items-center mt-[3px]">
                                                    <i class="icon-currency-yen-blue w-3.5 h-3.5"></i>
                                                </li>
                                                <li class="item-text pl-1 self-center truncate">
                                                    <span class="inline-block">{{ $job->salary . '万' }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                  </ul>
                </div>
                <ul class="wee-slider__navdots">
                  <li class="wee-slider__navdot"></li>
                  <li class="wee-slider__navdot"></li>
                  <li class="wee-slider__navdot"></li>
                  <li class="wee-slider__navdot"></li>
                  <li class="wee-slider__navdot"></li>
                  <li class="wee-slider__navdot"></li>
                  <li class="wee-slider__navdot"></li>
                </ul>
              </wee-slider>
        </div>
    </section>
    <section class="popular pt-7.5 mx-2 md:mx-auto mb-9.5 md:mb-11 md:max-w-[1240px]">
        <div class="main-wid p-[9px] md:p-0 container md:mx-auto lg:flow-root">
            <div class="main-col-recDetail">
                <div class="recList">
                    <ul id="list_job" class="list-job font-serif grid md:grid-cols-2 lg:grid-cols-3 md:gap-x-[2%] xl:gap-x-[5%]">
                        @if($jobBasicList && !$jobBasicList->isEmpty())
                            @foreach ($jobBasicList as $job)
                                <li class="relative bg-white py-4 px-2 border-t-4 border-solid border-main-blue mb-6">
                                    <h3 class="company-name text-main-blown p-0 mb-4 text-sm lg:text-base font-bold">
                                        {{ $job->company_name ?? '' }}
                                    </h3>
                                    <a class="recDetail mb-2">
                                        <div class="flex justify-between items-center mb-4">
                                            <figure class="w-1/3 aspect-[53/40]">
                                                <img src="{{ $job->image_url ? $job->image_url : asset('image/uploaded/job_1.jpg') }}" width="282" height="212" alt="" class="w-full h-full object-cover">
                                            </figure>
                                            <p class="job-name text-sm font-bold tracking-[0.01em] w-2/3 ml-2 line-clamp-2">
                                                {{ $job->job_name ?? 'Tuyển dụng nhân viên' }}
                                            </p>
                                        </div>
                                        <div class="txt mb-4 w-full">
                                            <dl>
                                                <dt class="place"><span class="font-bold">Địa điểm</span></dt>
                                                <dd>{{ $job->workplace_city }}</dd>
                                            </dl>
                                            <dl>
                                                <dt class="icon-currency-yen-blue"><span class="font-bold">Mức lương</span></dt>
                                                <dd>
                                                    {{ $job->salary .'万'}}
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt class="type"><span class="font-bold">Trạng thái</span></dt>
                                                <dd class="employee">{{ ScreenConst::JOB_TYPE_NAME[$job['employment_type_id']] }}</dd>
                                            </dl>
                                            <dl>
                                                {{-- <dd class="w-full">
                                                @foreach($job->tags as $tag)
                                                    <span class="inline-block border border-98B9EA rounded p-1 font-medium text-[10px] leading-4 text-main-blue mb-1">
                                                        {{$tag->name ?? 'tag name'}}
                                                    </span>
                                                @endforeach
                                                </dd> --}}
                                            </dl>
                                        </div>
                                    </a>
                                    <div class="btns h-9 text-center">
                                        <a href="{{ route('apply', ['id' => $job['id']]) }}" class="detailBtn w-[152px] h-9 inline-flex items-center justify-center bg-FF7A00 rounded absolute bottom-4 left-1/2 -translate-x-1/2">
                                            <span class="text-[11px] leading-3 font-bold text-white">Ứng tuyển</span>
                                            <i class="icon-chevron-right-white w-4.5 h-4.5"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="">Không có thông tin tuyển dụng với từ khóa bạn đang tìm kiếm</li>
                        @endif
                    </ul>
                </div>
                <div class="page-custom">
                    @if ($jobBasicList->isNotEmpty())
                    {{ $jobBasicList->links('includes.pagination') }}
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
@stop
