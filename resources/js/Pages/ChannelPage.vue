<script>
import {Head} from "@inertiajs/vue3";

export default {
    name: "ChannelPage",
    components: {Head},
    props: {
        channel: Object,
    },
}
</script>

<template>

    <Head title="Канал" />

    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-10">

            <div class="card card-body border my-4">
                <div class="row">

                    <div class="col-12 col-sm-5 col-md-4 col-lg-3">
                        <div class="mr-sm-2 mr-md-2 mr-lg-3">

                            <div class="d-flex justify-content-center manage-tools-element">
                                <img :src=" channel['img'] " class="img-thumbnail box-160-280 rounded-circle">
                            </div>

                            <div class="d-none d-sm-block d-lg-none mt-1">
                                <div>
                                    <a role="button" class="btn btn-info mt-3 d-block text-truncate"
                                       :href=" channel['url']+'/stat'">
                                        <i class="uil-chart-line mr-1"></i> Статистика </a>

                                    <a role="button" href="#"
                                       class="btn btn-outline-success popup_ajax d-block js-btn-favorite mt-2 "
                                       :data-src="'/my/favorites/'+ channel['url'] +'/create'">
                                        <i class="uil-star"></i> Избранное </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-7 col-md-8 col-lg-6">


                        <hr class="m-0 mt-3 mb-2 d-block d-sm-none">

                        <h1 class="text-body text-center text-sm-left"> {{ channel['name'] }}</h1>

                        <div class="text-center text-sm-left">
                            <a :href=" channel['btn_hyperlink'] " role="button"
                               rel="nofollow" target="_blank" style="border-radius: 2em;"
                               class="btn btn-outline-info px-3 py-05 font-14 mr-1 mb-15">
                                {{ channel['btn_text'] }}                                                                                    </a>

                        </div>

                        <div class="d-none d-sm-block d-lg-none mt-2 mb-n2">
                            <hr class="mt-3 mb-2">
                            <div>
                                <b>Гео и язык канала: </b>
                                {{ channel['region'] ?? 'Россия' }},
                                {{ channel['language'] ?? 'Русский' }}
                            </div>
                            <div>
                                <b>Категория: </b>
                                <a :href="'/categ/'+ channel['category'] "> {{ channel['friendly_category'] }} </a>
                            </div>
                        </div>

                        <p class="card-text mt-3"></p>
                        <hr class="m-0 mb-3">

                        {{ channel['description'] }}

                        <p></p>

                    </div>

                    <div class="col-12 col-lg-3 position-relative d-block d-sm-none d-lg-block">
                        <div class="text-left text-sm-right">

                            <hr class="mt-1 mb-n2 d-block d-sm-none">

                            <div class="mt-4">
                                <h5 class="mb-0">
                                    Гео и язык канала <i class="uil-globe float-right d-block d-sm-none"></i>
                                </h5>
                                {{ !!channel['region'] ? channel['region'] : 'Россия' }},
                                {{ !!channel['language'] ? channel['language'] : 'Русский' }}
                            </div>

                            <div class="mt-2">
                                <h5 class="mb-0">
                                    Категория <i class="uil-tag-alt float-right d-block d-sm-none"></i>
                                </h5>
                                <a :href="'/categ/'+ channel['category'] "> {{ channel['friendly_category'] }} </a>

                            </div>

                            <a role="button" class="btn btn-info mt-3 d-none d-sm-inline-block text-truncate"
                               :href=" channel['url'] +'/stat'">
                                <i class="uil-chart-line mr-1"></i> Статистика </a>

                            <div>
                                <a role="button" href="#"
                                   class="btn btn-outline-success popup_ajax d-block d-sm-inline-block js-btn-favorite mt-2 "
                                   :data-src=" channel['url'] +'/create'" >
                                    <i class="uil-star"></i> Избранное </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown position-absolute text-dark" style="top:14px; right:10px;">
                        <a href="#" class="dropdown-toggle arrow-none card-drop border border-info-hover rounded" data-toggle="dropdown" aria-expanded="false">
                            <i class="uil-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item pl-2 popup_ajax" href="#" data-src="/channels/252487/verify">
                                <i class="uil uil-check-circle mr-1 font-16 text-success"></i>
                                Это ваш канал?                    <u>Подтвердить</u>
                            </a>

                            <a class="dropdown-item pl-2 popup_ajax" href="/channel/@languagewithjoy/history" data-src="/channel/@languagewithjoy/history">
                                <i class="uil uil-history-alt mr-1 font-16"></i>
                                История канала                </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="row justify-content-md-center" >
        <div class="col-12 col-md-7 col-lg-6 mb-3 order-last order-md-first">
            <div id="sticky-center-column" class="sticky-center-column">

                <div id="posts-lists-container">


                </div>
            </div>
        </div>

        <div class="col-12 col-md-5 col-lg-4 mb-3 order-first order-md-last">
            <div id="sticky-right-column" class="sticky-right-column" style="">
                <div id="sticky-right-column__inner" class="sticky-right-column__inner" style="position: relative;">


                    <div class="card card-body border pt-1 pb-2 mb-3">
                        <div class="row">
                            <div class="col col-6">
                                <h2 class="mb-1 text-dark">{{ channel['subscribers'] }}</h2>
                                <div class="text-uppercase" style="font-size: 12px">
                                    подписчиков
                                </div>
                            </div>
                            <div class="col col-6 pb-0">
                                <div id="goto-widget-participants-chart" style="min-height: 67px;">
                                    <div id="apexchartss2qg5j7"
                                         class="apexcharts-canvas apexchartss2qg5j7 apexcharts-theme-light"
                                         style="width: 127px; height: 67px;">
                                        <svg id="SvgjsSvg1639" width="127" height="67"
                                             xmlns="http://www.w3.org/2000/svg" version="1.1"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                             class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                             transform="translate(0, 0)" style="background: transparent;">
                                            <g id="SvgjsG1641" class="apexcharts-inner apexcharts-graphical"
                                               transform="translate(0, 0)">
                                                <defs id="SvgjsDefs1640">
                                                    <clipPath id="gridRectMasks2qg5j7">
                                                        <rect id="SvgjsRect1680" width="133" height="69" x="-3" y="-1"
                                                              rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMasks2qg5j7"></clipPath>
                                                    <clipPath id="nonForecastMasks2qg5j7"></clipPath>
                                                    <clipPath id="gridRectMarkerMasks2qg5j7">
                                                        <rect id="SvgjsRect1681" width="131" height="71" x="-2" y="-2"
                                                              rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                              stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <linearGradient id="SvgjsLinearGradient1686" x1="0" y1="0" x2="0"
                                                                    y2="1">
                                                        <stop id="SvgjsStop1687" stop-opacity="0.65"
                                                              stop-color="rgba(39,172,210,0.65)" offset="0"></stop>
                                                        <stop id="SvgjsStop1688" stop-opacity="0.5"
                                                              stop-color="rgba(147,214,233,0.5)" offset="1"></stop>
                                                        <stop id="SvgjsStop1689" stop-opacity="0.5"
                                                              stop-color="rgba(147,214,233,0.5)" offset="1"></stop>
                                                    </linearGradient>
                                                </defs>
                                                <line id="SvgjsLine1648" x1="122.26666666666667" y1="0"
                                                      x2="122.26666666666667" y2="67" stroke="#b6b6b6"
                                                      stroke-dasharray="3" stroke-linecap="butt"
                                                      class="apexcharts-xcrosshairs" x="122.26666666666667" y="0"
                                                      width="1" height="67" fill="#b1b9c4" filter="none"
                                                      fill-opacity="0.9" stroke-width="1"></line>
                                                <g id="SvgjsG1692" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                    <g id="SvgjsG1693" class="apexcharts-xaxis-texts-g"
                                                       transform="translate(0, -4)"></g>
                                                </g>
                                                <g id="SvgjsG1698" class="apexcharts-grid">
                                                    <g id="SvgjsG1699" class="apexcharts-gridlines-horizontal"
                                                       style="display: none;">
                                                        <line id="SvgjsLine1701" x1="0" y1="0" x2="127" y2="0"
                                                              stroke="#e0e0e0" stroke-dasharray="0"
                                                              stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1702" x1="0" y1="9.571428571428571" x2="127"
                                                              y2="9.571428571428571" stroke="#e0e0e0"
                                                              stroke-dasharray="0" stroke-linecap="butt"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1703" x1="0" y1="19.142857142857142" x2="127"
                                                              y2="19.142857142857142" stroke="#e0e0e0"
                                                              stroke-dasharray="0" stroke-linecap="butt"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1704" x1="0" y1="28.714285714285715" x2="127"
                                                              y2="28.714285714285715" stroke="#e0e0e0"
                                                              stroke-dasharray="0" stroke-linecap="butt"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1705" x1="0" y1="38.285714285714285" x2="127"
                                                              y2="38.285714285714285" stroke="#e0e0e0"
                                                              stroke-dasharray="0" stroke-linecap="butt"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1706" x1="0" y1="47.857142857142854" x2="127"
                                                              y2="47.857142857142854" stroke="#e0e0e0"
                                                              stroke-dasharray="0" stroke-linecap="butt"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1707" x1="0" y1="57.42857142857142" x2="127"
                                                              y2="57.42857142857142" stroke="#e0e0e0"
                                                              stroke-dasharray="0" stroke-linecap="butt"
                                                              class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1708" x1="0" y1="67" x2="127" y2="67"
                                                              stroke="#e0e0e0" stroke-dasharray="0"
                                                              stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG1700" class="apexcharts-gridlines-vertical"
                                                       style="display: none;"></g>
                                                    <line id="SvgjsLine1710" x1="0" y1="67" x2="127" y2="67"
                                                          stroke="transparent" stroke-dasharray="0"
                                                          stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine1709" x1="0" y1="1" x2="0" y2="67"
                                                          stroke="transparent" stroke-dasharray="0"
                                                          stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1682"
                                                   class="apexcharts-area-series apexcharts-plot-series">
                                                    <g id="SvgjsG1683" class="apexcharts-series"
                                                       seriesName="participants" data:longestSeries="true" rel="1"
                                                       data:realIndex="0">
                                                        <path id="SvgjsPath1690"
                                                              d="M 0 67L 0 32.782142857142844C 1.4816666666666667 32.782142857142844 2.751666666666667 40.79342857142865 4.233333333333333 40.79342857142865C 5.715 40.79342857142865 6.985 28.905714285714566 8.466666666666667 28.905714285714566C 9.948333333333332 28.905714285714566 11.218333333333334 33.15542857142873 12.7 33.15542857142873C 14.181666666666667 33.15542857142873 15.451666666666666 42.631142857143004 16.933333333333334 42.631142857143004C 18.415 42.631142857143004 19.685 55.026142857142986 21.166666666666664 55.026142857142986C 22.64833333333333 55.026142857142986 23.918333333333333 47.87628571428604 25.4 47.87628571428604C 26.881666666666664 47.87628571428604 28.151666666666667 46.48842857142881 29.633333333333333 46.48842857142881C 31.115 46.48842857142881 32.385 45.08142857142866 33.86666666666667 45.08142857142866C 35.348333333333336 45.08142857142866 36.61833333333333 48.47928571428611 38.1 48.47928571428611C 39.58166666666666 48.47928571428611 40.85166666666667 45.38771428571454 42.33333333333333 45.38771428571454C 43.815 45.38771428571454 45.084999999999994 41.9515714285717 46.56666666666666 41.9515714285717C 48.04833333333333 41.9515714285717 49.31833333333333 37.922000000000025 50.8 37.922000000000025C 52.281666666666666 37.922000000000025 53.55166666666666 25.737571428571755 55.03333333333333 25.737571428571755C 56.515 25.737571428571755 57.785 34.954857142857236 59.266666666666666 34.954857142857236C 60.748333333333335 34.954857142857236 62.01833333333333 42.248285714285885 63.5 42.248285714285885C 64.98166666666667 42.248285714285885 66.25166666666667 51.350714285714275 67.73333333333333 51.350714285714275C 69.215 51.350714285714275 70.485 55.294142857143015 71.96666666666667 55.294142857143015C 73.44833333333334 55.294142857143015 74.71833333333333 39.56828571428605 76.2 39.56828571428605C 77.68166666666667 39.56828571428605 78.95166666666667 30.56157142857137 80.43333333333334 30.56157142857137C 81.91499999999999 30.56157142857137 83.185 30.552000000000135 84.66666666666666 30.552000000000135C 86.14833333333333 30.552000000000135 87.41833333333332 19.34385714285736 88.89999999999999 19.34385714285736C 90.38166666666666 19.34385714285736 91.65166666666666 10.404142857143142 93.13333333333333 10.404142857143142C 94.615 10.404142857143142 95.88499999999999 11.562285714285736 97.36666666666666 11.562285714285736C 98.84833333333333 11.562285714285736 100.11833333333333 13.773285714285976 101.6 13.773285714285976C 103.08166666666666 13.773285714285976 104.35166666666666 17.161571428571733 105.83333333333333 17.161571428571733C 107.315 17.161571428571733 108.585 12.978857142857123 110.06666666666666 12.978857142857123C 111.54833333333333 12.978857142857123 112.81833333333333 10.490285714286074 114.3 10.490285714286074C 115.78166666666667 10.490285714286074 117.05166666666666 10.385000000000218 118.53333333333333 10.385000000000218C 120.015 10.385000000000218 121.285 9.552285714285972 122.76666666666667 9.552285714285972C 124.24833333333333 9.552285714285972 125.51833333333333 11.887714285714537 127 11.887714285714537C 127 11.887714285714537 127 11.887714285714537 127 67M 127 11.887714285714537z"
                                                              fill="url(#SvgjsLinearGradient1686)" fill-opacity="1"
                                                              stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                              stroke-dasharray="0" class="apexcharts-area" index="0"
                                                              clip-path="url(#gridRectMasks2qg5j7)"
                                                              pathTo="M 0 67L 0 32.782142857142844C 1.4816666666666667 32.782142857142844 2.751666666666667 40.79342857142865 4.233333333333333 40.79342857142865C 5.715 40.79342857142865 6.985 28.905714285714566 8.466666666666667 28.905714285714566C 9.948333333333332 28.905714285714566 11.218333333333334 33.15542857142873 12.7 33.15542857142873C 14.181666666666667 33.15542857142873 15.451666666666666 42.631142857143004 16.933333333333334 42.631142857143004C 18.415 42.631142857143004 19.685 55.026142857142986 21.166666666666664 55.026142857142986C 22.64833333333333 55.026142857142986 23.918333333333333 47.87628571428604 25.4 47.87628571428604C 26.881666666666664 47.87628571428604 28.151666666666667 46.48842857142881 29.633333333333333 46.48842857142881C 31.115 46.48842857142881 32.385 45.08142857142866 33.86666666666667 45.08142857142866C 35.348333333333336 45.08142857142866 36.61833333333333 48.47928571428611 38.1 48.47928571428611C 39.58166666666666 48.47928571428611 40.85166666666667 45.38771428571454 42.33333333333333 45.38771428571454C 43.815 45.38771428571454 45.084999999999994 41.9515714285717 46.56666666666666 41.9515714285717C 48.04833333333333 41.9515714285717 49.31833333333333 37.922000000000025 50.8 37.922000000000025C 52.281666666666666 37.922000000000025 53.55166666666666 25.737571428571755 55.03333333333333 25.737571428571755C 56.515 25.737571428571755 57.785 34.954857142857236 59.266666666666666 34.954857142857236C 60.748333333333335 34.954857142857236 62.01833333333333 42.248285714285885 63.5 42.248285714285885C 64.98166666666667 42.248285714285885 66.25166666666667 51.350714285714275 67.73333333333333 51.350714285714275C 69.215 51.350714285714275 70.485 55.294142857143015 71.96666666666667 55.294142857143015C 73.44833333333334 55.294142857143015 74.71833333333333 39.56828571428605 76.2 39.56828571428605C 77.68166666666667 39.56828571428605 78.95166666666667 30.56157142857137 80.43333333333334 30.56157142857137C 81.91499999999999 30.56157142857137 83.185 30.552000000000135 84.66666666666666 30.552000000000135C 86.14833333333333 30.552000000000135 87.41833333333332 19.34385714285736 88.89999999999999 19.34385714285736C 90.38166666666666 19.34385714285736 91.65166666666666 10.404142857143142 93.13333333333333 10.404142857143142C 94.615 10.404142857143142 95.88499999999999 11.562285714285736 97.36666666666666 11.562285714285736C 98.84833333333333 11.562285714285736 100.11833333333333 13.773285714285976 101.6 13.773285714285976C 103.08166666666666 13.773285714285976 104.35166666666666 17.161571428571733 105.83333333333333 17.161571428571733C 107.315 17.161571428571733 108.585 12.978857142857123 110.06666666666666 12.978857142857123C 111.54833333333333 12.978857142857123 112.81833333333333 10.490285714286074 114.3 10.490285714286074C 115.78166666666667 10.490285714286074 117.05166666666666 10.385000000000218 118.53333333333333 10.385000000000218C 120.015 10.385000000000218 121.285 9.552285714285972 122.76666666666667 9.552285714285972C 124.24833333333333 9.552285714285972 125.51833333333333 11.887714285714537 127 11.887714285714537C 127 11.887714285714537 127 11.887714285714537 127 67M 127 11.887714285714537z"
                                                              pathFrom="M -1 2890.571428571429L -1 2890.571428571429L 4.233333333333333 2890.571428571429L 8.466666666666667 2890.571428571429L 12.7 2890.571428571429L 16.933333333333334 2890.571428571429L 21.166666666666664 2890.571428571429L 25.4 2890.571428571429L 29.633333333333333 2890.571428571429L 33.86666666666667 2890.571428571429L 38.1 2890.571428571429L 42.33333333333333 2890.571428571429L 46.56666666666666 2890.571428571429L 50.8 2890.571428571429L 55.03333333333333 2890.571428571429L 59.266666666666666 2890.571428571429L 63.5 2890.571428571429L 67.73333333333333 2890.571428571429L 71.96666666666667 2890.571428571429L 76.2 2890.571428571429L 80.43333333333334 2890.571428571429L 84.66666666666666 2890.571428571429L 88.89999999999999 2890.571428571429L 93.13333333333333 2890.571428571429L 97.36666666666666 2890.571428571429L 101.6 2890.571428571429L 105.83333333333333 2890.571428571429L 110.06666666666666 2890.571428571429L 114.3 2890.571428571429L 118.53333333333333 2890.571428571429L 122.76666666666667 2890.571428571429L 127 2890.571428571429"></path>
                                                        <path id="SvgjsPath1691"
                                                              d="M 0 32.782142857142844C 1.4816666666666667 32.782142857142844 2.751666666666667 40.79342857142865 4.233333333333333 40.79342857142865C 5.715 40.79342857142865 6.985 28.905714285714566 8.466666666666667 28.905714285714566C 9.948333333333332 28.905714285714566 11.218333333333334 33.15542857142873 12.7 33.15542857142873C 14.181666666666667 33.15542857142873 15.451666666666666 42.631142857143004 16.933333333333334 42.631142857143004C 18.415 42.631142857143004 19.685 55.026142857142986 21.166666666666664 55.026142857142986C 22.64833333333333 55.026142857142986 23.918333333333333 47.87628571428604 25.4 47.87628571428604C 26.881666666666664 47.87628571428604 28.151666666666667 46.48842857142881 29.633333333333333 46.48842857142881C 31.115 46.48842857142881 32.385 45.08142857142866 33.86666666666667 45.08142857142866C 35.348333333333336 45.08142857142866 36.61833333333333 48.47928571428611 38.1 48.47928571428611C 39.58166666666666 48.47928571428611 40.85166666666667 45.38771428571454 42.33333333333333 45.38771428571454C 43.815 45.38771428571454 45.084999999999994 41.9515714285717 46.56666666666666 41.9515714285717C 48.04833333333333 41.9515714285717 49.31833333333333 37.922000000000025 50.8 37.922000000000025C 52.281666666666666 37.922000000000025 53.55166666666666 25.737571428571755 55.03333333333333 25.737571428571755C 56.515 25.737571428571755 57.785 34.954857142857236 59.266666666666666 34.954857142857236C 60.748333333333335 34.954857142857236 62.01833333333333 42.248285714285885 63.5 42.248285714285885C 64.98166666666667 42.248285714285885 66.25166666666667 51.350714285714275 67.73333333333333 51.350714285714275C 69.215 51.350714285714275 70.485 55.294142857143015 71.96666666666667 55.294142857143015C 73.44833333333334 55.294142857143015 74.71833333333333 39.56828571428605 76.2 39.56828571428605C 77.68166666666667 39.56828571428605 78.95166666666667 30.56157142857137 80.43333333333334 30.56157142857137C 81.91499999999999 30.56157142857137 83.185 30.552000000000135 84.66666666666666 30.552000000000135C 86.14833333333333 30.552000000000135 87.41833333333332 19.34385714285736 88.89999999999999 19.34385714285736C 90.38166666666666 19.34385714285736 91.65166666666666 10.404142857143142 93.13333333333333 10.404142857143142C 94.615 10.404142857143142 95.88499999999999 11.562285714285736 97.36666666666666 11.562285714285736C 98.84833333333333 11.562285714285736 100.11833333333333 13.773285714285976 101.6 13.773285714285976C 103.08166666666666 13.773285714285976 104.35166666666666 17.161571428571733 105.83333333333333 17.161571428571733C 107.315 17.161571428571733 108.585 12.978857142857123 110.06666666666666 12.978857142857123C 111.54833333333333 12.978857142857123 112.81833333333333 10.490285714286074 114.3 10.490285714286074C 115.78166666666667 10.490285714286074 117.05166666666666 10.385000000000218 118.53333333333333 10.385000000000218C 120.015 10.385000000000218 121.285 9.552285714285972 122.76666666666667 9.552285714285972C 124.24833333333333 9.552285714285972 125.51833333333333 11.887714285714537 127 11.887714285714537"
                                                              fill="none" fill-opacity="1" stroke="#27acd2"
                                                              stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                              stroke-dasharray="0" class="apexcharts-area" index="0"
                                                              clip-path="url(#gridRectMasks2qg5j7)"
                                                              pathTo="M 0 32.782142857142844C 1.4816666666666667 32.782142857142844 2.751666666666667 40.79342857142865 4.233333333333333 40.79342857142865C 5.715 40.79342857142865 6.985 28.905714285714566 8.466666666666667 28.905714285714566C 9.948333333333332 28.905714285714566 11.218333333333334 33.15542857142873 12.7 33.15542857142873C 14.181666666666667 33.15542857142873 15.451666666666666 42.631142857143004 16.933333333333334 42.631142857143004C 18.415 42.631142857143004 19.685 55.026142857142986 21.166666666666664 55.026142857142986C 22.64833333333333 55.026142857142986 23.918333333333333 47.87628571428604 25.4 47.87628571428604C 26.881666666666664 47.87628571428604 28.151666666666667 46.48842857142881 29.633333333333333 46.48842857142881C 31.115 46.48842857142881 32.385 45.08142857142866 33.86666666666667 45.08142857142866C 35.348333333333336 45.08142857142866 36.61833333333333 48.47928571428611 38.1 48.47928571428611C 39.58166666666666 48.47928571428611 40.85166666666667 45.38771428571454 42.33333333333333 45.38771428571454C 43.815 45.38771428571454 45.084999999999994 41.9515714285717 46.56666666666666 41.9515714285717C 48.04833333333333 41.9515714285717 49.31833333333333 37.922000000000025 50.8 37.922000000000025C 52.281666666666666 37.922000000000025 53.55166666666666 25.737571428571755 55.03333333333333 25.737571428571755C 56.515 25.737571428571755 57.785 34.954857142857236 59.266666666666666 34.954857142857236C 60.748333333333335 34.954857142857236 62.01833333333333 42.248285714285885 63.5 42.248285714285885C 64.98166666666667 42.248285714285885 66.25166666666667 51.350714285714275 67.73333333333333 51.350714285714275C 69.215 51.350714285714275 70.485 55.294142857143015 71.96666666666667 55.294142857143015C 73.44833333333334 55.294142857143015 74.71833333333333 39.56828571428605 76.2 39.56828571428605C 77.68166666666667 39.56828571428605 78.95166666666667 30.56157142857137 80.43333333333334 30.56157142857137C 81.91499999999999 30.56157142857137 83.185 30.552000000000135 84.66666666666666 30.552000000000135C 86.14833333333333 30.552000000000135 87.41833333333332 19.34385714285736 88.89999999999999 19.34385714285736C 90.38166666666666 19.34385714285736 91.65166666666666 10.404142857143142 93.13333333333333 10.404142857143142C 94.615 10.404142857143142 95.88499999999999 11.562285714285736 97.36666666666666 11.562285714285736C 98.84833333333333 11.562285714285736 100.11833333333333 13.773285714285976 101.6 13.773285714285976C 103.08166666666666 13.773285714285976 104.35166666666666 17.161571428571733 105.83333333333333 17.161571428571733C 107.315 17.161571428571733 108.585 12.978857142857123 110.06666666666666 12.978857142857123C 111.54833333333333 12.978857142857123 112.81833333333333 10.490285714286074 114.3 10.490285714286074C 115.78166666666667 10.490285714286074 117.05166666666666 10.385000000000218 118.53333333333333 10.385000000000218C 120.015 10.385000000000218 121.285 9.552285714285972 122.76666666666667 9.552285714285972C 124.24833333333333 9.552285714285972 125.51833333333333 11.887714285714537 127 11.887714285714537"
                                                              pathFrom="M -1 2890.571428571429L -1 2890.571428571429L 4.233333333333333 2890.571428571429L 8.466666666666667 2890.571428571429L 12.7 2890.571428571429L 16.933333333333334 2890.571428571429L 21.166666666666664 2890.571428571429L 25.4 2890.571428571429L 29.633333333333333 2890.571428571429L 33.86666666666667 2890.571428571429L 38.1 2890.571428571429L 42.33333333333333 2890.571428571429L 46.56666666666666 2890.571428571429L 50.8 2890.571428571429L 55.03333333333333 2890.571428571429L 59.266666666666666 2890.571428571429L 63.5 2890.571428571429L 67.73333333333333 2890.571428571429L 71.96666666666667 2890.571428571429L 76.2 2890.571428571429L 80.43333333333334 2890.571428571429L 84.66666666666666 2890.571428571429L 88.89999999999999 2890.571428571429L 93.13333333333333 2890.571428571429L 97.36666666666666 2890.571428571429L 101.6 2890.571428571429L 105.83333333333333 2890.571428571429L 110.06666666666666 2890.571428571429L 114.3 2890.571428571429L 118.53333333333333 2890.571428571429L 122.76666666666667 2890.571428571429L 127 2890.571428571429"></path>
                                                        <g id="SvgjsG1684" class="apexcharts-series-markers-wrap"
                                                           data:realIndex="0">
                                                            <g class="apexcharts-series-markers">
                                                                <circle id="SvgjsCircle1716" r="0"
                                                                        cx="122.76666666666667" cy="9.552285714285972"
                                                                        class="apexcharts-marker wyoqgdbg6 no-pointer-events"
                                                                        stroke="#ffffff" fill="#27acd2" fill-opacity="1"
                                                                        stroke-width="2" stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1685" class="apexcharts-datalabels"
                                                       data:realIndex="0"></g>
                                                </g>
                                                <line id="SvgjsLine1711" x1="0" y1="0" x2="127" y2="0" stroke="#b6b6b6"
                                                      stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                      class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1712" x1="0" y1="0" x2="127" y2="0"
                                                      stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                      class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG1713" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG1714" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG1715" class="apexcharts-point-annotations"></g>
                                            </g>
                                            <rect id="SvgjsRect1647" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                  opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                  fill="#fefefe"></rect>
                                            <g id="SvgjsG1697" class="apexcharts-yaxis" rel="0"
                                               transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG1642" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend" style="max-height: 33.5px;"></div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a role="button" class="btn btn-info w-100 mt-2"
                           href="https://tgstat.ru/channel/@tikandelaki/stat">
                            <i class="uil-chart-line mr-1"></i>
                            Статистика канала </a>
                    </div>


                    <div class="card border">
                        <div class="card-body py-2">
                            <div class="card-widgets">
                                <i class="uil-thumbs-up text-dark"></i>
                            </div>
                            <h5 class="card-title mb-2 text-dark">
                                Популярное в канале <i class="uil uil-question-circle text-muted" title=""
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Топ публикаций по кол-ву просмотров за последние 30 дней"></i>
                            </h5>
                            <hr class="m-0 mb-2">


                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


</template>

<style scoped>

</style>
