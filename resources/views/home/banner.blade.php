<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <form id="women_form" action="{{ route('search_women') }}" method="get">
                    @csrf
                    <input type="hidden" name="search_women" value="Women">
                    <div class="block1 wrap-pic-w">
                        <img src="home/images/banner-01.jpg" alt="IMG-BANNER">
                        <a href="#" id="women_banner" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Women
                                </span>
                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>
                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </form>
                
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <form id="men_form" action="{{ route('search_men') }}" method="get">
                    @csrf
                    <input type="hidden" name="search_men" value="Men">
                    <div class="block1 wrap-pic-w">
                        <img src="home/images/banner-02.jpg" alt="IMG-BANNER">

                        <a href="#" id="men_banner" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Men
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </form>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <form id="accessories_form" action="{{ route('search_accessories') }}" method="get">
                    @csrf
                    <input type="hidden" name="search_accessories" value="Accessories">
                    <div class="block1 wrap-pic-w">
                        <img src="home/images/banner-03.jpg" alt="IMG-BANNER">

                        <a href="#" id="accessories_banner" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Accessories
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    New Trend
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>