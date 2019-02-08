
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <div class="card card-default">
            <div class="card-header">
                    <i class="fas fa-comments"></i>&nbsp;
                <strong>
                    Recent Comments
                </strong>
            </div>
            <div class="card-body">
                <ul class="media-list">
                    @foreach ($comments as $comment)
                    <li class="media">
                        <div class="media-left">
                            
                            <img src="http://placehold.it/60x60" class="img-thumbnail " style="border-radius:500px">
                        </div>&nbsp;&nbsp;
                        <div class="media-body">
                            <h5>

                                <small>
                                    <a href="user/{{$comment->user_id}}"> {{$comment->user->name}}</a>
                                    <br>
                                    commented on  {{$comment->user->created_at}}
                                    <p> {{ $comment->body}}</p>
                                    <p class="text-danger"><strong>Proof : </strong> {{ $comment->url }}</p>
                                </small>
                            </h5>
                          
                        </div>
                    </li>
                   
                    <hr>                        
                    @endforeach
                </ul>
                <a href="#" class="btn btn-default btn-block">More Events »</a>
            </div>
        </div>

        </div>