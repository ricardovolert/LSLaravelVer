@extends('frontend.layouts.master')

@section('title', '選擇討論版 | 討論區')

@section('content')
@if($boards->isEmpty())
    <div class="container">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">資訊</h3>
            </div>
            <div class="panel-body text-center">
                <h2 class="warning-warn">目前沒有任何公開討論板。<br /><br />
                </h2>
            </div>
        </div>
    </div>
@else
    <!-- 討論版塊放置區 -->
    <div class="row" style="margin-top: 0px; padding-top: 0px;">
        @foreach($boards as $board)
        <div class="col-md-4 courses-info">
            <div class="thumbnail">
                <a href="#"><img src="{{ asset('images/bbs/board/' . $board->boardImage) }}" style="width: 640px; height: 310px"></a>
                <div class="caption">
                    <h3 class="pull-left">{{ $board->boardName }} </h3>
                    <div class="fLeft">{!! $board->boardDescript !!}</div>
                    <div class="clearfix"></div>
                    <p class="text-center">
                        <div class="text-center" style="margin-bottom: 15px;">
                            <a href="{{ route('showboard', ['bid' => $board->boardID]) }}" class="btn btn-block btn-warning">進入討論板</a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection