@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<!--login popup-->
<div class="popup_wrap" id="login_popup">
    <section class="popup r_corners shadow"> 
        <img src="{{'images/favicon/logo.png'}}" width="400" height="140" alt="logo"/>
        <div class="col-md-8 col-md-offset-2">  
            <div class="panel panel-default">
             <!--div class="panel-heading">Acesso Restrito</div-->
               </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}"  >
                        {{ csrf_field() }}
                        <ul>
                            <li class="m_bottom_15">
                               <div class="{{ $errors->has('email') ? ' has-error' : '' }}"> 
                                   <label for="email" class="m_bottom_5 d_inline_b">E-mail :</label>
                                <br>
                                <input type="email" name="email" id="name" class="r_corners full_width" placeholder="E-mail de Acesso" value="{{ old('email') }}" autofocus>
                                        @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                        @endif
                                    
                                </div>
                                
                            </li>
                            <li class="m_bottom_25">
                                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="m_bottom_5 d_inline_b">Password :</label>
                                <br>
                                <input type="password" name="password" id="password" class="r_corners full_width" placeholder="Senha de Acesso">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </li>
                            <li class="m_bottom_15">
                                <input type="checkbox" class="d_none" id="checkbox_10" name="remember {{ old('remember') ? 'checked' : '' }}">
                                <label for="checkbox_10">Lembre-me</label>
                            </li>
                            <li class="clearfix m_bottom_30">
                                <input type="submit"class="button_type_4 tr_all_hover r_corners f_left bg_scheme_color color_light f_mxs_none m_mxs_bottom_15" name="save" value="Entrar">
                                
                                <div class="f_right f_size_medium f_mxs_none">
                                    <a href="reset" class="color_dark">Esqueci Senha ?</a>
                                   
                                </div>
                            </li>
                        </ul>
                    </form>
        </div>
        </section>
</div>
</div>
                    <footer class="bg_light_color_1 t_mxs_align_c">
                        <!--h3 class="color_dark d_inline_middle d_mxs_block m_mxs_bottom_15">New Customer?</h3>
                        <a href="#" role="button" class="tr_all_hover r_corners button_type_4 bg_dark_color bg_cs_hover color_light d_inline_middle m_mxs_left_0">Create an Account</a-->
                    </footer>
                
            
        </div>
    </div>
</div>
@endsection
