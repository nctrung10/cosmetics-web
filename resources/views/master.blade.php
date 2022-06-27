<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{url('frontend')}}/image/logo.png">
    <title>Eden Beauty @yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{url('frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('frontend')}}/fontawesome-5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{url('frontend')}}/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('frontend')}}/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('frontend')}}/style.css">
    <!-- <link rel="stylesheet" href="{{url('public/frontend')}}/style.css">   //link url khi không chạy server  -->
    @yield('css')
</head>
<style type="text/css">
    button#fpt_ai_livechat_button {
        outline: none !important;
        height: 58px !important;
        width: 58px !important;
        border: 1.5px solid black !important;
        background-color: #fff !important;
    }
    .fpt_ai_livechat_button_tooltip {
        z-index: 1000;
    }
    .fpt_ai_livechat_button_tooltip {
        background: linear-gradient(86.7deg, #67B26FFF 0.85%, #4CA2CDFF 98.94%) !important;
    }
    .fpt_ai_livechat_header_name {
        font-family: cursive;
        font-size: 18px;
    }
    /* .box-msg .msg-1-lst-msg, .box-msg .msg-2-lst-msg {
        padding: 0 !important;
    } */
</style>
<body>
    <!-- HEADER -->
    @include('layouts.header')
    <!-- CONTENT -->
    @yield('content')
    <!-- FOOTER -->
    @include('layouts.footer')

    <!-- JS -->
    <script src="{{url('frontend')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{url('frontend')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('frontend')}}/owlcarousel/owl.carousel.min.js"></script>
    @yield('js')
</body>
<!-- show toast -->
<script>
    $(document).ready(function() {
        $('.toast').toast('show');
    });
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl, option)
    })   
</script>
<script type="text/javascript">
    // Active class based on URL
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('.nav a.nav-link');
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "nav-link link-active"
        }
    }
    /* // Active class on click no reload page
        $(document).on('click', '.navbar-nav a', function() {
        $(this).addClass('link-active').siblings().removeClass('link-active')
    }) */
</script>
<!-- Auto complete search ajax -->
<script type="text/javascript">
    $('#keywords').keyup(function() {
        var query = $(this).val();

        if (query != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/autocomplete-ajax')}}",
                method: 'POST',
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $('#search-ajax').fadeIn();
                    $('#search-ajax').html(data);
                }
            });
        } else {
            $('#search-ajax').fadeOut();
        }
    });

    $(document).on('click', '.li-search', function() {
        $('#keywords').val($(this).text());
        $('#search-ajax').fadeOut();
    })
</script>
<!-- FPT AI CHATBOT -->
<script>
    // Configs
    let liveChatBaseUrl   = document.location.protocol + '//' + 'livechat.fpt.ai/v36/src'
    let LiveChatSocketUrl = 'livechat.fpt.ai:443'
    let FptAppCode        = 'b1aa141d1b764771312239136f1126eb'
    let FptAppName        = 'Eden Beauty'
    // Define custom styles
    let CustomStyles = {
        // header
        headerBackground: 'linear-gradient(86.7deg, #257910FF 0.85%, #134B3DFF 98.94%)',
        headerTextColor: '#ffffffff',
        headerLogoEnable: false,
        headerLogoLink: 'https://chatbot-tools.fpt.ai/livechat-builder/img/theme/spa/logo.svg',
        headerText: 'Eden Beauty',
        // main
        primaryColor: '#186843FF',
        secondaryColor: '#D8D8D8FF',
        primaryTextColor: '#ffffffff',
        secondaryTextColor: '#1F1F1FFF',
        buttonColor: '#57997AFF',
        buttonTextColor: '#ffffffff',
        bodyBackgroundEnable: true,
        bodyBackgroundLink: 'https://chatbot-tools.fpt.ai/livechat-builder/img/theme/spa/body.svg',
        avatarBot: '{{url("frontend")}}/image/logo.png',
        sendMessagePlaceholder: 'Bạn cần hỗ trợ gì ạ?',
        // float button
        floatButtonLogo: '{{url("frontend")}}/image/logo.png',
        floatButtonTooltip: 'Shop có thể giúp gì cho bạn?',
        floatButtonTooltipEnable: true,
        // start screen
        customerLogo: '{{url("frontend")}}/image/logo.png',
        customerWelcomeText: 'Eden Beauty xin chào. Vui lòng nhập tên của bạn',
        customerButtonText: 'Bắt đầu chat',
        prefixEnable: true,
        prefixType: 'radio',
        prefixOptions: ["Anh","Chị"],
        prefixPlaceholder: 'Danh xưng',
        // custom css
        css: ''
    }
    // Get bot code from url if FptAppCode is empty
    if (!FptAppCode) {
        let appCodeFromHash = window.location.hash.substr(1)
        if (appCodeFromHash.length === 32) {
            FptAppCode = appCodeFromHash
        }
    }
    // Set Configs
    let FptLiveChatConfigs = {
        appName: FptAppName,
        appCode: FptAppCode,
        themes : '',
        styles : CustomStyles
    }
    // Append Script
    let FptLiveChatScript  = document.createElement('script')
    FptLiveChatScript.id   = 'fpt_ai_livechat_script'
    FptLiveChatScript.src  = liveChatBaseUrl + '/static/fptai-livechat.js'
    document.body.appendChild(FptLiveChatScript)
    // Append Stylesheet
    let FptLiveChatStyles  = document.createElement('link')
    FptLiveChatStyles.id   = 'fpt_ai_livechat_script'
    FptLiveChatStyles.rel  = 'stylesheet'
    FptLiveChatStyles.href = liveChatBaseUrl + '/static/fptai-livechat.css'
    document.body.appendChild(FptLiveChatStyles)
    // Init
    FptLiveChatScript.onload = function () {
        fpt_ai_render_chatbox(FptLiveChatConfigs, liveChatBaseUrl, LiveChatSocketUrl)
    }
</script>

</html>