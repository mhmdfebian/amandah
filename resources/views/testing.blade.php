<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
body {
   height: 100vh;
   overflow-x: hidden;
   padding-top: 55px;
}

/* set the sidebar width */
.w-sidebar {
    width: 200px;
    max-width: 200px;
}

.row.collapse {
    margin-left: -200px;
    left: 0;
    transition: margin-left .15s linear;
}

.row.collapse.show {
    margin-left: 0 !important;
}

.row.collapsing {
    margin-left: -200px;
    left: -0.05%;
    transition: all .15s linear;
}

/* optional */
.vh-100 {
    min-height: 100vh;
}

/* optional for overlay sidebar on small screens */
@media (max-width:768px) {

    .row.collapse,
    .row.collapsing {
        margin-left: 0 !important;
        left: 0 !important;
        overflow: visible;
    }
    
    .row > .sidebar.collapse {
        display: flex !important;
        margin-left: -100% !important;
        transition: all .3s linear;
        position: fixed;
        z-index: 1050;
        max-width: 0;
        min-width: 0;
        flex-basis: auto;
    }
    
    .row > .sidebar.collapse.show {
        margin-left: 0 !important;
        width: 100%;
        max-width: 100%;
        min-width: initial;
    }
    
    .row > .sidebar.collapsing {
        display: flex !important;
        margin-left: -10% !important;
        transition: all .2s linear !important;
        position: fixed;
        z-index: 1050;
        min-width: initial;
    }
}
</style>
<div class="container-fluid fixed-top bg-dark py-3">
    <div class="row collapse show no-gutters d-flex h-100 position-relative">
        <div class="col-3 px-0 w-sidebar navbar-collapse collapse d-none d-md-flex">
            <!-- spacer col -->
        </div>
        <div class="col px-2 px-md-0">
            <!-- toggler -->
            <a data-toggle="collapse" href="#" data-target=".collapse" role="button" class="p-1">
                <i class="fa fa-bars fa-lg"></i>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid px-0 h-100">
    <div class="row vh-100 collapse show no-gutters d-flex h-100 position-relative">
        <div class="col-3 p-0 vh-100 h-100 w-sidebar navbar-collapse collapse d-none d-md-flex sidebar">
            <!-- fixed sidebar -->
            <div class="position-fixed bg-dark text-white h-100 w-sidebar pl-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col p-3">
            <h3>Content..</h3>
            <p class="lead">Try this is full-page view to see the animation on larger screens!</p>
            <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog. Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table!</p>
        </div>
    </div>
</div>    

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>