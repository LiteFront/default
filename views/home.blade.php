
            <section class="hero-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="hero-content">
                                <h1>{{$data['heading']}}</h1>
                                <p>{{$data['content']}}</p>
                                <div class="hero-btn">
                                    <a href="{{trans_url('about-us.html')}}" class="btn btn-theme">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="hero-img-box">
                                <img class="move-1" src="{{theme_asset('img/hero-pic1.png')}}" alt="">
                                <img class="move-2" src="{{theme_asset('img/hero-pic2.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                    

            <section class="feature-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="feature-card-wrapper">
                                <div class="row">
                                    {!!Block::display('features')!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="content-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="content-img-group">
                                <img src="{{theme_asset('img/save-time.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content-text">
                                <h2 class="title">Save time on development.</h2>
                                <p>Create custom landing pages with Lavalite that converts more visitors than any website. With lots of unique blocks, you can easily build a page without coding.</p>
                                <div class="content-btn">
                                    <a href="about.html" class="btn btn-theme">Know More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>