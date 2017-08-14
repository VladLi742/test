$.getJSON('https://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.xchange+where+pair+=+%22USDRUB,EURRUB,GBPRUB,JPYRUB,CHFRUB,CNYRUB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=',function(data) {
    var items = [];
    $(data.query.results.rate).each(function(key,val) {
      items.push("<tr>");
      items.push("<td id='" + key + "'>" + val.Name + "</td>");
      items.push("<td id='" + key + "'>" + val.Ask + "</td>");
      items.push("<td id='" + key + "'>" + val.Bid + "</td>");
      items.push("<td id='" + key + "'>" + val.Date + "</td>");
      items.push("<td id='" + key + "'>" + val.Time + "</td>");
      items.push("</tr>");
    });
    $("<tbody/>", {html: items.join("")}).appendTo("table");
  });
$(".btn").click(function() {
  $("tbody").empty();
  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: site,
    success: function ( data ) {
        var items = [];
        $(data.query.results.rate).each(function(key, val) {
          items.push("<tr>");
          items.push("<td id='" + key + "'>" + val.Name + "</td>");
          items.push("<td id='" + key + "'>" + val.Ask + "</td>");
          items.push("<td id='" + key + "'>" + val.Bid + "</td>");
          items.push("<td id='" + key + "'>" + val.Date + "</td>");
          items.push("<td id='" + key + "'>" + val.Time + "</td>");
          items.push("</tr>");
        });
        $("<tbody/>", {html: items.join("")}).appendTo("table");}
  });
});
$(".select-currency").multiselect({
  buttonClass: 'form-control',
  buttonWidth: '100%',
  buttonText: function(options, select) {
    return 'Вид валюты';},
});
var site;
$('select').on('change', function() {
  selected = $('.select-currency :selected').map(function () {
    return $(this).val();
  }).get();
  var begin = 'https://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.xchange+where+pair+=+%22',
      cur,
      end = '%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
  cur = selected.join(",");
  site = begin + cur + end;
});
