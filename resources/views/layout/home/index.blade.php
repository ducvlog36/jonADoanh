@extends('layout.base')

@section('content')
    <section class="fv relative -mt-[50px] md:mt-0 mb-[50px] md:mb-25">
        <div class="fv-slider relative h-[260px]">
            <img src="{{ asset('image/jobsempai_layer.jpg') }}" class="w-full h-full object-cover">
            <div class="fvInner w-[96%] lg:w-full text-center absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-9">
                <p class="font-serif font-semibold text-xl lg:text-[40px] lg:leading-[57px] tracking-widest text-white mb-9"
                    style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Giới thiệu việc làm miễn phí,<br
                        class="lg:hidden">hỗ trợ tận tâm</p>
                <div class="searchBox w-full max-w-[972px] h-auto p-2.5 rounded-lg lg:p-8 mx-auto">
                    <form method="get" id="searchform" action="#" class="flex gap-2 flex-wrap">
                        <input type="hidden" name="size" value="200">
                        <div class="searchBoxInr grid grid-cols-3 gap-x-2 w-full">
                            <div
                                class="btnSearchItems w-full h-auto border border-solid border-gray-c rounded overflow-hidden bg-none">
                                <div class="btnBottom static bg-white h-auto">
                                    <p class="btnBottomTxt w-full relative">
                                        <i
                                            class="icon-location-on-fill-blue w-4.5 h-4.5 absolute top-1/2 -translate-y-1/2 left-0.5 md:left-2"></i>
                                        <select name="work_place" id="selectPrefcodes"
                                            class="w-full h-[46px] px-5.5 md:px-[28px] font-body">
                                            <option value="0">Khu vực</option>
                                            @foreach (ScreenConst::JOB_AREA_NAME as $areaKey => $areaName)
                                                <option value="{{ $areaKey }}">{{ $areaName }}</option>
                                            @endforeach
                                        </select>
                                        <i
                                            class="icon-chevron-right-blue w-4.5 h-4.5 absolute top-1/2 -translate-y-1/2 right-0.5 md:right-2"></i>
                                    </p>
                                </div>
                            </div>
                            <div
                                class="btnSearchItems w-full h-auto border border-solid border-gray-c rounded overflow-hidden bg-none ">
                                <div class="btnBottom static bg-white h-auto">
                                    <p class="btnBottomTxt w-full relative">
                                        <i
                                            class="icon-business-center-blue w-4.5 h-4.5 absolute top-1/2 -translate-y-1/2 left-0.5 md:left-2"></i>
                                        <select name="categories[]" id="selectCategories"
                                            class="w-full h-[46px] px-5.5 md:px-[28px] font-body">
                                            <option value="0">Hình thức tuyển dụng</option>
                                            @foreach (ScreenConst::JOB_TYPE_NAME as $jobTypeKey => $jobTypeName)
                                                <option value="{{ $jobTypeKey }}">{{ $jobTypeName }}</option>
                                            @endforeach
                                        </select>
                                        <i
                                            class="icon-chevron-right-blue w-4.5 h-4.5 absolute top-1/2 -translate-y-1/2 right-0.5 md:right-2"></i>
                                    </p>
                                </div>
                            </div>
                            <div
                                class="btnSearchItems w-full h-auto border border-solid border-gray-c rounded overflow-hidden bg-none ">
                                <div class="btnBottom static bg-white h-auto">
                                    <p class="btnBottomTxt w-full relative">
                                        <i
                                            class="icon-temp-preferences-custom-fill-blue w-4.5 h-4.5 absolute top-1/2 -translate-y-1/2 left-0.5 md:left-2"></i>
                                        <select name="tags[]" id="selectTags"
                                            class="w-full h-[46px] px-5.5 md:px-[28px] font-body">
                                            <option value="0">Tag</option>
                                            @foreach ($tagList as $tagKey => $tagName)
                                                <option value="{{ $tagKey }}">{{ $tagName }}</option>
                                            @endforeach
                                        </select>
                                        <i
                                            class="icon-chevron-right-blue w-4.5 h-4.5 absolute top-1/2 -translate-y-1/2 right-0.5 md:right-2"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="text-search w-full flex-1 flex items-center justify-between">
                            <input type="text" name="key_word" id="s" value=""
                                placeholder="Tìm kiếm từ khóa" class="w-[calc(100%-46px)] rounded-l">
                            <button type="submit"
                                class="searchBoxSubmit bg-main-blue inline-flex items-center justify-center rounded-r">
                                <i class="searchBoxSubmit-icon inline-block w-6 h-6"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
        <div class="text-center">
            <h2 class="font-serif font-medium text-base md:text-xl text-center text-4E4A40 my-2.5">
                <span class="relative inline-block pt-6 pl-[12.5px] lg:pl-[26.18px]">Danh sách job đang tuyển dụng</span>
            </h2>
        </div>
        <div class="popularInner bg-CBE3FF py-4 px-1 md:px-8">
            <div class="popularCardlist pb-2 slick-initialized slick-slider slick-dotted">
                <ul class="hot_job">
                    @foreach ($jobWorkHotList as $job)
                        <li id="job-{{ $job['id'] }}"
                            class="post-1119062 item type-item status-publish has-post-thumbnail hentry employ-haken picky-shufu-kangei picky-tomodachiobo picky-wwork-ok picky-freeter-kangei picky-mikeikensha picky-kotsuhi picky-shakaihoken picky-kenshuseido picky-shift-sei picky-senior-kangei picky-rirekisyofuyou picky-532 genre-souzai-sushi area-606 area-kyouto-fu rating-97 rating-98 rating-99 is-recommend rate-rating-gold">
                            <a  href="{{ route('detail', ['id' => $job['id']]) }}">
                                <div class="hot_job_img">
                                    <figure>
                                        <img width="87" height="70"
                                            src="{{ $job->image_url ? $job->image_url : asset('image/uploaded/job_1.jpg') }}"
                                            class="alpha wp-post-image" alt="{{ $job->image_url ? $job->image_url : asset('image/uploaded/job_1.jpg') }}" loading="lazy"
                                            srcset="{{ $job->image_url ? $job->image_url : asset('image/uploaded/job_1.jpg') }} 87w, {{ $job->image_url ? $job->image_url : asset('image/uploaded/job_1.jpg') }} 140w, {{ $job->image_url ? $job->image_url : asset('image/uploaded/job_1.jpg') }} 155w"
                                            sizes="(max-width: 87px) 100vw, 87px">
                                        <div class="rating_mark"></div>
                                    </figure>
                                </div>
                                <div class="job_detail">
                                    <p>{{ $job['job_name'] }}</p>
                                    <h2>
                                        <span class="text_excerpt">
                                            <i class="icon-business-center-blue w-3.5 h-3.5"></i>
                                            {{ ScreenConst::JOB_TYPE_NAME[$job['employment_type_id']] }}
                                        </span>
                                    </h2>
                                    <h2>
                                        <span class="text_excerpt">
                                            <i class="icon-location-on-fill-blue w-3.5 h-3.5"></i>
                                            {{ $job['workplace_city'] }}
                                        </span>
                                    </h2>
                                    <h2>
                                        <span class="text_excerpt">
                                            <i class="icon-currency-yen-blue w-3.5 h-3.5"></i>
                                            {{ $job['salary'] . '万' }}
                                        </span>
                                    </h2>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="slick-slider-dots" class="slick-slider-dots mb-4 md:mb-7.5"></div>
            <div class="popular-see-more text-center md:mb-4">
                <a href="{{ route('get_all_job') }}" class="see-more-btn inline-flex items-center">
                    <span class="font-bold text-sm leading-[26px] tracking-wider text-main-blue">Xem thêm</span>
                    <i class="icon-chevron-right-blue w-6 h-6"></i>
                </a>
            </div>
        </div>
    </section>
@stop
