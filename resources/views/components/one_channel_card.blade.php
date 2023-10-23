<div class="card card-body peer-item-box py-2 border mb-2 mb-sm-3 border-info-hover position-relative ">

    <a class="js-btn-favorite favorite-btn favorite-btn-top popup_ajax " href="#"
       data-src="/my/favorites/@kobzevii/create" data-id="10765872"><i class="fav-icon" title="" data-toggle="tooltip"
                                                                       data-placement="top"
                                                                       data-original-title="Добавить в Избранное"
                                                                       data-original-title-inactive="Добавить в Избранное"
                                                                       data-original-title-active="В Избранном"></i></a>
    <a href="{!! \App\Services\ChannelCard::channel_url($channel['alias']) !!}" class="text-body">
        <div class="row">

            <div class="col" style="min-width: 0; max-width: 100%">
                <div>
                    <div class="font-16 text-dark text-truncate">{{ $channel['name'] }}</div>
                    <div class="font-14 text-muted line-clamp-2 mt-1" style="min-height: 42px;">
                        {{ $channel['description'] }}                </div>
                </div>

                @if( !empty($channel['category']) )

                    <div class="mt-2">
                        <div class="font-12 text-body">
                            {!! \App\Services\Data::friendly_name($channel['category']) !!}&nbsp;
                        </div>
                        <div class="font-12 text-truncate">
                            <b>{{ $channel['subscribers'] }}</b> подписчиков
                        </div>
                    </div>

                @endif

            </div>
            <div class="col-auto mr-n2 d-flex justify-content-end">
                <div class="d-flex align-items-start flex-column">
                    <div class="mb-auto">
                        <img src="{{ $channel['img'] }}" class="img-thumbnail rounded-circle inline-block"
                             style="width:70px; height:70px;"></div>
                    <div class="w-100">


                        <div class="text-center text-muted font-12" title="" data-toggle="tooltip" data-html="true"
                             data-placement="top"
                             data-original-title="Последняя публикация в канале: <br>{{ $channel['last_post_date'] }} назад"
                             data-trigger="click">
                            {{ $channel['last_post_date'] }}                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
