$(document).ready(function(){

  var _from;
  var _to;
  var _distance;
  //_from = "Москва";
  // _to = "Париж";
  $('#fuelform-from').on('input', function(){
    // Действия после окончания ввода в форму "From"
    function assignFrom()
    { // присваиваем результат инпута глобальной переменной _from
      _from = document.getElementById("fuelform-from").value;
    }
    assignFrom();
  });

  $('#fuelform-to').on('input', function() {
    // Действия после окончания ввода в форму "From"
    function assignTo()
    {// присваиваем результат инпута глобальной переменной _to
      _to = document.getElementById("fuelform-to").value;
    }
    assignTo();
  });

  function callApi() // Запрос к API для вычисления расстояния между двумя городами
  { // вставляем в ссылку для запроса к  API введённые выше данные
    var yourUrl = 'http://calc-api.ru/app:geo-api/null?a=' + encodeURIComponent(_from) + '&b=' + encodeURIComponent(_to) ;

   function Get(yourUrl)
    { // Запрос GET по url, получаем json
      var Httpreq = new XMLHttpRequest(); // a new request
      Httpreq.open("GET",yourUrl,false);
      Httpreq.send(null);
      return Httpreq.responseText;
    }

    var json_obj = JSON.parse(Get(yourUrl)); // парсим JSON

    function assignDistance()
    { // присваиваем результат парса глобальной переменной _distance
      _distance = json_obj.distanse;
    }
    assignDistance();

    document.getElementById("distance-number").innerHTML = _distance; // Записывает значение переменной _distance в документ
    return _distance;
  }
  document.getElementById("calculate-distance").onclick = callApi; // запускает запрос к api по клику на кнопку "Calculate disance"

});

function sendDistance() // посылает переменную _distance PHP-обработчику для дальнейших рассчётов
{
  $.ajax({
            url: "/group/default/empty",
            type: "post",
            data: {lesson_id : 1},
            success: function(response) {
              // simply checking git
              // test 1
              // test 2
              // test 3
              // test 4
              // test 5

                 // window.location.reload(true);
                 console.log("success!");


               }

         });
}
