                <div class="col-md-2 bootstrap-admin-col-left">
                    @if(Auth::user()->level >= 1)
                     <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                         <li @if(request()->getRequestUri() == '/home')class="active"@endif>
                            <a href="/home"><i class="glyphicon glyphicon-chevron-right"></i> 首页</a>
                        </li>
                        
                        <li @if(request()->getRequestUri() == '/user')class="active"@endif>
                            <a href="/user"><i class="glyphicon glyphicon-chevron-right"></i> 用户管理</a>
                        </li>
                                               
                        <li @if(request()->getRequestUri() == '/domain')class="active"@endif>
                            <a href="/domain"><i class="glyphicon glyphicon-chevron-right"></i> 域名管理</a><!-- calendar.html -->
                        </li>
                    </ul>
                    @endif
                </div>