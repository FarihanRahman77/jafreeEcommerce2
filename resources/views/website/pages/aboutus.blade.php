@extends('website.master')
@section('title')
{{$settings->website_name}}-About us
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')
<div class="site__body">
    <div class="block about-us">
        <div class="about-us__image"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="about-us__body">
                        <h1 class="about-us__title">About Us</h1>
                        <div class="about-us__text typography">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="abouutustext"> Established by Mr Mohammed Ali in 1957, Jafree Traders has spread its reach across the country while maintaining the same integrity and ethics as the first day of its opening. Jafree Traders began as a small business dealing in ball bearings, and has grown in more than 60 years since to a big and well-networked enterprise specialising in tools, power tools, welding machines and welding equipment. It stands today as number one in Bangladesh for welding machines, in both variety and quantity

                                        Jafree Traders is the sole agent in Bangladesh for DCA Power Tools, Riland and Rilon brand inverter type welding machine, Mosay brand circular saw blades, and DaHua brand grinding and cutting wheels, among many others. With different, dedicated teams for retail, wholesale, corporate clients, projects and after-sales services, Jafree Traders has more than 1400 buyers from all over Bangladesh. They take great pride in calling themselves ‘a one stop solution for all your machinery and tools needs.”</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{asset('website/images/1654599212oldShop.jpg')}}" />
                                </div>
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection