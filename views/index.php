<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IPSP PHP API Sandbox</title>
    <script src="//code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://api.fondy.eu/static_common/v1/checkout/ipsp.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                IPSP PHP SDK
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <p class="navbar-text">
                API Sandbox
            </p>
            <a href="https://github.com/kosatyi/ipsp-php-api" class="btn btn-primary navbar-btn">GitHub Project</a>
            <a href="https://ipsp-php.com/" class="btn btn-success navbar-btn">Project website</a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form form-sandbox">
                        <div class="form-group">
                            <label>Merchant ID</label>
                            <input type="text" required name="merchant[id]" class="form-control" placeholder="Merchant ID">
                        </div>
                        <div class="form-group">
                            <label>Payment key</label>
                            <input type="password" required name="merchant[key]" class="form-control" placeholder="Merchant Payment Key">
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" required name="request[amount]" class="form-control" placeholder="Amount">
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                            <select name="request[currency]" class="form-control">
                                <option value="GBP">GBP</option>
                                <option value="RUB">RUB</option>
                                <option value="USD">USD</option>
                                <option value="UAH">UAH</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Test payment details
                    </div>
                </div>
                <table class="table">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <td>Parameter</td>
                        <td>Value</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Merchant ID</td>
                        <td>1396424</td>
                    </tr>
                    <tr>
                        <td>Payment key</td>
                        <td>test</td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td>100 - 100000000</td>
                    </tr>
                    <tr>
                        <td>Currency</td>
                        <td>EUR, USD, GBP, RUB, UAH</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Test card numbers
                    </div>
                </div>
                <table class="table">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <td>Card number</td>
                        <td>Expiry date</td>
                        <td>CVV2</td>
                        <td>3DSecure</td>
                        <td>Response</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>4444555566661111</td>
                        <td>any</td>
                        <td>any</td>
                        <td>true</td>
                        <td>approve</td>
                    </tr>
                    <tr>
                        <td>4444111166665555</td>
                        <td>any</td>
                        <td>any</td>
                        <td>true</td>
                        <td>decline</td>
                    </tr>
                    <tr>
                        <td>4444555511116666</td>
                        <td>any</td>
                        <td>any</td>
                        <td>false</td>
                        <td>approve</td>
                    </tr>
                    <tr>
                        <td>4444111155556666</td>
                        <td>any</td>
                        <td>any</td>
                        <td>false</td>
                        <td>decline</td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Result
                    </div>
                </div>
                <div class="panel-body">
                    <pre id="response">...</pre>
                </div>
                <div class="panel-body" style="border-top:1px solid #ddd;">
                    <div id="checkout">Checkout Preview</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                            Signature Checker
                    </div>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>

    </div>

</div>

<script>

    var checkoutStyles = {
        'html , body' : {
            'overflow' : 'hidden'
        }
    };

    function handleResponse(data, type){
        var form;
        if (data.action == 'redirect') {
            this.loadUrl(data.url);
            return;
        }
        if (data.send_data.order_status=='processing'){
            return;
        } else {
            this.unbind('ready').action('ready', function () {
                this.show();
            });
        }
        if (data.send_data && data.url) {
            $('#response').html(JSON.stringify(data,null,' '));
        }
    }

    $('.form-sandbox').on('submit',function(ev){
        ev.preventDefault();
        $.ajax({
            type:'post',
            dataType:'json',
            url:'/test/checkout',
            data:$(this).serializeArray()
        }).then(function(data){
            $('#response').html(JSON.stringify(data,null,' '));
            $('#checkout').empty();
            $ipsp('checkout').scope(function() {
                this.setCheckoutWrapper('#checkout');
                this.addCallback(handleResponse);
                this.setCssStyle(checkoutStyles);
                this.action('resize', function(data) {
                    $('#checkout').width('100%').height(data.height);
                });
                this.loadUrl(data.checkout_url);
            });
        });
    });
</script>
</body>
</html>