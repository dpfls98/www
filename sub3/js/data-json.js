var mtab1 = document.getElementById('t1_1');
var mtab2 = document.getElementById('t1_2');
var mtab3 = document.getElementById('t1_3');
var mtab4 = document.getElementById('t1_4');

var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

function ajax_call(localm){                     
 

    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
    //빼기
    var localText='';                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.
    if(localm==1){
        localText='';
    }else if(localm==2){
        localText='';
    }else if(localm==3){
        localText='';
    }else if(localm==4){
        localText='';
    }                                               // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.



    var newContent = '';

    newContent+='<table>' ;
    newContent+='<thead>';
    newContent+='<tr>';
    newContent+='<th scope="col">과목</th>';
    newContent+='<th scope="col">1Q</th>';
    newContent+='<th scope="col">2Q</th>';
    newContent+='<th scope="col">3Q</th>';
    newContent+='<th scope="col">4Q</th>';
    newContent+='<th scope="col">2021</th>';
    newContent+='</tr>';
    newContent+='</thead>';
    newContent+='<tbody class="data1_tb">';

      for(var i=0; i<responseObject.finance.length; i++){ 

        newContent+='<tr>';
        newContent+='<td>' + responseObject.finance[i].subject + '</td>';
        newContent+='<td>' + responseObject.finance[i].q1 + '</td>';
        newContent+='<td>' + responseObject.finance[i].q2 + '</td>';
        newContent+='<td>' + responseObject.finance[i].q3 + '</td>';
        newContent+='<td>' + responseObject.finance[i].q4 + '</td>';
        newContent+='<td class="tot">'+(responseObject.finance[i].q1
                  +responseObject.finance[i].q2
                  +responseObject.finance[i].q3)+'</td>';       
        newContent+='</tr>';
      }
      newContent+='</tbody>';
      newContent+='</table>';



    document.getElementById('data1').innerHTML = newContent;

  
}

xhr.onload = function() {                       // 페이지 로딩시 출력
  ajax_call(1);
};

xhr.open('GET', './data/data1_1.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다

mtab1.onclick = function(){
  xhr.onload = function() {                       // When readystate changes
  ajax_call(1);
};
xhr.open('GET', './data/data1_1.json', true);        // 요청을 준비한다.
xhr.send(null);     
}

mtab2.onclick = function(){
  xhr.onload = function() {                       // When readystate changes
  ajax_call(2);   
};
xhr.open('GET', './data/data1_2.json', true);        // 요청을 준비한다.
xhr.send(null);     
}

mtab3.onclick = function(){
  xhr.onload = function() {                       // When readystate changes
  ajax_call(3); 
};
xhr.open('GET', './data/data1_3.json', true);        // 요청을 준비한다.
xhr.send(null);     
}


