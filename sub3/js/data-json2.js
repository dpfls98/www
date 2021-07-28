var mtab2_1 = document.getElementById('t2_1');
var mtab2_2 = document.getElementById('t2_2');
var mtab2_3 = document.getElementById('t2_3');
var mtab2_4 = document.getElementById('t2_4');

var xhrr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

function ajax_call2(localm){                     
 
  //if(xhr.status === 200) {                      // If server status was ok
    responseObject = JSON.parse(xhrr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
    //빼기
    var localText2='';                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.
    if(localm==1){
        localText2='';
    }else if(localm==2){
        localText2='';
    }else if(localm==3){
        localText2='';
    }else if(localm==4){
        localText2='';
    }                                               // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.



    var newContent2 = '';

    newContent2+='<table>' ;
    newContent2+='<thead>';
    newContent2+='<tr>';
    newContent2+='<th scope="col">과목</th>';
    newContent2+='<th scope="col">1Q</th>';
    newContent2+='<th scope="col">2Q</th>';
    newContent2+='<th scope="col">3Q</th>';
    newContent2+='<th scope="col">4Q</th>';

    newContent2+='</tr>';
    newContent2+='</thead>';
    newContent2+='<tbody class="data2_tb">';

      for(var i=0; i<responseObject.asdf.length; i++){ 

        newContent2+='<tr>';
        newContent2+='<td>' + responseObject.asdf[i].subject2 + '</td>';
        newContent2+='<td>' + responseObject.asdf[i].q2_1 + '</td>';
        newContent2+='<td>' + responseObject.asdf[i].q2_2 + '</td>';
        newContent2+='<td>' + responseObject.asdf[i].q2_3 + '</td>';
        newContent2+='<td>' + responseObject.asdf[i].q2_4 + '</td>';       
        newContent2+='</tr>';
      }
      newContent2+='</tbody>';
      newContent2+='</table>';



    document.getElementById('data2').innerHTML = newContent2;

  
}

xhrr.onload = function() {                       // 페이지 로딩시 출력
  ajax_call2(1);
};

xhrr.open('GET', './data/data2_1.json', true);        // 요청을 준비한다.
xhrr.send(null);                                 // 요청을 전송한다

mtab2_1.onclick = function(){
  xhrr.onload = function() {                       // When readystate changes
  ajax_call2(1);
};
xhrr.open('GET', './data/data2_1.json', true);        // 요청을 준비한다.
xhrr.send(null);     
}

mtab2_2.onclick = function(){
  xhrr.onload = function() {                       // When readystate changes
  ajax_call2(2);   
};
xhrr.open('GET', './data/data2_2.json', true);        // 요청을 준비한다.
xhrr.send(null);     
}

mtab2_3.onclick = function(){
  xhrr.onload = function() {                       // When readystate changes
  ajax_call2(3); 
};
xhrr.open('GET', './data/data2_3.json', true);        // 요청을 준비한다.
xhrr.send(null);     
}


