<html lang="en">

<head itemscope="" itemtype="http://schema.org/WebSite">
    <title itemprop="name">Cetak Lampiran</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">
    <link rel="author" href="https://plus.google.com/u/1/106310663276114892188">
    <link rel="publisher" href="https://plus.google.com/+Bootdey-bootstrap/posts">
    <meta name="msvalidate.01" content="23285BE3183727A550D31CAE95A790AB">
</head>

<body>
    <div id="snippetContent">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <div class="col-md-12">
            <div class="row">
                <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="receipt-header">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="receipt-right">
                                    <h5>PT. Indonusa Putra Mandiri</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="receipt-header receipt-header-mid">
                            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                <div class="receipt-right">
                                    <table>
                                        <tr>
                                            <td>
                                                <h5>Client</h5>
                                            </td>
                                            <td> : </td>
                                            <td>
                                                <h5>{{ $client }}</h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $search[0]->tanggal }}</td>
                                    <td>{{ $search->sum('jumlah') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="receipt-header receipt-header-mid receipt-footer">
                            <div class="col-xs-8 col-sm-8 col-md-8 text-right">
                                <div class="receipt-left">
                                    <p><b>Jakarta, </b> {{ $now }}</p>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="receipt-left">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            body {
                background: #eee;
                margin-top: 20px;
            }

            .text-danger strong {
                color: #9f181c;
            }

            .receipt-main {
                background: #ffffff none repeat scroll 0 0;
                border-top: 12px solid #0074f8;
                margin-top: 50px;
                margin-bottom: 50px;
                padding: 40px 30px !important;
                position: relative;
                box-shadow: 0 1px 21px #acacac;
                color: #131212;
                font-family: open sans;
            }

            .receipt-main p {
                color: #333333;
                font-family: open sans;
                line-height: 1.42857;
            }

            .receipt-footer h1 {
                font-size: 15px;
                font-weight: 400 !important;
                margin: 0 !important;
            }

            .receipt-main::after {
                content: "";
                height: 5px;
                left: 0;
                position: absolute;
                right: 0;
                top: -13px;
            }

            .receipt-main thead {
                background: #414143 none repeat scroll 0 0;
            }

            .receipt-main thead th {
                color: #fff;
            }

            .receipt-right h5 {
                font-size: 16px;
                font-weight: bold;
                margin: 0 0 7px 0;
            }

            .receipt-right p {
                font-size: 12px;
                margin: 0px;
            }

            .receipt-right p i {
                text-align: center;
                width: 18px;
            }

            .receipt-main td {
                padding: 9px 20px !important;
            }

            .receipt-main th {
                padding: 13px 20px !important;
            }

            .receipt-main td {
                font-size: 13px;
                font-weight: initial !important;
            }

            .receipt-main td p:last-child {
                margin: 0;
                padding: 0;
            }

            .receipt-main td h2 {
                font-size: 20px;
                font-weight: 900;
                margin: 0;
                text-transform: uppercase;
            }

            .receipt-header-mid .receipt-left h1 {
                font-weight: 100;
                margin: 34px 0 0;
                text-align: right;
                text-transform: uppercase;
            }

            .receipt-header-mid {
                margin: 24px 0;
                overflow: hidden;
            }

            #container {
                background-color: #dcdcdc;
            }
        </style>
        <script type="text/javascript"></script>
    </div>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-F1RTS0P1CD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-F1RTS0P1CD');
    </script>
</body>

</html>
