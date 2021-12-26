@extends('frontend.layouts.master')

@section('title', 'Trang chủ')

{{--  HOME --}}
@section('home')
    @include('frontend.contents.slider')
    @include('frontend.contents.shoeshot')
    @include('frontend.contents.brand')
    @include('frontend.contents.news')
    @include('frontend.contents.image')
@endsection

{{--  ChatBot  --}}
@section('script')
    {{--  <script>
        // Configs
        let liveChatBaseUrl   = document.location.protocol + '//' + 'livechat.fpt.ai/v36/src'
        let LiveChatSocketUrl = 'livechat.fpt.ai:443'
        let FptAppCode        = '24f9d0233097824b3cefc793bc2ea397'
        let FptAppName        = 'Cửa hàng HSPORT'
        // Define custom styles
        let CustomStyles = {
            // header
            headerBackground: 'linear-gradient(86.7deg, #004AFFFF 0.85%, #161277FF 98.94%)',
            headerTextColor: '#ffffffff',
            headerLogoEnable: false,
            headerLogoLink: 'https://www.iconpacks.net/icons/2/free-facebook-messenger-icon-2880-thumb.png',
            headerText: 'Cửa hàng HSPORT',
            // main
            primaryColor: '#1043FFFF',
            secondaryColor: '#ecececff',
            primaryTextColor: '#ffffffff',
            secondaryTextColor: '#000000DE',
            buttonColor: '#8B8585FF',
            buttonTextColor: '#ffffffff',
            bodyBackgroundEnable: false,
            bodyBackgroundLink: '',
            avatarBot: 'https://img.favpng.com/11/14/1/computer-icons-clip-art-online-chat-internet-bot-scalable-vector-graphics-png-favpng-RY2PzfedpgxxdpgVr4VUnfq8V.jpg',
            sendMessagePlaceholder: '',
            // float button
            floatButtonLogo: 'https://www.iconpacks.net/icons/2/free-facebook-messenger-icon-2880-thumb.png',
            floatButtonTooltip: 'Can I help you?',
            floatButtonTooltipEnable: false,
            // start screen
            customerLogo: '',
            customerWelcomeText: 'Xin chào bạn tên gì?',
            customerButtonText: 'Bắt đầu',
            prefixEnable: false,
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
    </script>  --}}


    <script>
        // Configs
        let liveChatBaseUrl   = document.location.protocol + '//' + 'livechat.fpt.ai/v36/src'
        let LiveChatSocketUrl = 'livechat.fpt.ai:443'
        let FptAppCode        = 'f41aeb57425534488d63a97828e3cb58'
        let FptAppName        = 'Hỗ trợ trực tuyến HSPORT'
        // Define custom styles
        let CustomStyles = {
            // header
            headerBackground: 'linear-gradient(86.7deg, #3353a2ff 0.85%, #31b7b7ff 98.94%)',
            headerTextColor: '#ffffffff',
            headerLogoEnable: false,
            headerLogoLink: 'https://chatbot-tools.fpt.ai/livechat-builder/img/Icon-fpt-ai.png',
            headerText: 'Hỗ trợ trực tuyến HSPORT',
            // main
            primaryColor: '#6d9ccbff',
            secondaryColor: '#ecececff',
            primaryTextColor: '#ffffffff',
            secondaryTextColor: '#000000DE',
            buttonColor: '#b4b4b4ff',
            buttonTextColor: '#ffffffff',
            bodyBackgroundEnable: false,
            bodyBackgroundLink: '',
            avatarBot: 'https://img.favpng.com/11/14/1/computer-icons-clip-art-online-chat-internet-bot-scalable-vector-graphics-png-favpng-RY2PzfedpgxxdpgVr4VUnfq8V.jpg',
            sendMessagePlaceholder: 'Nhập tin nhắn...',
            // float button
            floatButtonLogo: 'https://www.iconpacks.net/icons/2/free-facebook-messenger-icon-2880-thumb.png',
            floatButtonTooltip: 'Bạn cần hỗ trợ gì?',
            floatButtonTooltipEnable: true,
            // start screen
            customerLogo: 'https://chatbot-tools.fpt.ai/livechat-builder/img/bot.png',
            customerWelcomeText: 'Nhập tên của bạn...',
            customerButtonText: 'Bắt đầu',
            prefixEnable: false,
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
    


@endsection


