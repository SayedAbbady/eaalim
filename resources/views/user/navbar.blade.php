
 <!-- header start -->
 <header class="nav-fixed">
  <!-- navbar start-->
  <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
          <a class="navbar-brand" href="{{asset('/')}}"><span class="bold main-gr">Eaalim|</span> syllabus</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item home">
                      <a class="nav-link" href="{{asset('/')}}">Home </a>
                  </li>
                  
                  
                  @foreach($units as $uniti)
                             
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('show.unit',$uniti->u_id)}}">{{$uniti->u_name}}</a>
                  </li>
                  @endforeach         
                          
                <li class="nav-item">
                    <form action="{{route('search-form')}}" class="form-inline" method="POST">
                        @csrf
                        <input type="text" name="search" placeholder="Search" class="form-control-sm mt-2 form-control" id="">
                        <button 
                            id   ="search-btn-form"
                            class=" btn-primary btn" 
                            style=" font-size: 11.3px;
                                    margin-top: 8px;
                                    margin-left: -12px;
                                    border-top-left-radius: 0;
                                    border-bottom-left-radius: 0;" 
                            type="  submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </li>
                  
                  
                  
              </ul>

          </div>
      </div>
  </nav>
  
  <!-- navbar end-->
</header>
<!-- header end -->