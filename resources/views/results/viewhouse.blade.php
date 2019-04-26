<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$house->property->name}} - RealProperty</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/flickity.css"> {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">

</head>

<body>
    @include('results.navresult')

    <div class="viewsection">

        <div class="column profileback">
            <div class="containerx">
                <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                    @foreach (json_decode($house->property->images) as $image)
                    <div class="carousel-cell"><img src="/uploads/property/house/{{$image}}" /></div>
                    @endforeach

                </div>

                <div class="carousel carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                    @foreach (json_decode($house->property->images) as $image)
                    <div class="carousel-cell"><img src="/uploads/property/house/{{$image}}" /></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="containerx detailssection">
            <div class="columns is-flex-mobile">
                <div class="column is-two-thirds is-flex-mobile">
                    <div class="containerx">
                        <a href="http://" class="button is-danger is-pulled-right"><span><i class="far fa-heart"></i></span></a>
                        <div class="is-pulled-left">
                            <div class="title">
                                {{$house->property->name}}
                            </div>
                            <div class="subtitle">
                                {{$house->property->city}}, {{$house->property->postalCode}}
                            </div>
                            <hr class="hrline">
                            <div class="subtitle has-text-weight-semibold">
                                Property Details
                            </div>
                            <div class="columns">
                                <div class="column detailscolumn">
                                    <p>Property Type: <span class="has-text-weight-semibold">{{$house->property->type}}</span></p>
                                    <p>Bedrooms: <span class="has-text-weight-semibold">{{$house->noOfRooms}}</span></p>
                                    <p>Kitchen: <span class="has-text-weight-semibold">{{$house->noOfKitchen}}</span></p>
                                    <p>No. of Washrooms: <span class="has-text-weight-semibold">{{$house->noOfWashrooms}}</span></p>
                                    <p>No. of floors: <span class="has-text-weight-semibold">{{$house->noOfFloors}}</span></p>
                                    <p>Garden: <span class="has-text-weight-semibold">{{$house->garden}}</span></p>
                                    <p>Swimming Pool: <span class="has-text-weight-semibold">{{$house->swimmingPool}}</span></p>
                                </div>
                                <div class="column">
                                    <p>Area of Property(Square Feet): <span class="has-text-weight-semibold">{{$house->size}}</span></p>
                                    <p>Nearest School: <span class="has-text-weight-semibold">{{$house->nearestSchool}}</span></p>
                                    <p>Nearest Busstop: <span class="has-text-weight-semibold">{{$house->nearestRailway}}</span></p>
                                    <p>Nearest Railway Station: <span class="has-text-weight-semibold">{{$house->nearestBusStop}}</span></p>
                                    <p>Availability: @if(strcmp($house->property->availability,"YES") == 0)
                                        <span class="has-text-weight-semibold has-text-success">
                                            {{$house->property->availability}}
                                        </span> @else
                                        <span class="has-text-weight-semibold has-text-danger">
                                                {{$house->property->availability}}
                                        </span> @endif
                                    </p>
                                </div>

                                {{-- Mobile/Tablet Section --}}
                                <div class="column is-hidden-desktop">
                                    <div class='is-flex is-horizontal-center'>
                                        <figure class="image is-128x128">
                                            <img class="is-rounded is-horizontal-center" src="/uploads/avatars/{{$house->property->user->avatar}}">
                                        </figure>
                                    </div>
                                    <div class="subtitle has-text-centered"><span>@</span>{{$house->property->user->name}}</div>
                                    <div class="has-text-centered">
                                        <button class="button is-success" onclick="showPnox()">Show Contact Number</button>
                                        <p class="has-text-dark customerpno" id="pnox"><a href="tel:{{$house->property->contactNo}}" class="nounnounderlinelink">{{$house->property->contactNo}}</a></p>
                                        <hr>
                                        <p class="owneramount">Owner Estimated: <span class="has-text-success has-text-weight-bold">{{number_format($house->property->amount,2)}}</span>                                            LKR</p>
                                        <p class="bidamount">Current Highest Offer: <span class="has-text-danger has-text-weight-bold">4500000.00</span>                                            LKR</p>
                                        <button class="button is-link">Make an offer</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-hidden-touch">
                    <div class='is-flex is-horizontal-center'>
                        <figure class="image is-128x128">
                            <img class="is-rounded is-horizontal-center" src="/uploads/avatars/{{$house->property->user->avatar}}">
                        </figure>
                    </div>
                    <div class="subtitle has-text-centered"><span>@</span>{{$house->property->user->name}}</div>
                    <div class="has-text-centered">
                        <button class="button is-dark" onclick="location.href='#contactbox'">Email Owner</button>
                        <button class="button is-success" onclick="showPno()">Call Owner</button>
                        <p class="has-text-dark customerpno" id="pno"><a href="tel:{{$house->property->contactNo}}" class="nounnounderlinelink">{{$house->property->contactNo}}</a></p>
                        <hr>
                        <p class="owneramount">Owner Estimated: <span class="has-text-success has-text-weight-bold">{{number_format($house->property->amount,2)}}</span>                            LKR</p>
                        <p class="bidamount">Current Highest Offer: <span class="has-text-danger has-text-weight-bold">4500000.00</span> LKR</p>
                        <button class="button is-link">Make an offer</button>
                    </div>
                </div>
            </div>
            <hr> {{-- Google Map Here --}} {{--
            <div class=" is-flex-mobile"> --}}
                <div class="column maps is-flex-mobile">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="790" height="678" id="gmap_canvas" src="https://maps.google.com/maps?q=uva%20wellassa%20&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    /* height: 678px; */
                                    width: 790px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none!important;
                                    /* /* height: 678px; */
                                    width: 790px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            <hr>
            <div class="column is-flex-mobile">
                <div class="subtitle has-text-weight-semibold">Property Description</div>
                <p class="content">
                    {!! $house->property->description !!}
                </p>
            </div>
            {{--
            <hr> --}} {{--
            <div class="column is-flex-mobile">
                <div class="subtitle has-text-weight-semibold">Property Features</div>

                <ul>
                    <li>LUXURY SPECS</li>
                    <li>SWIMMING POOL</li>
                    <li>HOT WATER</li>
                    <li>AC ROOM</li>
                </ul>

            </div> --}}
            <hr>
            <div class="column is-flex-mobile" id="contactbox">
                <div class="subtitle has-text-weight-semibold">Contact Owner</div>
                <form action="" method="post">
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Name</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input class="input" type="text" placeholder="Name">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                      </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Email</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input class="input" type="email" placeholder="Email">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                      </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Phone No</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-expanded">
                                <div class="field has-addons">
                                    <p class="control">
                                        <a class="button is-static">
                                          +94
                                        </a>
                                    </p>
                                    <p class="control is-expanded">
                                        <input class="input" type="tel" placeholder="Your phone number">
                                    </p>
                                </div>
                                <p class="help has-text-link">Do not enter the first zero</p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Subject</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" placeholder="e.g. Need to visit property">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">Message</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea" placeholder="Explain how I can help you"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <!-- Left empty for spacing -->
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary">
                                        Send message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                <div class="notification is-danger">
                    <button class="delete"></button>
                    <strong>Important information:</strong> This ad has been posted on Realproperty.lk by the above mentioned
                    advertiser. Realproperty.lk does not have any connection with this advertiser, nor do we vet the advertisers,
                    guarantee their services, responsible for the accuracy of the ad's content or are responsible for services
                    provided by the advertisers. Realproperty.lk does not provide any service other than list the advertisements
                    posted by advertisers. You will be contacting the advertiser (owner/agent) of this property directly.
                    We advise you to take precaution when making any payments or signing any agreements and be alert of any
                    possible scams. If making any payments we recommend that you have two permanent & verified methods of
                    contact of the payment receiver such as their landline number and home/business address.
                </div>
                <a href="" class="is-pulled-right link reportad"><span><i class="far fa-flag"></i></span><span class="has-text-balck"> Report Advertisement</span></a>
                <br>
            </div>

        </div>

    </div>
    </div>
    {{-- Footer --}}
    @include('layouts.footer') {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/flickity.pkgd.min.js"></script>
    <script>
        function showPno() {
            var x = document.getElementById("pno");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showPnox() {
            var x = document.getElementById("pnox");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                $notification = $delete.parentNode;
                $delete.addEventListener('click', () => {
                    $notification.parentNode.removeChild($notification);
                });
            });
        });
    </script>

</body>

</html>