@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('telegram')}}" class="btn btn-warning">Артқа</a>
        <p class="btn btn-success mb-0" onclick="send()">Бастау</p>
{{--        <p class="btn btn-danger mb-0" onclick="stop()">Тоқтату</p>--}}
{{--        <p class="btn btn-primary mb-0" onclick="resume()">Жалғастыру</p>--}}
        <!--<p class="btn btn-primary" onclick="users()">Users ...</p> -->
        <div id="mess">
            <br>
{{--            <p class="asdnhiaskdas">Уақыт: <span id="sec">0</span> <span style="display:none;" id="sec2"></span></p>--}}
            <p>Қолданушылар саны <b> <span
                        style="color:green" id="users_count">0</span></b></p>
            <h4> Жіберілген хабарламалар саны: <b> <span style="color:blue" id="count">0</span></b></h4>
            <p>Сәтті жіберілді: <b> <span style="color:green" id="success">0</span></b></p>

            <p>Барлық қателер <b> <span style="color:red" id="error">0</span></b></p>
            <p style="margin-left:20px;">429 қателері <b> <span style="color:red" id="error_429">0</span></b></p>
            <p style="margin-left:20px;">400 қателер (мәліметтер дұрыс енгізілмеген) <b> <span style="color:red"
                                                                                               id="error_400">0</span></b>
            </p>
            <p style="margin-left:20px;">403 қателер (боттың қолданушысы емес н/е тоқтатылған) <b> <span
                        style="color:red" id="error_403">0</span></b></p>

            <p id="users"></p>
            <p id="end"></p>
        </div>

    </div>
@endsection
@section('custom_js')
    <script>
        let len = 0;
        let success = 0
        let errors = 0;
        let count = 0
        let rcount = 0
        let sec = 0;
        let error_400 = 0;
        let error_403 = 0;
        let error_429 = 0;
        let count_s = 0;
        let test = 0;
        let text3 = '{!! $text_model->text !!}';
        let keyboard3 = null;
        let sadas = ''
        let users = []
        let timer = 0
        @if($text_model->btn_text && $text_model->btn_href)
            keyboard3 = {
            "inline_keyboard": [[{
                "text": "{{$text_model->btn_text}}",
                "url": "{{$text_model->btn_href}}"
            }]]
        };
        sadas = JSON.stringify(keyboard3)
        @endif
        function send() {
            $.ajax({
                method: "GET",
                async: false,
                url: "{{route('get_chats')}}",
                data: {}
            })
                .done(function (data) {
                    users = data.split('.');
                    console.log(users);
                    len = users.length - 1;
                    console.log('len ', len)

                    $('#users_count').text(len)
                    send20()
                    // timer = setInterval(function () {
                    //     sec++;
                    //     $('#sec').text(sec);
                    // }, 1000);
                });
        }
        function send20(){
            ajaxSend({
                chat_id: users[rcount],
                text: text3,
                parse_mode: 'html',
                reply_markup: sadas
            }).then(r => {
                console.log('success j ')
                count++;
                $('#count').text(count)
                if (r.data.ok === true) {
                    success++
                    $('#success').text(success)
                }
            }).catch(function (error) {
                console.log('error j ')
                count++;
                $('#count').text(count)
                errors++
                $('#error').html(errors)
                if (error.response.status === 400) {
                    error_400 = error_400 + 1;
                } else if (error.response.status === 429) {
                    error_429 = error_429 + 1;
                } else if (error.response.status === 403) {
                    error_403 = error_403 + 1;
                }
                $('#error_429').text(error_429)
                $('#error_400').text(error_400)
                $('#error_403').text(error_403)
            })
            rcount++
            if (len>rcount && rcount%20===0){
                setTimeout(function (){
                    send20()
                },1100)
            }
            else if(len>rcount) {
                send20()
            }
            else if(len==rcount){
                // clearInterval(timer)
                // $('.asdnhiaskdas').addClass('alert');
                // $('.asdnhiaskdas').addClass('alert-success');
            }
        }
        async function ajaxSend(params) {
            try  {
                return Promise.resolve( await axios.get('https://api.telegram.org/bot1649773011:AAFMIGsB10-sntTTSub9j78sGckolNwn3nc/sendMessage', {
                    params: params
                }))

            } catch(err) {
                return Promise.reject(err)
            }

       }


    </script>
@endsection

