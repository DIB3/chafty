{{-- -------------------- The default card (white) -------------------- --}}
@if($viewType == 'default')
    @if($from_id != $to_id)
    <div class="message-card" data-id="{{ $id }}">
        <p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
            
            {{-- If attachment is a file --}}
            @if(@$attachment[2] == 'file')
            <a href="{{ route(config('chatify.attachments.download_route_name'),['fileName'=>$attachment[0]]) }}" style="color: #595959;" class="file-download">
                <span class="fas fa-file"></span> {{$attachment[1]}}</a>
                <span class="fas fa-folder" style="font-size: 10px "></span><span style="font-size: 10px ">  shared file</span ></sub>
            <sub title="{{ $fullTime }}">{{ $time }}</sub>
            @endif
        </p>
    </div>
    {{-- If attachment is an image --}}
    @if(@$attachment[2] == 'image')
    <div>
        <div class="message-card">
            <div class="image-file chat-image" style="width: 250px; height: 150px;background-image: url('{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
            </div>
        </div>
    </div>
    @endif
    @if(@$attachment[2] == 'video')
    <div>
        <div class="message-card ">
           
            <video width="320" height="240"  controls>
                <source src="'{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}'" > 
             </video>
             
        </div>
    </div>
    @endif
    @if(@$attachment[2] == 'audio')
    <div>
        <div class="message-card ">
            
            <audio   controls>
                <source src='{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}' type="audio/mpeg" > 
             </audio>
             
        </div>
    </div>
    @endif
    @endif
@endif


{{-- -------------------- Sender card (owner) -------------------- --}}
@if($viewType == 'sender')
    
    <div class="message-card mc-sender" data-id="{{ $id }}">
        <p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file' ) ? $attachment[1] : nl2br($message) !!}
             {{-- If attachment is a file --}}
            @if(@$attachment[2] == 'file')     
            <a  href="{{ route(config('chatify.attachments.download_route_name'),['fileName'=>$attachment[0]]) }}" class="file-download">
                <span class="fas fa-file"></span> {{$attachment[1]}}</a>
                <sub title="{{ $fullTime }}" class="message-time" >
                <span class="fas fa-folder"></span> shared file</sub>          
            @endif      
            <sub title="{{ $fullTime }}" class="message-time" >
            <span class="fas fa-{{ $seen > 0 ? 'check-double' : 'check' }} seen"></span> {{ $time }}</sub>
           
            
        </p>
        
    
    </div>
     {{-- If attachment is a image --}}
     @if(@$attachment[2] == 'image')
     <div>
         <div class="message-card mc-sender">
             <div class="image-file chat-image" style="width: 250px; height: 150px;background-image: url('{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
             </div>
         </div>
     </div>
     @endif
     {{-- If attachment is a video --}}
     @if(@$attachment[2] == 'video')
     <div>
         <div class="message-card mc-sender">
             
             <video width="320" height="240"  controls>
                 <source src='{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}' type='video/mp4' > 
              </video>
              
         </div>
     </div>
     @endif
     {{-- If attachment is a audio --}}
     @if(@$attachment[2] == 'audio')
     <div>
     <div class="message-card mc-sender">
         
         <audio   controls>
             <source src='{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}' type="audio/mpeg" > 
          </audio>
          
     </div>
     </div>
     @endif     
@endif
