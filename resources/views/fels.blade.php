<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    
    <div class="banner container-fluid">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="header clearfix">

                <div class="left pull-left text-center">
                  <a href="/">{{ trans('fels.framgia') }}</a>
                  <p class="text-center">{{ config('app.name') }}</p>
                </div>

                <div class="right pull-right">

                  <div class="user" data-toggle="modal" data-target=".login-modal">
                    <p>{{ trans('fels.login') }} / {{ trans('fels.register') }}</p>
                  </div>

                  <div class="modal fade login-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">{{ trans('fels.invite-register') }}</h4>
                        </div>
                        <div class="modal-body login">
                          <div class="col-md-6 left">
                            <div class="social-container">
                              <div class="fb-icon-bg text-center">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                              </div>
                                <div class="fb-bg"></div>
                              <div class="twi-icon-bg text-center">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                              </div>
                                <div class="twi-bg"></div>
                              <div class="g-icon-bg text-center">
                                <i class="fa fa-google" aria-hidden="true"></i>
                              </div>
                                <div class="g-bg"></div>
                            </div>
                          </div>
                          <div class="col-md-6 right">
                            <form>
                              <div class="form-group">
                                <label for="login_email">{{ trans('fels.email') }}</label>
                                <input type="email" class="form-control" id="login_email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <label for="login_password">{{ trans('fels.password') }}</label>
                                <input type="password" class="form-control" id="login_password" placeholder="Password">
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox"> {{ trans('fels.remember') }}
                                </label>
                              </div>
                              <button type="submit" class="btn btn-default">{{ trans('fels.sign-in') }}</button>
                              <a href="javascript:;" class="btn btn-default sign-up-button">{{ trans('fels.sign-up') }}</a>
                            </form>
                          </div>
                        </div>
                        <div class="modal-body sign-up">
                          <form>
                            <div class="col-md-6 left">
                              <div class="form-group">
                              <label for="register_name">{{ trans('fels.name') }}</label>
                                <input id="register_name" type="text" class="form-control" placeholder="Name">
                              </div>
                              <div class="form-group">
                                <label for="register_email">{{ trans('fels.email') }}</label>
                                <input id="register_email" type="email" class="form-control" placeholder="Email">
                              </div>
                            </div>

                            <div class="col-md-6 right">
                              <div class="form-group">
                                <label for="register_password">{{ trans('fels.password') }}</label>
                                <input type="password" id="register_password" class="form-control" placeholder="Password">
                              </div>
                              <div class="form-group">
                                <label for="register_cfpassword">{{ trans('fels.confirm-password') }}</label>
                                <input type="password" id="register_cfpassword" class="form-control" placeholder="Password">
                              </div>
                            </div>
                            <div class="button-action text-center">
                              <button type="submit" class="btn btn-default">{{ trans('fels.register') }}</button>
                              <button type="reset" class="btn btn-default">{{ trans('fels.reset') }}</button>
                              <a href="javascript:;" class="back-to-login btn btn-default">{{ trans('fels.back-to-login') }}</a>
                            </div>
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

                  <div class="menu-bar">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                  </div>

                </div>

              </div>
              <!-- end of header -->

              <div class="welcome text-center">
              <div class="decoration-line">
                <p>{{ trans('fels.welcome') }}</p>
              </div>
                <h3 class="animated bounceIn">{{ trans('fels.framgia') }}</h3>
                <a class="elf-button" href="#">E - LEARNING</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- end of banner -->

    <div class="info container-fluid text-center">
      <div class="row">
        <div class="container">
          <div class="col-md-12">
            <h3>{{ trans('fels.slogan') }}</h3>
            <p>{{ trans('fels.intro') }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end of info -->

    <div class="categories container-fluid">
      <div class="row">
          <figure class="cat-box col-md-3">
            <img class="img-responsive" src="images/categories/cat-1.jpg" alt="The Pulpit Rock">
            <figcaption><p>LANDSCAPE</p></figcaption>
          </figure>
          <figure class="cat-box col-md-3">
            <img class="img-responsive" src="images/categories/cat-2.jpg" alt="The Pulpit Rock">
            <figcaption><p>SPORT</p></figcaption>
          </figure>
          <figure class="cat-box col-md-3">
            <img class="img-responsive" src="images/categories/cat-3.jpg" alt="The Pulpit Rock">
            <figcaption><p>CAREER</p></figcaption>
          </figure>
          <figure class="cat-box col-md-3">
            <img class="img-responsive" src="images/categories/cat-4.jpg" alt="The Pulpit Rock">
            <figcaption><p>TECHNOLOGY</p></figcaption>
          </figure>
          <figure class="cat-box col-md-3">
            <img class="img-responsive" src="images/categories/cat-5.jpg" alt="The Pulpit Rock">
            <figcaption><p>FAMILY</p></figcaption>
          </figure>
          <figure class="cat-box col-md-3">
            <img class="img-responsive" src="images/categories/cat-6.jpg" alt="The Pulpit Rock">
            <figcaption><p>UNIVERSITY</p></figcaption>
          </figure>
          <figure class="cat-box col-md-3">
            <img class="img-responsive" src="images/categories/cat-7.jpg" alt="The Pulpit Rock">
            <figcaption><p>MUSIC</p></figcaption>
          </figure>
          <figure class="cat-box col-md-3">
            <img class="img-responsive" src="images/categories/cat-8.jpeg" alt="The Pulpit Rock">
            <figcaption><p>SOCIAL</p></figcaption>
          </figure>
      </div>
    </div>
    <!-- end of categories -->

    <footer class="container-fluid">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="logo">
                  <p>{{ trans('fels.framgia') }}</p>
                  <p class="text-center">{{ config('app.name') }}</p>
              </div>
              <div class="copyright">
                <ul>
                  <li>{{ trans('fels.copyright') }}</li>
                  <li>{{ trans('fels.license') }}</li>
                  <li>{{ config('app.company-name') }}</li>
                </ul>
              </div>
              
            </div>
            <div class="col-md-6 text-right">
              <img class="social-logo" src="images/facebook.png" alt="">
              <img class="social-logo" src="images/google.png" alt="">
              <img class="social-logo" src="images/twitter.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div class="fullscreen-menu">
      <div class="col-md-offset-4 col-md-4">
        <ul>
          <li><a href="#">{{ trans('fels.category') }}</a></li>
          <li><a href="#">{{ trans('fels.wordlist') }}</a></li>
          <li><a href="#">{{ trans('fels.leaderboard') }}</a></li>
          <li><a href="#">{{ trans('fels.about-us') }} </a></li>
        </ul>
      </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
