<style>
    .disc1 {
        border-radius: 5px;
    background: lavender;
    padding: 12px;
    }
    .disc2 {
        border-radius: 5px;
    background: moccasin;
    padding: 12px;
    }
</style>
<div class="container">
    <div class="row">
        <div style="<?php if($type != "admin") echo "width : 85%" ; ?>">
            <div class="panel panel-primary">
                <div class="panel-heading p-5">
                    <span class="glyphicon glyphicon-comment"></span> Messagerie
                     
                </div>
                <div class="panel-body" style="overflow-y: scroll !important; height:400px !important;">
                    <ul class="chat">
                        @foreach ($messages as $message )
                            @if($message->admin_id == 0)
                                @php
                                    $user = \App\Models\User::find($message->user_id);
                                @endphp
                                <li class="left clearfix row ">                           
                                    <div class="col-md-4 p-4" style="display: flow-root;">
                                      <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                                      </span>
                                    </div>
                                
                                    <div class="col-md-8 disc1">
                                        <div class="chat-body clearfix ">
                                            <div class="header">
                                                <strong class="primary-font" style="color: #2cbd37; ">{{ $user->name }}</strong>  
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>{{ $message->created_at->diffForHumans() }}</small>
                                            </div>
                                            <p>
                                                {{ $message->body }}
                                            </p>
                                        </div>
                                    </div>
                                    
                                </li>
                            @endif

                            

                            @if ($message->user_id == 0)
                                 @php
                                    $admin = \App\Models\Admin::find($message->admin_id);
                                @endphp
                                
                                <li class="right clearfix row">
                            
                                    <div class="col-md-8 disc2" >
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class=" primary-font" style="color: rgb(255 0 141);">{{ $admin->name }}</strong>
                                                    <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>{{ $message->created_at->diffForHumans() }}</small>

                                                </div>
                                                <p>
                                                   {{ $message->body }}
                                                </p>
                                            </div>
                                    </div>
                                    <div class="col-md-4 p-4" style="display: flow-root;">
                                        <span class="chat-img pull-right row">
                                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                                        </span>
                                        </div>
                                        
                                </li>
                            @endif
                            
                                <hr>
                             
                        @endforeach
                        
                        
                        
                        
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        @if ($type=='admin')
                            <form action="{{ route('save.message_admin') }}" method="post">
                        @else
                            <form action="{{ route('save.message_client') }}" method="post">
                        @endif
                            @csrf
                            <input type="hidden" name="r_o_521" value="{{ $order->invoice_number }}">
                            <textarea name="message" class="form-control input-sm" placeholder="Type your message here..." id="btn-input" cols="30" rows="4"></textarea>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
                                    Envoyer</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
