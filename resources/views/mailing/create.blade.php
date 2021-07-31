@extends('layouts.app')
@section('content')
    <div class=" container">
        <h1 class="title">Рассылка</h1>

        <h4>Хабарландырудың мәлімететрін енгізу</h4>

        <p>1) Егерде текстті жирный еткіңіз келсе &lt;b&gt; &lt;/b&gt; тегтерінің ішіне жазыңыз.<br></p>
        <p>2) Егерде текстті курсив еткіңіз келсе  &lt;i&gt; &lt;/i&gt; тегтерінің ішіне жазыңыз.<br></p>
        <p>3) Егерде текстті жаңа жолдан бастап жазғыңыз келсе, \n  жазыңыз.<br></p>
        <form action="{{route('save_texts')}}" method="POST">
            @csrf
            <div class="form-group field-signup-email required has-success">
                <label class="control-label" for="signup-email">Текст:</label>
                <textarea type="text" id="text"  class="form-control" name="text" value="" aria-required="true" aria-invalid="false" required="" style="height:200px;">{{$text_model->text}}</textarea>
                <div class="help-block"></div>
            </div>
            <div class="form-group field-signup-email required has-success">
                <label class="control-label" for="signup-email">Батырма:</label>
                <input type="text" id="text" class="form-control" name="btn_text" value="{{$text_model->btn_text}}" maxlength="100" aria-required="true"  aria-invalid="false">
                <div class="help-block"></div>
            </div>
            <div class="form-group field-signup-email required has-success">
                <label class="control-label" for="signup-email">Батырма сілтемесі:</label>
                <input type="text" id="text" class="form-control" name="btn_href" value="{{$text_model->btn_href}}" maxlength="100" aria-required="true"  aria-invalid="false">
                <div class="help-block"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Жіберу</button></div>
        </form>






        <!--<p class="btn btn-success" onclick="send()">Begin ...</p>   <p class="btn btn-danger" onclick="stop()">Stop</p>
        <div id="mess">
            <br>
            <p>Уақыт: <span id="sec">0</span> <span style="display:none;" id="sec2"></span></p>
            <h4> Жіберілген хабарламалар саны:   </h4>
            <p>Жеткізілген хабарламалар:  <b><span style="color:green" id="count">0</span></b> </p>
            <p>Қателіктер:<b> <span style="color:red"  id="error">0</span></b>  </p>
            <p>Барлық жіберілген хабарламалар:<b> <span style="color:blue"  id="all">0</span></b></p>
            <p id="end"></p>
        </div>

        <script>

            function stop(){
                document.getElementById('sec2').innerHTML = document.getElementById('sec').innerHTML;
                document.getElementById('sec').style.display = "none";
                document.getElementById('sec2').style.display = "inline-block";
            }
            function send(){
            var count = 0;
            var error = 0;
            //var er_429 = 0;
            //var er_other=[];
            //var count_s = 1;
            //var succ =  20;
            var sec = 0;
            var end = document.getElementById('end').innerHTML;
             setInterval(function(){
                 if(end != 'end'){

                //function sendm(){
                 $.ajax({
                    method: "POST",
                    url: "/frontend/web/telegrambot/tmailer.php",
                    data: {'id':count}
                })
                 .done(function(content)
                  {
                    if( content[0] == 'end'){
                          document.getElementById('sec2').innerHTML = document.getElementById('sec').innerHTML;
                          document.getElementById('end').innerHTML = 'end';
                          document.getElementById('sec').style.display = "none";
                          document.getElementById('sec2').style.display = "inline-block";
                    }
                    count = count + content[0];
                    error = error + content[1];

                    //er_429 = er_429 + content[2];

                    /*for(var [index,element] of content[3]){
                      er_other[index] = element;
                    }
                    var htm = '';
                    for(var [index,element] of er_other){
                      htm = htm + '<p>'+ index + ': ' + element + '</p>';
                    }
                    document.getElementById('er_429').innerHTML = htm;*/

                    var bod = document.getElementById('mess').innerHTML;
                     //console.log(content[3]);

                    document.getElementById('count').innerHTML = count;
                    document.getElementById('error').innerHTML = error;
                    document.getElementById('all').innerHTML = count + error;
                  });
                      //count_s++;
                 }

                },1000);

                  setInterval(function(){
                    sec ++;
                    document.getElementById('sec').innerHTML = sec;
                  },1000);

            }
        </script>
        -->
    </div>
@endsection
