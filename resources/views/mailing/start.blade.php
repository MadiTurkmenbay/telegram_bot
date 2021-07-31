@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('telegram')}}" class="btn btn-warning" >Артқа</a>
        <p class="btn btn-success mb-0" onclick="send()">Бастау</p>   <p class="btn btn-danger mb-0" onclick="stop()">Тоқтату</p> <p class="btn btn-primary mb-0" onclick="resume()">Жалғастыру</p> <!--<p class="btn btn-primary" onclick="users()">Users ...</p> -->
        <div id="mess">
            <br>
            <p>Уақыт: <span id="sec">0</span> <span style="display:none;" id="sec2"></span></p>
            <h4> Жіберілген хабарламалар саны: <b> <span style="color:blue" id="count">0</span></b>   </h4>
            <p>Сәтті жіберілді: <b> <span style="color:green" id="success">0</span></b> </p>
            <p>Барлық қателер  <b> <span style="color:red" id="error">0</span></b> </p>
            <p style="margin-left:20px;">429 қателері  <b> <span style="color:red" id="error_429">0</span></b> </p>
            <p style="margin-left:20px;">400 қателер (мәліметтер дұрыс енгізілмеген) <b> <span style="color:red" id="error_400">0</span></b> </p>
            <p style="margin-left:20px;">403 қателер (боттың қолданушысы емес н/е тоқтатылған)  <b> <span style="color:red" id="error_403">0</span></b> </p>
            <p id="users"></p>
            <p id="end"></p>
        </div>

        <script>
            let len = 0;
            // function users(){
            //     $.ajax({
            //         method: "GET",
            //         url: "/admin/telegram/getchatid",
            //         data: {}
            //     })
            //         .done(function(data)
            //         {
            //             let users = data.split('.');
            //             console.log(users);
            //             len = users.length;
            //             document.getElementById('users').innerHTML = users;
            //             let r = 4;
            //             let nn = 9;
            //             let ch_id = parseInt(users[r + nn],10);
            //             console.log(ch_id);
            //         })
            // }
            function stop(){
                document.getElementById('sec2').innerHTML = document.getElementById('sec').innerHTML;
                document.getElementById('sec').style.display = "none";
                document.getElementById('sec2').style.display = "inline-block";
                document.getElementById('end').innerHTML = 'end';
            }
            function resume(){
                document.getElementById('sec').innerHTML = document.getElementById('sec2').innerHTML;
                document.getElementById('sec2').style.display = "none";
                document.getElementById('sec').style.display = "inline-block";
                document.getElementById('end').innerHTML = '';
            }
            function send(){
                $.ajax({
                    method: "GET",
                    async: false,
                    url: "{{route('get_chats')}}",
                    data: {}
                })
                    .done(function(data)
                    {
                        let users = data.split('.');
                        console.log(users);
                        len = users.length;
                        document.getElementById('users').innerHTML = len;

                        let count_s = 0;
                        let sec = 0;
                        let count =  0;
                        let success =  0;
                        let error =  0;
                        let error_400 =  0;
                        let error_403 =  0;
                        let error_429 =  0;
                        let sum = 0;
                        // let len = 19954;
                        let rcount = 0;
                        //var users = {1:404999172,2:419334637,3:413163698,4:402993828,5:301172097,6:404999172,7:419334637,8:413163698,9:402993828,10:301172097,11:404999172,12:419334637,13:413163698,14:402993828,15:301172097,16:404999172,17:419334637,18:413163698,19:402993828,20:301172097,21:404999172,22:419334637,23:413163698,24:402993828,25:301172097,26:404999172,27:419334637,28:413163698,29:402993828,30:301172097,31:404999172,32:419334637,33:413163698,34:402993828,35:301172097,36:404999172,37:419334637,38:413163698,39:402993828,40:301172097,41:404999172,42:419334637,43:413163698,44:402993828,45:301172097,46:404999172,47:419334637,48:413163698,49:402993828,50:301172097,51:404999172,52:419334637,53:413163698,54:402993828,55:301172097,56:404999172,57:419334637,58:413163698,59:402993828,60:301172097,61:404999172,62:419334637,63:413163698,64:402993828,65:301172097,66:404999172,67:419334637,68:413163698,69:402993828,70:301172097,71:404999172,72:419334637,73:413163698,74:402993828,75:301172097,76:404999172,77:419334637,78:413163698,79:402993828,80:301172097,81:404999172,82:419334637,83:413163698,84:402993828,85:301172097,86:404999172,87:419334637,88:413163698,89:402993828,90:301172097,91:404999172,92:419334637,93:413163698,94:402993828,95:301172097,96:404999172,97:419334637,98:413163698,99:402993828,100:301172097 };
                        //console.log(users);

                        //var text3 = 'Республикалық ғылыми- практикалық конференция \n \n «Ұстаздарды аттестациядан өткізу: қағидалары мен шарттары» \n \n 🔔29.10.2020ж, 16:00(Нұр - Сұлтан уақытымен) \n \n Конференцияда қозғалатын тақырыптар: \n \n - Педагогтерді аттестаттаудан өткізу қағидалары мен шарттары; \n \n - ТжКББ ұйымдарында аттестациялаудың жаңа жүйесі; \n \n - Психологиялық кеңестер;  \n \n - Bilimalmaty.kz  порталына аттестация құжаттарын тіркеу. \n \n Конференцияға қалай қатысуға болады? \n \n - ustaz.kz сайтына өтіп анкетаны (пошта, телефон) толтырыңыз; \n- Сізге ватсапқа және поштаңызға менеджер доступ береді; \n \n - Менеджер жіберген сілтеме арқылы 29.10 күні конференцияны көріңіз; \n \n Сізге бекітілген менеджер:  \n \n +7 707 925 34 07 (Ақниет) \n \n Конференция және сертификат алу бойынша сұрақтарды менеджерге қоюға болады';
                        let text3 = 'test';
                        let keyboard3 =   {"inline_keyboard": [[{ "text": "link","url": "link"}]]};
                        //var keyboard3 =   {"inline_keyboard": [[{ "text": "Толығырақ","url": "https://ustaz.kz"}]]};
                        setInterval(function(){
                            var end = document.getElementById('end').innerHTML;
                            if(end  != 'end'){
                                for(var i = 0; i < 20; i++){
                                    //var ch_id = parseInt(users[rcount + i],10);
                                    console.log(rcount + i);
                                    $.ajax({
                                        method: "GET",
                                        url: "https://api.telegram.org/bot1649773011:AAFMIGsB10-sntTTSub9j78sGckolNwn3nc/sendMessage",
                                        data: {'chat_id':users[rcount + i],'text':text3,'parse_mode':'html','reply_markup': JSON.stringify(keyboard3)}
                                    })
                                        .done(function(data)
                                        {
                                            count ++;
                                            document.getElementById('count').innerHTML = count;
                                            // console.log(count);
                                            if(data['ok'] == true){
                                                success = success + 1;
                                            }
                                            //var bod = document.getElementById('mess').innerHTML;
                                            // console.log(count_s);
                                            //document.getElementById('mess').innerHTML = bod + '<p>' + count_s + '. ' + content + 'хабарлама сәтті жіберілді '+ count +' </p>';
                                            document.getElementById('success').innerHTML = success;
                                            if(count == len){
                                                document.getElementById('sec2').innerHTML = document.getElementById('sec').innerHTML;
                                                document.getElementById('sec').style.display = "none";
                                                document.getElementById('sec2').style.display = "inline-block";
                                                document.getElementById('end').innerHTML = 'end';
                                            }
                                        })
                                        .fail(function (jqXHR, textStatus, errorThrown) {
                                            count ++;
                                            document.getElementById('count').innerHTML = count;
                                            //  console.log(count);
                                            if(jqXHR['status'] == '400'){
                                                error_400 = error_400 + 1;
                                            }else if(jqXHR['status'] == '429'){
                                                error_429 = error_429 + 1;
                                            }else if(jqXHR['status'] == '403'){
                                                error_403 = error_403 + 1;
                                            }
                                            /* console.log(jqXHR);
                                             console.log(textStatus);
                                             console.log(errorThrown);*/
                                            error = error + 1;

                                            document.getElementById('error').innerHTML = error;
                                            document.getElementById('error_429').innerHTML = error_429;
                                            document.getElementById('error_400').innerHTML = error_400;
                                            document.getElementById('error_403').innerHTML = error_403;

                                            if(count === len){
                                                document.getElementById('sec2').innerHTML = document.getElementById('sec').innerHTML;
                                                document.getElementById('sec').style.display = "none";
                                                document.getElementById('sec2').style.display = "inline-block";
                                                document.getElementById('end').innerHTML = 'end';
                                            }
                                        });
                                }
                                rcount = count;
                                count_s++;
                            }
                        },1000);
                        setInterval(function(){
                            sec ++;
                            document.getElementById('sec').innerHTML = sec;
                        },1000);
                    });
            }
        </script>

    </div>
@endsection
