<!-- ##### HEAD PANEL ##### -->
<div class="kt-headpanel">
    <div class="kt-headpanel-left">
    <a id="naviconMenu" href="" class="kt-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
    <a id="naviconMenuMobile" href="" class="kt-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
    </div><!-- kt-headpanel-left -->

    <div class="kt-headpanel-right">
    <div class="dropdown dropdown-notification">
        <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
        <i class="icon ion-ios-bell-outline tx-24"></i>
        <!-- start: if statement -->
        <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
        <!-- end: if statement -->
        </a>
        <div class="dropdown-menu wd-300 pd-0-force">
        <div class="dropdown-menu-header">
            <label>Notifications</label>
            <a href="">Mark All as Read</a>
        </div><!-- d-flex -->

        <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
                <img src="assets/thuthuy/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                <p class="tx-13 mg-b-0"><strong class="tx-medium">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
            </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
                <img src="assets/thuthuy/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                <p class="tx-13 mg-b-0"><strong class="tx-medium">Mellisa Brown</strong> appreciated your work <strong class="tx-medium">The Social Network</strong></p>
                <span class="tx-12">October 02, 2017 12:44am</span>
                </div>
            </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
                <img src="assets/thuthuy/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                <p class="tx-13 mg-b-0">20+ new items added are for sale in your <strong class="tx-medium">Sale Group</strong></p>
                <span class="tx-12">October 01, 2017 10:20pm</span>
                </div>
            </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
                <img src="assets/thuthuy/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                <p class="tx-13 mg-b-0"><strong class="tx-medium">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium">Ronnie Mara</strong></p>
                <span class="tx-12">October 01, 2017 6:08pm</span>
                </div>
            </div><!-- media -->
            </a>
            <div class="media-list-footer">
            <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
            </div>
        </div><!-- media-list -->
        </div><!-- dropdown-menu -->
    </div><!-- dropdown -->

    @if(Auth::check())
    <div class="dropdown dropdown-profile">

        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">

            <img src="assets/thuthuy/img/img3.jpg" class="wd-32 rounded-circle" alt="">
            
            <span class="logged-name"><span class="hidden-xs-down">{{ Auth::user()->name }}</span> <i class="fa fa-angle-down mg-l-3"></i></span>
        </a>

        <div class="dropdown-menu wd-200">

            <ul class="list-unstyled user-profile-nav">
                <li><a href=" {{ route('admins.index') }} "><i class="icon ion-ios-person-outline"></i>Danh sách admin</a></li>

                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#changepsw" ><i class="icon ion-ios-gear-outline"></i>Thay đổi mật khẩu</a></li>

                <li><a href="{{ route('logout.admin') }}"><i class="icon ion-power"></i>Đăng xuất</a></li>

            </ul>
        </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
    @endif

    </div><!-- kt-headpanel-right -->
</div><!-- kt-headpanel -->

<!-- edit modal -->
<div class="modal fade" id="changepsw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:500px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="changepsw" method="post" action="{{ route('admins.changePassword') }}">

            @csrf
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                              <fieldset class="form-group">
                                  <label>Mật khẩu cũ :</label>
                                  <input class="form-control psw_current" type="password" name="psw_current">
                                  @if ($errors->has('psw_current'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('psw_current') }}</strong>
                                      </span>
                                  @endif
                              </fieldset>
                              <fieldset class="form-group">
                                  <label>Mật khẩu mới :</label>
                                  <input class="form-control password" type="password" name="password">
                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </fieldset>
                              <div class="form-group">
                                  <label>Nhập lại mật khẩu :</label>
                                  <input class="form-control psw_confirm" type="password" name="psw_confirm">
                                  @if ($errors->has('psw_confirm'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('psw_confirm') }}</strong>
                                      </span>
                                  @endif
                              </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button class="btn btn-secondary cancelUpdateCategory" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>