<div class="media">
    <div class="media-body review-body">
        <div class="row">
            <span class="review-body-user">{{$item->first_name}}</span>
            <span class="review-body-time">{{$item->created_at}}</span>
        </div>
        <span class="review-body-content">{!! nl2br(e($item->review)) !!}</span>
    </div>
</div>
