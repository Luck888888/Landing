<section id="about">

    <div class="row section-intro">
        <div class="col-twelve">

            <h5>About</h5>
            <h1>Let me introduce myself.</h1>

            <div class="intro-info">
{{--                <img src="assets/images/profile-pic.jpg" alt="Profile Picture">--}}
                {!! Html::image('assets/img'.$page->images) !!}

                <p class="lead">
                    {!! $page->text !!}
                </p>
            </div>

        </div>
    </div> <!-- /section-intro -->

    <div class="row about-content">

        <div class="col-six tab-full">

            <h3>Profile</h3>
            <p>Lorem ipsum Qui veniam ut consequat ex ullamco
                nulla in non ut esse in magna sint minim officia
                consectetur nisi commodo ea magna pariatur nisi cillum.</p>

            <ul class="info-list">
                <li>
                    <strong>Fullname:</strong>
                    <span>{{$page->name}}</span>
                </li>
                <li>
                    <strong>Birth Date:</strong>
                    <span>September 28, 1987</span>
                </li>
                <li>
                    <strong>Job:</strong>
                    <span>Freelancer, Frontend Developer</span>
                </li>
                <li>
                    <strong>Website:</strong>
                    <span>www.kardswebsite.com</span>
                </li>
                <li>
                    <strong>Email:</strong>
                    <span>me@kardswebsite.com</span>
                </li>

            </ul> <!-- /info-list -->

        </div>

        <div class="col-six tab-full">

            <h3>Skills</h3>
            <p>{{$page->text}}</p>

            <ul class="skill-bars">
                <li>
                    <div class="progress percent90"><span>90%</span></div>
                    <strong>HTML5</strong>
                </li>
                <li>
                    <div class="progress percent85"><span>85%</span></div>
                    <strong>CSS3</strong>
                </li>
                <li>
                    <div class="progress percent70"><span>70%</span></div>
                    <strong>JQuery</strong>
                </li>
                <li>
                    <div class="progress percent95"><span>95%</span></div>
                    <strong>PHP</strong>
                </li>
                <li>
                    <div class="progress percent75"><span>75%</span></div>
                    <strong>Wordpress</strong>
                </li>
            </ul> <!-- /skill-bars -->
        </div>
    </div>
    <div class="row button-section">
        <div class="col-twelve">
        </div>
        <a href="{{route('home')}}">Back...</a>
    </div>
</section> <!-- /process-->