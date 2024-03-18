@extends('site.layouts.master')

@section('title', 'Screen Reader Access')

@section('page_link_and_styles')
@endsection

@section('content')

<section class="info-common">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 pb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Screen Reader Access</li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-5 col-md-11 col-12 title2 mbs text-center">
                <h2>Screen Reader Access</h2>
                <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with beautiful scenery but also the luxury of flawless beaches. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table border="0" cellpadding="0" cellspacing="0" class="table table-bordered table-striped" summary="Various Screen Readers to choose from">
                    <tbody>
                        <tr>
                            <th>Screen Reader</th>
                            <th>Website</th>
                            <th>Free / Commercial</th>
                        </tr>
                        <tr>
                            <td>Screen Access For All (SAFA)</td>
                            <td><a href="http://safa-reader.software.informer.com/download/" target="_blank">http://safa-reader.software.informer.com/download/</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td>Non Visual Desktop Access (NVDA)</td>
                            <td><a href="http://www.nvda-project.org/" target="_blank">http://www.nvda-project.org/</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td>System Access To Go</td>
                            <td><a href="http://www.satogo.com/" target="_blank">http://www.satogo.com/</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td>Thunder</td>
                            <td><a href="http://www.screenreader.net/index.php?pageid=11" target="_blank">http://www.screenreader.net/index.php?pageid=11</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td>Web any where</td>
                            <td><a href="http://webanywhere.cs.washington.edu/wa.php" target="_blank">http://webanywhere.cs.washington.edu/wa.php</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td>Hal</td>
                            <td><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=5" target="_blank">http://www.yourdolphin.co.uk/productdetail.asp?id=5</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Commercial</td>
                        </tr>
                        <tr>
                            <td>JAWS</td>
                            <td><a href="http://www.freedomscientific.com/Products/Blindness/JAWS" target="_blank">http://www.freedomscientific.com/Products/Blindness/JAWS</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Commercial</td>
                        </tr>
                        <tr>
                            <td>Supernova</td>
                            <td><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=1" target="_blank">http://www.yourdolphin.co.uk/productdetail.asp?id=1</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Commercial</td>
                        </tr>
                        <tr>
                            <td>Window-Eyes</td>
                            <td><a href="http://www.gwmicro.com/Window-Eyes/" target="_blank">http://www.gwmicro.com/Window-Eyes/</a><img alt="External website that opens in a new window" src="https://fed.gujarat.gov.in/writereaddata/images/ext-link-icon.gif"></td>
                            <td>Commercial</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection


@section('page_link_and_javascripts')


@endsection
