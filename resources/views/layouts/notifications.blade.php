
        @if (Auth::user()->unreadNotifications->count() > 0)
        <a class="nav-link" href="#" id="notificationLink"><i class="fas fa-bell "></i>
            <span id="notification_count">
                    {{Auth::user()->unreadNotifications->count()}}
        </span>
        </a>
        @else
        <a class="nav-link" href="#" id="notificationLink"><i class="fas fa-bell "></i>

            {{-- <span >
                {{Auth::user()->unreadNotifications->count()}}
        </span> --}}
        </a>
        @endif

        <div id="notificationContainer">
           <div id="notificationTitle">Notifications  <span class="mark-read"><a href="/markasread">mark all as read</a></span></div>

           <div id="notificationsBody" class="notifications">
                   @foreach (Auth::user()->unreadNotifications as $notification)


                     <ul>
                         @if ($notification->type === "App\Notifications\CreatedTask")
                         <a href="/tasks/{{$notification->data['task_id']}}">
                            <li class="notice">


                                {{$notification->data['user_name']}} added a new task
                                     {{$notification->created_at->diffForHumans()}}.

                                </li>
                            </a>

                         @elseif($notification->type === "App\Notifications\CreateProject")
                         <a href="/projects/{{$notification->data['project_id']}}">
                            <li class="notice">


                                {{$notification->data['user_name']}} added a new project,  {{$notification->data['project_name']}}
                                     {{$notification->created_at->diffForHumans()}}.

                                </li>
                            </a>
                            @elseif($notification->type === "App\Notifications\EditedProject")
                            <a href="/projects/{{$notification->data['project_id']}}">
                               <li class="notice">



                                {{$notification->data['user_name']}} updated the project, {{$notification->data['project_name']}}
                                        {{$notification->created_at->diffForHumans()}}.

                                   </li>
                               </a>
                               @elseif($notification->type === "App\Notifications\EditedTask")
                                <a href="/tasks/{{$notification->data['task_id']}}">
                            <li class="notice">


                                {{$notification->data['user_name']}} updated a Task
                                  {{$notification->created_at->diffForHumans()}}.

                             </li>
                         </a>
                         @elseif($notification->type === "App\Notifications\TaskedUser")
                         <a href="/tasks/{{$notification->data['task_id']}}">
                     <li class="notice">


                        {{$notification->data['user_name']}} was added to a task
                           {{$notification->created_at->diffForHumans()}}.

                      </li>
                  </a>
                  @elseif($notification->type === "App\Notifications\ProjectedUser")
                  <a href="/projects/{{$notification->data['project_id']}}">
              <li class="notice">


                {{$notification->data['user_name']}} was added to this Project
                                        {{$notification->created_at->diffForHumans()}}.

                                </li>
                            </a>
                     @elseif($notification->type === "App\Notifications\CommentedUser")
                            <a href="#">
                        <li class="notice">

                            {{$notification->data['user_name']}} commented to a task
                                {{$notification->created_at->diffForHumans()}}.

                            </li>
                        </a>
                         @endif


                     @endforeach
                      @foreach (Auth::user()->readNotifications as $notification)

                     <ul>

                        @if ($notification->type === "App\Notifications\CreatedTask")
                        <a href="/tasks/{{$notification->data['task_id']}}">
                           <li class="notice">


                            {{$notification->data['user_name']}} added a new task
                                    {{$notification->created_at->diffForHumans()}}.

                               </li>
                           </a>

                        @elseif($notification->type === "App\Notifications\CreateProject")
                        <a href="/projects/{{$notification->data['project_id']}}">
                           <li class="notice">


                            {{$notification->data['user_name']}} added a new project,   {{$notification->data['project_name']}}
                                    {{$notification->created_at->diffForHumans()}}.

                               </li>
                           </a>
                           @elseif($notification->type === "App\Notifications\EditedProject")
                           <a href="/projects/{{$notification->data['project_id']}}">
                              <li class="notice">

                                {{$notification->data['user_name']}} updated the project, {{$notification->data['project_name']}}
                                       {{$notification->created_at->diffForHumans()}}.

                                  </li>
                              </a>
                              @elseif($notification->type === "App\Notifications\EditedTask")
                               <a href="/tasks/{{$notification->data['task_id']}}">
                           <li class="notice">


                            {{$notification->data['user_name']}} updated a Task
                                 {{$notification->created_at->diffForHumans()}}.

                            </li>
                        </a>
                        @elseif($notification->type === "App\Notifications\TaskedUser")
                        <a href="/tasks/{{$notification->data['task_id']}}">
                    <li class="notice">


                        {{$notification->data['user_name']}} was added to a task
                          {{$notification->created_at->diffForHumans()}}.

                     </li>
                 </a>
                 @elseif($notification->type === "App\Notifications\ProjectedUser")
                 <a href="/tasks/{{$notification->data['task_id']}}">
             <li class="notice">


                {{$notification->data['user_name']}} was added to a Project
                                       {{$notification->created_at->diffForHumans()}}.

                               </li>
                           </a>
                    @elseif($notification->type === "App\Notifications\CommentedUser")
                           <a href="{{$notification->data['comment_id']}}">
                       <li class="notice">

                        {{$notification->data['user_name']}} commented to a task
                               {{$notification->created_at->diffForHumans()}}.

                           </li>
                       </a>
                        @endif


                 @endforeach

           </div>
           <div id="notificationFooter"><a href="/allnotifications">See All</a></div>
        </div>





<script type="text/javascript" >
   $(document).ready(function()
   {
   $("#notificationLink").click(function()
   {
   $("#notificationContainer").fadeToggle(300);
   $("#notification_count").fadeOut("slow");
   return false;
   });

   //Document Click hiding the popup
   $(document).click(function()
   {
   $("#notificationContainer").hide();
   });

   //Popup on click
   $("#notificationContainer").click(function()
   {

   });

   });

   var count = document.getElementById('notification_count')

   </script>
