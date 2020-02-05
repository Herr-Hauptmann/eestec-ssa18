<div class="container-fluid">
    <div class="row"> <!-- SVG oblaci -->
        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-2 col-2">  
            <svg class="img-fluid oblak-kontakt"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="946.294" height="1070.774" viewBox="300 100 746.294 840.774">
                <defs>
                <linearGradient id="linear-gradient" x1="0.473" y1="-0.214" x2="0.389" y2="0.893" gradientUnits="objectBoundingBox">
                <stop offset="0" stop-color="#19e8c1"/>
                <stop offset="1" stop-color="#00a393"/>
                </linearGradient>
                </defs>
                <g id="Group_334" data-name="Group 334" transform="translate(-38.843 19.671) rotate(-3)">
                <path id="Path_497" data-name="Path 497" d="M106.417,756.166s335.062,75.948,448.27,0-22.044-160.881,4.56-303.79c26.1-140.193,88.491-167.522,101.844-262.85S581.945-6.909,446.063.371,106.417,78.11,106.417,78.11A106.417,106.417,0,0,0,0,184.527V649.749A106.417,106.417,0,0,0,106.417,756.166Z" transform="matrix(0.883, 0.469, -0.469, 0.883, 370.845, 44.733)" fill="#54049a"/>
                <path id="Path_498" data-name="Path 498" d="M109.362,758.333s335.062,75.948,448.27,0-22.044-160.881,4.56-303.79c26.1-140.193,95.781-128.648,109.134-223.977S609.5,5.665,449.008,2.538s-242.1-9.6-358.029,26.687S2.945,127.922,2.945,186.694V651.916A106.417,106.417,0,0,0,109.362,758.333Z" transform="matrix(0.883, 0.469, -0.469, 0.883, 375.854, 0)" fill="url(#linear-gradient)"/>
                </g>
            </svg>

        </div>
        <div class="col-lg-3 col-md-3 col-xl-3 col-sm-4 col-4">
            <form action="{{ route('posalji-mail') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                
                                <label for="name">
                                    Ime i prezime*</label>
                                <input type="text" class="form-control{{ $errors->has('ime') ? ' has-error' : ''}}" id="name" name="ime" minlength="3" value="{{ old('ime') }}" autofocus required/>
                         
                                    <p class="error"></p>
                                
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email*</label>
                                <input type="email" class="form-control " id="email" name="email" value="{{ old('email') }}" required="" />
                                
                                    <p class="error"></p>
                                
                            </div>
                            <div class="form-group">
                                <label for="name">
                                    Poruka*</label>
                                <textarea name="poruka" id="message" class="form-control " rows="7" cols="25" required>{{ old('poruka') }}</textarea>
                                
                                    <p class="error"></p>

                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="submit" name="send" class="btn btn-primary pull-right" id="btnContactUs">
                                Pošalji</button>
                        </div>
                    </div>             
                </div>
            </form>
            @if ($message = Session::get('success'))
                <p class="confMessage">{{ $message }}</p>
            @endif
        </div>    
        </div>



    
    </div>
    
    
    
</div>