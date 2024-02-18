<!-- menu profile quick info -->
<div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('admin/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>@if(Auth::guard('admin')->check())
                      {{ Auth::guard('admin')->user()->fullName }}
                    @endif</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />